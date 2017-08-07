    /** 
     * @param {Object} a DOM object to append the canvas to
     * @param {Number} canvas container width
     * @param {Number} canvas container height
     * @param {Function} callback
     * @returns {Function(Number), Number}
     * */
$w.canvas2 = function(){
    
    "use strict";

    this.isinit = false;
    
    this.C; // canvas
    
    this.ctx = [];
    
    this._font = '12px serif';
    
    this._color = '#000000';
    
    this._linewidth = 1;
    
    this.errors = [];
    
    this.RAF;
    
    this.init = function($t,w,h,callback) {
        if (typeof $t === 'undefined') $t = document.getElementsByTagName("body")[0];
        if (typeof w === 'undefined') w = window.innerWidth;
        if (typeof h === 'undefined') h = window.innerHeight;
        
        C = document.createElement('canvas');
        C.setAttribute('hidpi','no');
        C.setAttribute("width",w);
        C.setAttribute("height",h);
        C.setAttribute("style","z-index:"+(this.ctx.length+1));
        
        $t.appendChild(C);
        
        var i = this.ctx.length;
        this.ctx.push(C.getContext("2d"));
        
        this.isinit = true;
        
        if (typeof callback === 'function') {
            callback(i);
        }
        return i;
    }
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
$w.canvas2.prototype.circle = function(i,x,y,r,c,o,fint) {
   // see fint
   if (typeof fint === 'undefined') {
       x = ~~x;
       y = ~~y;
   }
   if (typeof c === 'undefined')
       c = this._color;
   if (typeof o !== 'undefined')
       ctx[i].globalAlpha = o;
           
   ctx[i].fillStyle=c;       
   ctx[i].beginPath();
   ctx[i].arc(x,y,r,0,Math.PI*2,true);
   ctx[i].closePath();
   ctx[i].fill();
}