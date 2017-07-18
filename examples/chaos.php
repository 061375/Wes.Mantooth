<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - The Chaos Game (Sierpinski Triangle)</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/chaos.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
/**
* Strange Attractors in Chaos Theory
* */
window.onload = function() {
    Chaos.init();
}
var Chaos = (function() {

    "use strict";
    
    // the borders
    var tri_p = [];
    
    // track the chaos
    var prev_xy, now_xy;
    
    var LOOPID;
    var LOOPCOUNT = 0;
    var LOOPMAX = 10000;
    var I;
    var init = function() {
        // lets draw a grid to help set things up
        var w = (window.innerWidth / 2);
        var h = window.innerHeight;
        var s = w / 110;

        // initialize Wes Mantooth
        I = $w.canvas.init(document.getElementById('target'));
        // get the canvas object
        //$w.draw.grid(I,w,h,10);
        $w.draw.grid(I,w,h,10);
        // draw {5,6}
        tri_p[0] = [(w/2),(s * 3)];
        $w.canvas.text(I,tri_p[0][0],tri_p[0][1]-s,'{ 5,6 }');
        $w.canvas.circle(I,tri_p[0][0],tri_p[0][1],5);
        
        // draw {3,4}
        tri_p[1] = [(w/8),(h - (s * 4))];
        $w.canvas.text(I,tri_p[1][0]-(s * 3),tri_p[1][1],'{ 3,4 }');
        $w.canvas.circle(I,tri_p[1][0],tri_p[1][1],5);
        
        // draw {1,2}
        tri_p[2] = [(w/2)+(w/3),(h - (s * 4))];
        $w.canvas.text(I,tri_p[2][0]+(s * 2),tri_p[2][1],'{ 1,2 }');
        $w.canvas.circle(I,tri_p[2][0],tri_p[2][1],5);
        
        // create a seed
        now_xy = [(tri_p[1][0] + Math.random() * tri_p[2][0]),tri_p[0][1] + Math.random() * tri_p[1][1]];
        
        // make sure the seed is located inside the triangle
        while(!$w.collision.inside(now_xy,tri_p)) {
            now_xy = [(tri_p[1][0] + Math.random() * tri_p[2][0]),tri_p[0][1] + Math.random() * tri_p[1][1]];
        }

        LOOPID = setInterval(function(){loop()},10);
    }
    /**
     * @returns {Void}
     * */
    var loop = function() {
        
        var t;
        var r = rolldice();
        
        if (r == 1 || r == 2)t = tri_p[2];
        if (r == 3 || r == 4)t = tri_p[1];
        if (r == 5 || r == 6)t = tri_p[0];
        
        var d = $w.motion.point_direction(now_xy[0],now_xy[1],t[0],t[1],false);

        var dis = $w.motion.distance_to_point(now_xy[0],now_xy[1],t[0],t[1]);
        
        now_xy = $w.motion.motion_set(now_xy[0],now_xy[1],d,dis*30);
        
        $w.canvas.circle(I,now_xy[0],now_xy[1],1);
        
        LOOPCOUNT++;
        if (LOOPCOUNT >= LOOPMAX) {
            clearInterval(LOOPID);
        }
    }
    /**
     * rolldice
     * returns a random integer between 1 - 6
     * @returns {Number}
     * */
    var rolldice = function() {
        return 1 + Math.floor(Math.random() * 6);
    }
    return {
        init: init
    };   
}());
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
