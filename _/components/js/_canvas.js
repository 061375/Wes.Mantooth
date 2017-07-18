/** 
 * Canvas (Wes Mantooth) - HTML5 Canvas Handler
 * 
 * @author Jeremy Heminger - 2017 <j.heminger13@gmail.com>
 *
 * @function init
 * 
 * @function circle
 *
 * @function arc
 *
 * @function qArc
 *
 * @function bArc
 *
 * @function text
 *
 * @function line
 *
 * @function rectangle
 *
 * @function clear
 *
 * @function image
 *
 * @function set_error
 *
 * @function has_error
 *
 * @param fint
 * Mozilla suggests using integers and not float point numbers to optimize drawing to canvas
 * https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API/Tutorial/Optimizing_canvas
 * but I still want to allow the option
 *
 * 
 * */
var Canvas = (function() {
    
    "use strict";
    
    
    var isinit = false;
    
    var C; // canvas
    
    var ctx = [];
    
    var _font = '12px serif';
    
    var _color = '#000000';
    
    var _linewidth = 1;
    
    var errors = [];
    
    var RAF;
    
    /** 
     * @param {Object} a DOM object to append the canvas to
     * @param {Number} canvas container width
     * @param {Number} canvas container height
     * @param {Function} callback
     * @returns {Function(Number), Number}
     * */
    var init = function($t,w,h,callback) {
    
        if (typeof $t === 'undefined') $t = document.getElementsByTagName("body")[0];
        if (typeof w === 'undefined') w = window.innerWidth;
        if (typeof h === 'undefined') h = window.innerHeight;
        
        C = document.createElement('canvas');
        C.setAttribute("width",w);
        C.setAttribute("height",h);
        C.setAttribute("style","z-index:"+(ctx.length+1));
        
        $t.appendChild(C);
        
        var i = ctx.length;
        ctx.push(C.getContext("2d"));
        
        isinit = true;
        
        if (typeof callback === 'function') {
            callback(i);
        }
        return i;
    }
    /**
     * @param {Number}
     * @param {Number} x
     * @param {Number} y
     * @param {Number} radius
     * @param {String} color (hex #000000)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var circle = function(i,x,y,r,c,o,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x = Math.floor(x);
            y = Math.floor(y);
        }
        if (typeof c === 'undefined')
            c = _color;
        if (typeof o !== 'undefined')
            ctx[i].globalAlpha = o;
                
        ctx[i].fillStyle=c;       
        ctx[i].beginPath();
        ctx[i].arc(x,y,r,0,Math.PI*2,true);
        ctx[i].closePath();
        ctx[i].fill();
    }
    /**
     * @param {Number}
     * @param {Number} x
     * @param {Number} y
     * @param {Number} radius
     * @param {Number} start angle
     * @param {Number} end angle
     * @param {Boolean} counterclockwize
     * @param {String} color (hex #000000)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */ 
    var arc = function(i,x,y,r,s,e,cc,color,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x = Math.floor(x);
            y = Math.floor(y);
        }
        if (typeof color === 'undefined') color = _color;
        ctx[i].beginPath();
        ctx[i].strokeStyle = color;
        ctx[i].arc(x,y,r,s,e,cc);
        ctx[i].stroke();
    }
    /**
     * Quadratic Curve
     * @param {Number}
     * @param {Number} x1
     * @param {Number} y1
     * @param {Number} x2
     * @param {Number} y2
     * @param {Number} x3
     * @param {Number} y3
     * @param {String} color (hex #000000)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */ 
    var qArc = function(i,x1,y1,x2,y2,x3,y3,color,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x1 = Math.floor(x1);
            y1 = Math.floor(y1);
            x2 = Math.floor(x2);
            y2 = Math.floor(y2);
            x3 = Math.floor(x3);
            y3 = Math.floor(y3);
        }
        if (typeof color === 'undefined') color = _color;
        ctx[i].beginPath();
        ctx[i].strokeStyle = color;
        ctx[i].moveTo(x1,y1);
        ctx[i].quadraticCurveTo(x2, y2, x3, y3);
        ctx[i].stroke();
    }
    /**
     * Bezier Curve
     * @param {Number}
     * @param {Number} x1
     * @param {Number} y1
     * @param {Number} x2
     * @param {Number} y2
     * @param {Number} x3
     * @param {Number} y3
     * @param {Number} x4
     * @param {Number} y4
     * @param {String} color (hex #000000)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */ 
    var bArc = function(i,x1,y1,x2,y2,x3,y3,x4,y4,color,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x1 = Math.floor(x1);
            y1 = Math.floor(y1);
            x2 = Math.floor(x2);
            y2 = Math.floor(y2);
            x3 = Math.floor(x3);
            y3 = Math.floor(y3);
            x4 = Math.floor(x4);
            y4 = Math.floor(y4);
        }
        if (typeof color === 'undefined') color = _color;
        ctx[i].beginPath();
        ctx[i].strokeStyle = color;
        ctx[i].moveTo(x1,y1);
        ctx[i].bezierCurveTo(x2, y2, x3, y3, x4, y4);
        ctx[i].stroke();
    }
    /**
     * @param {Number}
     * @param {Number} x
     * @param {Number} y
     * @param {String} txt
     * @param {String} stroke or fill
     * @param {String} font
     * @param {String}
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var text = function(i,x,y,txt,m,font,color,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x = Math.floor(x);
            y = Math.floor(y);
        }
        if (typeof font === 'undefined') font = _font;
        if (typeof m === 'undefined') m = 'fill';
        if (typeof font !== 'undefined') {
            ctx[i].strokeStyle = color;
            ctx[i].fillStyle = color;
        }
        ctx[i].font = font;
        if (m == 'fill') {
            ctx[i].fillText(txt,x,y);
        }else{
            ctx[i].strokeText(txt,x,y);
        }
    }
    /**
     * @param {Number}
     * @param {Number} x1
     * @param {Number} y1
     * @param {Number} x2
     * @param {Number} y2
     * @param {String} color 
     * @param {Number} linewidth
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var line = function(i,x1,y1,x2,y2,color,linewidth,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x1 = Math.floor(x1);
            y1 = Math.floor(y1);
            x2 = Math.floor(x2);
            y2 = Math.floor(y2);
        }
        if (typeof color === 'undefined') color = _color;
        if (typeof linewidth === 'undefined') linewidth = _linewidth;
        ctx[i].beginPath();
        ctx[i].moveTo(x1,y1);
        ctx[i].lineTo(x2,y2);
        ctx[i].lineWidth = linewidth;
        ctx[i].strokeStyle = color;
        ctx[i].stroke();
        ctx[i].closePath();
    }
    /**
     * @param {Number}
     * @param {Number} x1
     * @param {Number} y1
     * @param {Number} x2
     * @param {Number} y2
     * @param {String} hex color
     * @param {String} method ( fill , stroke, both )
     * @param {String} hex color (alternate color)
     * @param {Number} opacity (Float 0 - 1)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var rectangle = function(i,x1,y1,x2,y2,color,m,acolor,o,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            x1 = Math.floor(x1);
            y1 = Math.floor(y1);
            x2 = Math.floor(x2);
            y2 = Math.floor(y2);
        }
        if (typeof m === 'undefined') m = 'stroke';
        switch (m) {
            case 'fill':
                ctx[i].fillStyle=color;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                ctx[i].fillRect(x1,y1,x2,y2);
                break;
            case 'stroke':
                ctx[i].strokeStyle=color;
                ctx[i].strokeRect(x1,y1,x2,y2);
                break;
            default:
                ctx[i].fillStyle=acolor;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                ctx[i].fillRect(x1,y1,x2,y2);
                ctx[i].strokeStyle=color;
                ctx[i].strokeRect(x1,y1,x2,y2);
        }
    }
    /**
     * @param {Number}
     * @param {Number} x1
     * @param {Number} y1
     * @param {Number} width
     * @param {Number} height
     * @param {String} hex color
     * @param {String} method ( fill , stroke, both )
     * @param {String} hex color (alternate color)
     * @param {Number} opacity (Float 0 - 1)
     * @todo @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var roundRectangle = function(i, x, y, width, height, radius,color,m,acolor,o) {
        ctx[i].beginPath();
        ctx[i].moveTo(x, y + radius);
        ctx[i].lineTo(x, y + height - radius);
        ctx[i].arcTo(x, y + height, x + radius, y + height, radius);
        ctx[i].lineTo(x + width - radius, y + height);
        ctx[i].arcTo(x + width, y + height, x + width, y + height-radius, radius);
        ctx[i].lineTo(x + width, y + radius);
        ctx[i].arcTo(x + width, y, x + width - radius, y, radius);
        ctx[i].lineTo(x + radius, y);
        ctx[i].arcTo(x, y, x, y + radius, radius);
        if (typeof m === 'undefined') m = 'stroke';
        switch (m) {
            case 'fill':
                ctx[i].fillStyle=color;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                ctx[i].fill();
                break;
            case 'stroke':
                ctx[i].strokeStyle=color;
                ctx[i].stroke();
                break;
            default:
                ctx[i].fillStyle=acolor;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                ctx[i].fill();
                ctx[i].strokeStyle=color;
                ctx[i].stroke();
        }
        ctx[i].stroke();
    }
    /**
     * @param {Number}
     * @param {Array}
     * @param {String} hex color
     * @param {String} method ( fill , stroke, both )
     * @param {String} hex color (alternate color)
     * @param {Number} opacity (Float 0 - 1)
     * @param {Boolean} optional if true the operation allows float point numbers
     * @returns {Void}
     * */
    var polygon = function(i,a,color,m,acolor,o,fint) {
        // see fint
        if (typeof fint === 'undefined') {
            fint = false;
        }
        if (typeof m === 'undefined') m = 'stroke';
        switch (m) {
            case 'fill':
                ctx[i].fillStyle=color;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                break;
            case 'stroke':
                ctx[i].strokeStyle=color;
                
                break;
            default:
                ctx[i].fillStyle=acolor;
                if (typeof o !== 'undefined') {
                    ctx[i].globalAlpha = o;
                }
                ctx[i].fillRect(x1,y1,x2,y2);
                ctx[i].strokeStyle=color;
        }
        ctx[i].beginPath();
        ctx[i].moveTo(a[0][0],a[0][1]);
        var l = a.length;
        for(var j=1;j<l;j++){
            ctx[i].lineTo(a[j][0],a[j][1]);    
        }
        ctx[i].fill();
    }
    /**
     * @param {Number}
     * @param {Object} obj
     * @return {Boolean}
     * */
    var image = function(i,obj,fint){
        
            clear(i);
        
            ctx[i].save();
        
            // see fint
            if (typeof fint === 'undefined') {
                obj.sx = Math.floor(obj.sx);
                obj.sy = Math.floor(obj.sy);
                obj.sWidth = Math.floor(obj.sWidth);
                obj.sHeight = Math.floor(obj.sHeight);
                obj.dx = Math.floor(obj.dx);
                obj.dy = Math.floor(obj.dy);
                obj.dWidth = Math.floor(obj.dWidth);
                obj.dHeight = Math.floor(obj.dHeight);
            }
            
            // 
            if (typeof obj.img === 'undefined') {
                set_error('image not set');
                return false;
            }
        
            if (typeof obj.sWidth !== 'undefined') {
                ctx[i].drawImage(obj.img,obj.sx,obj.sy,obj.sWidth,obj.sHeight,obj.dx,obj.dy,obj.dWidth,obj.dHeight);
            } else if (typeof obj.dWidth !== 'undefined') {
                ctx[i].drawImage(obj.img,obj.dx,obj.dy,obj.dWidth,obj.dHeight);
            } else {
                ctx[i].drawImage(obj.img,obj.dx,obj.dy);
            }
            
            // Put it on the canvas
            ctx[i].restore();
            
            return true;

    }
    /**
     * @todo experiment with clear just the section where the current element is (for speed)
     * @param {Number}
     * @param {Boolean} save
     * @returns {Void}
     * */
    var clear = function(i,save) {
        
            if (typeof save === 'undefined' || save) {
                ctx[i].clearRect(0, 0, C.width, C.height);
            }else{
                ctx[i].save();
                ctx[i].setTransform(1, 0, 0, 1, 0, 0);
                ctx[i].clearRect(0, 0, C.width, C.height);
                ctx[i].restore();
            }
  
    }
    /**
     * @param {Object} list of parameters to be sent to callback
     * @param {Function} callback
     * */
    var draw = function(o,callback) {
        requestAnimationFrame(callback);
        /*function() {
            if (typeof callback === 'function') callback(o);
        });*/
    }
    /**
     * @param {Number} reference number to stop
     * */
    var stopdraw = function(_raf) {
        if (typeof _raf !== 'undefined') {
            window.cancelAnimationFrame(_raf);
        }else{
            window.cancelAnimationFrame(RAF);
        }
    } 
    /**
     * get a local reference
     * @param {String} o
     * @returns {Object}
     * */
    var get = function(i,o) {
        
        switch(o) {
            case 'canvas':o = C;break;
            case 'ctx':o = ctx[i];break;
        }
        return o;
    }
    /**
     * @param {String}
     * @returns {Void}
     * * */
    var set_error = function(e) {
        errors.push('Error: '+e);     
    }
    /**
     * if errors exist they are dumped to the console
     * @returns {Void}
     * * */
    var has_error = function() {
        if (errors.length > 0) {
            var l = errors.length;
            for(var i = 0; i < l; i++) {
                $w.log(errors[i]);   
            }
        }
    }
    
    return {
        init:init,
        circle:circle,
        arc:arc,
        qArc:qArc,
        bArc:bArc,
        text:text,
        line:line,
        image:image,
        rectangle:rectangle,
        roundRectangle:roundRectangle,
        polygon:polygon,
        clear:clear,
        get:get,
        has_error:has_error
    };   
}());
