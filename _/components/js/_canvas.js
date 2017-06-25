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
     * @returns {Void}
     * */
    var circle = function(i,x,y,r,c) {
        if (typeof c === 'undefined')c = _color;
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
     * @returns {Void}
     * */ 
    var arc = function(i,x,y,r,s,e,cc,color) {
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
     * @returns {Void}
     * */ 
    var qArc = function(i,x1,y1,x2,y2,x3,y3,color) {
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
     * @returns {Void}
     * */ 
    var bArc = function(i,x1,y1,x2,y2,x3,y3,x4,y4,color) {
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
     * @returns {Void}
     * */
    var text = function(i,x,y,txt,m,font) {
        if (typeof font === 'undefined') font = _font;
        if (typeof m === 'undefined') m = 'fill';
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
     * @returns {Void}
     * */
    var line = function(i,x1,y1,x2,y2,color,linewidth) {
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
     * @returns {Void}
     * */
    var rectangle = function(i,x1,y1,x2,y2,color,m,acolor,o) {
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
     * @param {Object} obj
     * @return {Boolean}
     * */
    var image = function(i,obj){
            clear(i);
            ctx[i].save();
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
        requestAnimationFrame(callback);/*function() {
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
                console.log(errors[i]);   
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
        clear:clear,
        get:get,
        has_error:has_error
    };   
}());
