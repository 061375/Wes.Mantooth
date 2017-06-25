var Draw = (function() {
    
    "use strict";
    
    /**
     * @param {Number} w width
     * @param {Number} h height
     * @param {Number} u unit
     * @param {Function} callback
     * @returns {Void}
     * */
    var grid = function(i,w,h,u,callback) {

        var s = w / (u * 10);
        for(var x = 1; x < w; x+=s) {
            $w.canvas.line(i,x,0,x,h,'#dedede');    
        }
        for(var y = 1; y < h; y+=s) {
            $w.canvas.line(i,0,y,w,y,'#dedede'); 
        }
        
        // draw the origin
        $w.canvas.line(i,0,(w / 2),w,(h / 2),'#000000',2);
        $w.canvas.line(i,(h / 2),0,(w / 2),h,'#000000',2);
        
        // this allows another function to be called after this operation
        if(typeof callback === 'function')callback();
    }
    return {
        grid:grid
    };   
}());