$w.draw = (function() {
    
    "use strict";
    
    /**
     * grid
     * draws a grid to the canvas
     * @param {Number} i
     * @param {Number} w width
     * @param {Number} h height
     * @param {Number} u unit
     * @param {Boolean}
     * @param {Function} callback
     * 
     * @returns {Void}
     * */
    var grid = function(i,w,h,u,o,callback) {
        
        $w.log('$w.grid('+[i,w,h,u,o]+')');
        
        var s = w / (u * 10);
        
        for(var x = 1; x < w; x+=s) {
            $w.canvas.line(i,x,0,x,h,'#dedede');    
        }
        for(var y = 1; y < h; y+=s) {
            $w.canvas.line(i,0,y,w,y,'#dedede'); 
        }
        if (typeof o === 'undefined' || o) {
        // draw the origin
            $w.canvas.line(i,0,(w / 2),w,(h / 2),'#000000',2);
            $w.canvas.line(i,(h / 2),0,(w / 2),h,'#000000',2);
        }
        
        // this allows another function to be called after this operation
        if(typeof callback === 'function')callback();
    }
    /**
     * gridp
     * same as grid but with perspective
     * @param {Number} i
     * @param {Number} w width
     * @param {Number} h height
     * @param {Number} u unit
     * @param {Number}
     * @param {Function} callback
     * @returns {Void}
     * */
    var gridp = function(i,w,h,u,p,callback) { 
        $w.log('$w.grid('+[i,w,h,u,p]+')');
        var s = w / (u * 10);
        for(var x = 1; x < w; x+=s) {
            $w.canvas.line(i,x,0,x,h,'#dedede');    
        }
        for(var y = 1; y < h; y+=(s-p)) {
            $w.canvas.line(i,0,y,w,y,'#dedede'); 
        }
        
        // draw the origin
        $w.canvas.line(i,0,(w / 2),w,(h / 2),'#000000',2);
        $w.canvas.line(i,(h / 2),0,(w / 2),h,'#000000',2);
        
        // this allows another function to be called after this operation
        if(typeof callback === 'function')callback();
    }
    return {
        grid:grid,
        gridp:gridp 
    };   
}());