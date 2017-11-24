/**
* Food
* @param {Object}
* @returns {Void}
* */
var Food = function(o) {
    this.i = o.i;
    this.radius = 3;
    this.color = '#a52a2a';
    var xy = AntSim.place();
    this.x = xy.x;
    this.y = xy.y;
}

Food.prototype.loop = function() {
    $w.canvas.circle(this.i,this.x,this.y,this.radius,this.color);   
}