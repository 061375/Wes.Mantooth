// @param {Number}
var MAXBALLS = 20;

// make sure everything is loaded
window.onload = function() {
    
    'use strict';
    
    $w.makeFPS();
    // 
    $w.add_object( 
        MAXBALLS,
        Ball,
        {
            x:500,
            y:500,
            radius:10,
        },
        document.getElementById('target')
    );
    $w.loop(true);
}
/**
 * @param {Number} the reference ID to the canvas (also z-index)
 * @param {Number} x ( max x position )
 * @param {Number} y ( max y position )
 * @param {Number} radius size of the circle
 * @param {String} a hexadecimal value representing a color 
 * */
var Ball = function(o) {
    // @param {Number}
    this.i = o.i;
    // @param {Number}
    this.x = $w.math.frandom(o.x);
    // @param {Number}
    this.y = $w.math.frandom(o.y);
    // @param {Number}
    this.radius = o.radius;
    // @param {Number}
    this.color = $w.color.random();
    
    // set the x and y speed of the ball
    // @param {Number}
    this.x_speed = ~~((Math.random() * 10) - 5);
    // @param {Number}
    this.y_speed = ~~((Math.random() * 10) - 5);
    
    // make sure that the balls are moving
    if (this.x_speed > -1 && this.x_speed < 1) {
        if (this.x_speed < 0 ) {
            this.x_speed = -1;
        }else{
            this.x_speed = 1;
        }
    }
    //
    if (this.y_speed > -1 && this.y_speed < 1) {
        if (this.y_speed < 0 ) {
            this.y_speed = -1;
        }else{
            this.y_speed = 1;
        }
    }
}  
/**
 * better to use a prototype
 * https://developers.google.com/speed/articles/optimizing-javascript
 * */
Ball.prototype.loop = function() {
    // increment the x,y positions
    this.x += this.x_speed;
    this.y += this.y_speed;
    // check for collisions
    var chk = $w.collision.insideCanvas(0,this.x,this.y);
    if (chk > 0) {
        switch(chk) {
            case 1:this.x_speed+=(this.x_speed * -2);break;
            case 2:this.y_speed+=(this.y_speed * -2);break;
            case 3:this.x_speed-=(this.x_speed * 2);break;
            case 4:this.y_speed-=(this.y_speed * 2);break;
        }
    }
    $w.canvas.clear(this.i);
    $w.canvas.circle(this.i,this.x,this.y,this.radius,this.color);
    
    if(this.i == (MAXBALLS-1))$w.upFPS();
    return true;
}