// @param {Number}
var MAXBALLS = 50;


// make sure everything is loaded
window.onload = function() {
    // create an array to hold all the balls
    var c =[];
    // setup the frames per second counter
    $w.makeFPS();
    // run a loop to create all the balls
    for(var i=0; i<MAXBALLS; i++){
        // create a canvas context and assign the result to j
        // its true that this loop will result in the same as i
        // but it demonstrates that the funcxtion returns the ID of the canavas object
        var j = $w.canvas.init(document.getElementById('target'));
        // instaniate a new ball
        c[j] = new Ball(j,$w.math.frandom(500),$w.math.frandom(500),10,Color.random());
        // start the loop
        c[j].loop();
    }

}
/**
 * @param {Number} the reference ID to the canvas (also z-index)
 * @param {Number} x
 * @param {Number} y
 * @param {Number} radius size of the circle
 * @param {String} a hexadecimal value representing a color 
 * */
var Ball = function(i,x,y,radius,color) {
    
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
        
        var chk = Collision.insideCanvas(x,y);
    
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