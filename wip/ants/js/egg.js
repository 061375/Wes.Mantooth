/**
* Egg
* @param {Object}
* @returns {Void}
* */
var Egg = function(o) {
    this.i = o.i;
    this.radius = 3;
    this.color = '#dcdcdc';
    var xy = AntSim.place(o.queen.x-50,o.queen.y-50,100,100);
    this.x = xy.x;
    this.y = xy.y;
}

Egg.prototype.loop = function() {
    $w.canvas.clear(this.i);
    $w.canvas.circle(this.i,this.x,this.y,this.radius,this.color);   
}