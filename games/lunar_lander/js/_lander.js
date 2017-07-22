var Lander = (function(){
    // @param {Number}
    var i;
    // @param {Number}
    var frameWidth;
    // @param {Number}
    var frameHeight;
    // @param {Number}
    var frameX = 2;
    // @param {Number}
    var x = 20;
    // @param {Number}
    var y = 20;
    // @param {Number}
    var vspeed = 0;
    // @param {Number}
    var hspeed = 0.5;
    // @param {Number}
    var fuel = 100;
    // @param {String}
    var shipimg;
    // @param {Number}
    var thrustpower = 0.02;
    // @param {Number}
    var maxVthrust = 10;
    // @param {Number}
    var maxHthrust = 5;
    // @param {Number}
    var minHthrust = -5;
    // @param {Number}
    var G = 0.01;
    // @param {Number}
    var F = 0.01;
    // @param {Boolean}
    var landingpad = false;
    
    var running = false;
    
    var boundingbox;
    
    var $vspeed, $hspeed, $fuel;
    /**
     * */
    var init = function($t) {
        // create stats 
        var stats = document.createElement('div');
            stats.setAttribute('id','ship_stats');
            var vspeed = document.createElement('div');
                vspeed.innerHTML = 'Vertical Speed: <span id="vspeed"></span>';
            stats.appendChild(vspeed);
            var hspeed = document.createElement('div');
                hspeed.innerHTML = 'Horizontal Speed: <span id="hspeed"></span>';
            stats.appendChild(hspeed);
            var fuel = document.createElement('div');
                fuel.innerHTML = 'Fuel: <span id="fuel"></span>';
            stats.appendChild(fuel);
        document.getElementsByTagName('body')[0].appendChild(stats);
        // cache refs to stats
        $vspeed = document.getElementById('vspeed');
        $hspeed = document.getElementById('hspeed');
        $fuel = document.getElementById('fuel');
        
        
        //
        $w.canvas.init($t,$w.main.width,$w.main.height,function(j){
            i = j;
            shipimg = $w.assets.img.lander_tiny;
            frameHeight = shipimg.height;
            frameWidth = Math.floor(shipimg.width /7);
    
            // bind key events
            $w.game.bindkeys({
                ArrowDown:ThrustDownOff
            },"keyup");
            $w.game.bindkeys({
                 ArrowDown:ThrustDown
            },"keydown");
            $w.game.bindkeys({
                ArrowLeft:ThrustLeftOff
            },"keyup");
            $w.game.bindkeys({
                 ArrowLeft:ThrustLeft
            },"keydown");
            $w.game.bindkeys({
                ArrowRight:ThrustRightOff
            },"keyup");
            $w.game.bindkeys({
                 ArrowRight:ThrustRight
            },"keydown");
            // @todo - add thust amount using top number keys (ala Eagle Lander)
            running = true;
            
            loop();
        });
    }
    var loop = function() {
        
        y-=vspeed;
        x+=hspeed;
        vspeed-=G;
        
        setStats();
        
        if(!$w.canvas.image(i,{
            img:shipimg,
            sx:(frameX*frameWidth),
            sy:0,
            sWidth:frameWidth, 
            sHeight:frameHeight,
            dx:x,
            dy:y,
            dWidth:frameWidth,
            dHeight:frameHeight})){
            $w.canvas.has_error();
        }else{
            if(running) {
                window.requestAnimationFrame(loop.bind(this));
            }
        }
        boundingbox = [
            [x,y],
            [x+frameWidth,y],
            [x,y+frameHeight],
            [x+frameWidth,y+frameHeight]];
        if (checkCollision(boundingbox) && running) {
           if (checkSuccess(boundingbox)) {
                running = false;
           }
        }
    }
    var ThrustDown = function() {
        frameX = 1;
        if (vspeed < maxVthrust) {
            vspeed+=thrustpower;
        }
    }
    var ThrustDownOff = function() {
        frameX = 2;
    }
    var ThrustLeft = function() {
        frameX = 4;
        if (hspeed < maxHthrust) {
            hspeed+=thrustpower;
        }
    }
    var ThrustLeftOff = function() {
        frameX = 2;
    }
    var ThrustRight = function() {
        frameX = 3;
        if (hspeed > minHthrust) {
            hspeed-=thrustpower;
        }
    }
    var ThrustRightOff = function() {
        frameX = 2;
    }
    var checkCollision = function(a) {
        if(Moon.checkCollision(a)) {
            //
            running = false;
            alert('162');
        }
        // the only objects in the list should be landing pads
        $w.loop();
        if (landingpad) {
            running = false;
            if (vspeed < -0.9 || hspeed > 0.1) {
                
                if (vspeed < -0.05 || hspeed < 0.1) {
                    alert('171');
                }else{
                    alert('173');
                }
            }else{
                alert('176');
            }
        }
        
    }
    var checkSpeed = function() {
        
    }
    var checkSuccess = function(a) {
            
    }
    var setStats = function() {
        $vspeed.innerHTML = vspeed.toFixed(2);
        $hspeed.innerHTML = hspeed.toFixed(2);    
    }
    /**
     * */
    var setLandingPadCollision = function(c) {
        landingpad = c;
    }
    /**
     * */
    var getBbox = function() {
        return boundingbox;
    }
    return {
        init:init,
        getBbox:getBbox,
        setLandingPadCollision:setLandingPadCollision
    }
})();