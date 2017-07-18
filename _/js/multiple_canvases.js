// @param {Number}
var MAXBALLS = 30;

// make sure everything is loaded
window.onload = function() {
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
    $w.loop();
}
/**
 * @param {Number} the reference ID to the canvas (also z-index)
 * @param {Number} x ( max x position )
 * @param {Number} y ( max y position )
 * @param {Number} radius size of the circle
 * @param {String} a hexadecimal value representing a color 
 * */
var Ball = function(o) {
    
    var i = o.i;
    var x = $w.math.frandom(o.x);
    var y = $w.math.frandom(o.y)
    var radius = o.radius;
    var color = Color.random();
    // set the x and y speed of the ball
    this.x_speed = Math.floor((Math.random() * 10) - 5);
    this.y_speed = Math.floor((Math.random() * 10) - 5);
    
    // make sure that the balls are moving
    if (this.x_speed > -1 && this.x_speed < 1) {
        if (this.x_speed < 0 ) {
            this.x_speed = -1;
        }else{
            this.x_speed = 1;
        }
    }
    if (this.y_speed > -1 && this.y_speed < 1) {
        if (this.y_speed < 0 ) {
            this.y_speed = -1;
        }else{
            this.y_speed = 1;
        }
    }
    
    /**
     * 
     * */
    this.loop = function() {
        
        x += this.x_speed;
        y += this.y_speed;
        
        var chk = Collision.insideCanvas(0,x,y);
    
        if (chk > 0) {
            switch(chk) {
                case 1:this.x_speed+=(this.x_speed * -2);break;
                case 2:this.y_speed+=(this.y_speed * -2);break;
                case 3:this.x_speed-=(this.x_speed * 2);break;
                case 4:this.y_speed-=(this.y_speed * 2);break;
            }
        }
        $w.canvas.clear(i);
        $w.canvas.circle(i,x,y,radius,color);
        
        if(i == (MAXBALLS-1))$w.upFPS();
        window.requestAnimationFrame(this.loop.bind(this));
    }
}