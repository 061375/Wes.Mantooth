<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Sprite Animation</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/sprite_animation.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        #target {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left" id="target">
            
        </div>
        <div class="right">
            <label for="left">
                <input type="button" id="left" value="Run animation forward" />
            </label>
            <label for="right">
                <input type="button" id="right" value="Run animation in reverse" />
            </label>
            <label for="start">
                <input type="button" id="start" value="Start" />
            </label>
            <label for="stop">
                <input type="button" id="stop" value="Stop" />
            </label>
            <label for="turntable">
                Turntable
                <input type="checkbox" id="turntable" checked="checked" />
            </label>
            <label for="speed">
                Speed
                <input type="range" id="speed" min="0" max="50" value="25" />
                <span id="speed-range">25</span>
            </label>
            <label for="direction">
                Direction
                <input type="range" id="direction" min="1" max="8" value="1" />
                <span id="direction-range">1</span>
            </label>
        </div>
        <img id="sprite" src="../_/assets/sprites/runningman.png" />
        <pre class="brush: js">
/**
 *
 *
 * */
window.onload = function(){
    // comment to pass logs
    //$w.boolLog = false;
    $w.makeFPS();
    $w.canvas.init(document.getElementById('target'),
              400,
              300,
    function(i){
        Sprite.init(i,document.getElementById('sprite').src,function(r) {
            if (r) {
                Sprite.setO_val('i',i);
                Sprite.left();
            }
        });
    }); 
}
/**
 * Sprite
 * @version 1.0.0
 * @author Jeremy Heminger &lt;j.heminger@gmail.com>
 * 2017
 * */
var Sprite = (function() {

    "use strict";
    
    var O = {
        speed:30,
        maxXframes:46,
        maxYframes:8,
        frameX:0,
        frameY:0,
        frameW:100,
        frameH:75,
        frameSize:3,
        turntable:true,
        running:false,
        img:'',
        dir:0,// 0, 1, 2 stopped, left, right
        // we'll assume here that i is the first key
        i:0
    }
    /**
     * @param {Number} i reference to canvas layer
     * @param {String} img path to image tobe loaded
     * @return {Object} image object
     * */
    var init = function(i,img,callback) {
        $w.loading.init(document.getElementById("target"),0,"",function(r){
            if (!r) {
                callback(false);
            }
            $w.loading.load({running_man:img},function(){
               bind();
               O.img = $w.assets.img.running_man;
               if (typeof callback === "function") callback();
            });
        });
    }
    /**
     * bind events to dom nodes
     * @returns {Void}
     * */
    var bind = function() {
        document.getElementById("start").addEventListener("click",function(){$w.log("start");if (O.dir == 0)start()});
        document.getElementById("stop").addEventListener("click",function(){$w.log("stop");if (O.dir != 0)stop()});
        document.getElementById("left").addEventListener("click",function(){$w.log("left");if (O.dir != 1){stop();O.dir = 1;left()}});
        document.getElementById("right").addEventListener("click",function(){$w.log("right");if (O.dir != 2){stop();O.dir = 2;right()}});
        document.getElementById("turntable").addEventListener("change",function(){$w.log("turntable");turntable()});
        document.getElementById("speed").addEventListener("change",function(e){$w.log("speed");speed(this.value)});
        document.getElementById("direction").addEventListener("change",function(e){$w.log("direction");direction(this.value)});
    }
    /**
     * @returns {Void}
     * */
    var left = function() {
        
        
        // move the animation 1 frame forward
        // if the last frame for this direction is met and turntable is true
        // rotate the animation direction
        O.frameX++;
        if (O.frameX == O.maxXframes && O.turntable)
            O.frameY++;
        // loop the animation frames as necessary
        bound();
        
        draw(function(){left()});
    }
    /**
     * @returns {Void}
     * */
    var right = function() {

        // move the animation 1 frame forward
        // if the last frame for this direction is met and turntable is true
        // rotate the animation direction
        O.frameX--;
        if (O.frameX <= 0 && O.turntable)
            O.frameY--;
        // loop the animation frames as necessary
        bound();
        
        draw(function(){right()});
    }
    /**
     * @returns {Void}
     * */
    var start = function() {
        O.dir = 1;
        left();
    }
    /**
     * @returns {Void}
     * */
    var stop = function() {
        O.dir = 0;
    }
    /**
     * @param {Number}
     * @returns {Void}
     * */
    var speed = function(s) {
        O.speed = s;
        document.getElementById("speed-range").innerHTML = s;
    }
    /**
     * @param {Number}
     * @returns {Void}
     * */
    var direction = function(d) {
        O.frameY = d;
        document.getElementById("direction-range").innerHTML = d;
    }
    /**
     * @returns {Void}
     * */
    var turntable = function() {
        if (O.turntable) {
            O.turntable = false;
        }else{
            O.turntable = true;
        }
    }
    /**
     * sets boundariers for the animation frames based on set parameters
     * @param {Function} callback
     * @returns {Function}
     * */
    var bound = function(callback) {
        if (O.frameX >= O.maxXframes) {
            O.frameX = 0;
        }
        if (O.frameY >= O.maxYframes) {
            O.frameY = 0;
        }
        if (O.frameX < 0) {
            O.frameX = O.maxXframes;
        }
        if (O.frameY < 0) {
            O.frameY = O.maxYframes;
        }
        if (typeof callback === 'function') callback();
    }
    /**
     * @param {Object} 
     * @returns {Void}
     * */
    var draw = function(callback) {
        // draw the animation frame
        if(!$w.canvas.image(O.i,{
            img:O.img,
            sx:(O.frameX*O.frameW)+1,
            sy:(O.frameY*O.frameH)+1,
            sWidth:O.frameW,
            sHeight:O.frameH,
            dx:0,
            dy:0,
            dWidth:(O.frameW*O.frameSize),
            dHeight:(O.frameH*O.frameSize)})){
            // if an error is returned throw the error
            $w.canvas.has_error();
        }else{
            // else request animation frame and loop
            
            // setInterval is faster and $w.canvas.draw is faster still (based on your machine)
            // but in this case setTimeout is appropriate
            if (O.dir != 0)
            setTimeout(function(){$w.upFPS();callback()},O.speed);
        }
    }
    /**
     * wrapper to update O
     * @returns {Void}
     * */
    var setO_val = function(k,v) {
        O[k] = v;
    }
    return {
        init: init,
        left: left,
        right: right,
        setO_val: setO_val
    };   
}());
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
