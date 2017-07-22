var Moon = (function(){
    var pmax;
    var whatsleft;
    var ground = [];
    var lsite = [];
    /**
     * the initialization variables will be based on the difficulty level of the game
     * @param {Integer} p number of peaks
     * @param {Number} lp number of landing pads
     * @param {Number} s abruptness of the slope
     * */
    var init = function($t,p,lp,s,callback) {
        pmax = $w.main.height / 2;
        var x=0,y=0;
        // set the base
        ground.push([0,$w.main.height]);
        // set the first point the mountain
        var lastx = 0;
        var lasty = getHeight(getRandom(s));
        var last = [lastx,lasty];
        ground.push(last);
        // loop
        for(var i=1;i<(p-1);i++) {
            x += getRandom($w.main.width / (p/2));
            if(isLandingPad(lp,lsite.length,i,p,(x-lastx))) {
                y = lasty;
                lsite.push([lastx,y,x-lastx]);
            }else{
                y = getRandom(s);
                if (y - (y/2) > 0) {
                    y = Math.floor(y - (y/2));
                }
                y = getHeight(y);
            }
            lastx = x;
            lasty = y;
            last = [lastx,lasty];
            ground.push(last);
        }
        ground.push([$w.main.width,$w.main.height]);
        $w.canvas.init($t,$w.main.width,$w.main.height,function(i) {
            $w.canvas.polygon(i,ground,'#ffffff','fill');
        });
        var l = lsite.length;
        for (var i=0;i<l;i++) {
            // need to add here
            $w.add_object(1,landingSite,{x:lsite[i][0],y:lsite[i][1],w:lsite[i][2]},$t,$w.main.width,$w.main.height);
        }
        $w.loop();
        callback();
    }
    /**
     * returns the height of the peak
     * the value m inverse to the height of the canvas
     * @param {Number}
     * @returns {Number}
     * */
    var getHeight = function(m) {
        return $w.main.height - m;    
    }
    /**
     * returns a random integer
     * @param {Number}
     * @returns {Integer}
     * */
    var getRandom = function(m) {
        return Math.floor(Math.random() * m);
    }
    /**
     * determines if this section should be flat
     * @param {Number}
     * @param {Number}
     * @returns {Boolean}
     * */
    var isLandingPad = function(lp,lc,i,p,chk) {

        // if this is the last peak to be drawn
        // and there is still no landing pad
        // last ditch ... make one
        if (i==(p-2) && lc == 0) {
            return true;
        }
        // makes sue the width of the landing pad is grater than 50px
        if (chk < 50) return false;
        // makes sure there aren't too many pads
        if (lc >= lp) return false;
        
        if ((Math.random() * 1000) < 300) {
            return true;    
        }
        return false;
    }
    var checkCollision = function(a) {
        var b = ground;
        var isc = false;
        var l = a.length;
        for(var i=0; i<l; i++) {
            if($w.collision.inside(a[i],b))isc = true;
        }
        return isc;
    }
    var getGround = function() {
        return ground;
    }
    return {
        init:init,
        getGround:getGround,
        checkCollision:checkCollision
    }
})();
/**
 * @param {Object}
 * */
var landingSite = function(o){
    this.i = o.i;
    this.x = o.x;
    this.y = (o.y-3);
    this.w = o.w
    this.bool = false;
    /**
     * */
    this.loop = function() {
        if(!this.bool){
            $w.canvas.rectangle(this.i,this.x,this.y,this.w,10,'#ff0000','fill');
        }else{
            console.log('loop');
            if(this.checkCollision()) {
                Lander.setLandingPadCollision(true);
            }
        }
    },
    this.checkCollision = function() {
        var a = [
            [this.x,this.y],
            [this.x+this.w,this.y],
            [this.x+this.w,this.y+3],
            [this.x,this.y+3]
        ];
        var b = Lander.getBbox();
        // get rectangle
        var isc = false;
        var l = a.length;
        for(var i=0; i<l; i++) {
            if($w.collision.inside(a[i],b))isc = true;
        }
        return isc;
    }
};