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
 * "The Chaos Game" to build the Sierpinski Triangle
 *
 * @author Jeremy Heminger &lt;j.heminger13@gmail.com>
 * @dependency wes.mantooth.js
 *
 * This was discovered in the 1970's. It's called a game, but really it's a demonstartion of stange attractors.
 * 1. On a piece of paper draw 3 points creating a triangle. Let these points be named [ [ 1,2 ],[ 3,4 ],[ 5,6 ] ]
 * 2. Draw a point at any random location on the paper (as long as it is within the triangle)
 * 3. Roll a 6-sided die
 * 4. Draw a point half-way from the first point to the corresponding point in the triangle to the roll of the die.
 * - example a roll of 3 would correpond to point [ 3,4 ]
 * 5. Roll the die again
 * 6. From the second point, draw another point half-way to the corresponding point (repeating step 4 )
 * 7. Repeat this steps n
 *
 * The result will be a highly ordered system from a nearly random input
 *
 * This program automates the steps to allow the result to be displayed
 * */

 
// when the browser is ready, run the program
window.onload = function() {
    Chaos.init();
}
/**
 * Chaos
 * @returns {Object}
 * */
var Chaos = (function() {

    "use strict";
    
    // the borders
    // @param {Array}
    var tri_p = [];
    
    // track the chaos
    // @param {Array}
    var prev_xy, now_xy;
    
    // @param {Number}
    var LOOPID;
    
    // @param {Number}
    var LOOPCOUNT = 0;
    
    // @param {Number}
    var LOOPMAX = 10000;
    
    // @param {Number}
    var I;
    
    /**
     * init
     * initialize everything
     * @returns {Void}
     * */
    var init = function() {
        
        // set the grid to 1/2 the visible width x the visible height
        // @param {Number}
        var w = (window.innerWidth / 2);
        // @param {Number}
        var h = window.innerHeight;
        
        // set a grid unit
        // @param {Number}
        var s = w / 110;

        // initialize Wes Mantooth
        I = $w.canvas.init(document.getElementById("target"));
        
        // lets draw a grid to help set things up
        $w.draw.grid(I,w,h,10);
        
        // draw {5,6}
        tri_p[0] = [(w/2),(s * 3)];
        $w.canvas.text(I,tri_p[0][0],tri_p[0][1]-s,"{ 5,6 }");
        $w.canvas.circle(I,tri_p[0][0],tri_p[0][1],5);
        
        // draw {3,4}
        tri_p[1] = [(w/8),(h - (s * 4))];
        $w.canvas.text(I,tri_p[1][0]-(s * 3),tri_p[1][1],"{ 3,4 }");
        $w.canvas.circle(I,tri_p[1][0],tri_p[1][1],5);
        
        // draw {1,2}
        tri_p[2] = [(w/2)+(w/3),(h - (s * 4))];
        $w.canvas.text(I,tri_p[2][0]+(s * 2),tri_p[2][1],"{ 1,2 }");
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
     * loop
     * self explanitory
     * @returns {Void}
     * */
    var loop = function() {
        // holds the current target
        // @param {Array}
        var t;
        // let r be the value of roll of the dice
        var r = rolldice();
        
        // 
        if (r == 1 || r == 2)t = tri_p[2];
        if (r == 3 || r == 4)t = tri_p[1];
        if (r == 5 || r == 6)t = tri_p[0];
        
        // get the direction of the target point from the current origin
        var d = $w.motion.point_direction(now_xy[0],now_xy[1],t[0],t[1],false);

        // get the distance to the target point form the current origin
        var dis = $w.motion.distance_to_point(now_xy[0],now_xy[1],t[0],t[1]);
        
        // set the current origin to a point 1/2 the distance form the origin to the target
        now_xy = $w.motion.motion_set(now_xy[0],now_xy[1],d,dis*30);
        
        // draw a dot at the new origin
        $w.canvas.circle(I,now_xy[0],now_xy[1],1);
        
        // increment the loop count
        LOOPCOUNT++;
        if (LOOPCOUNT >= LOOPMAX) {
            // if the loopcount is greater than the loopmax then we are done
            clearInterval(LOOPID);
        }
    }
    /**
     * rolldice
     * returns a random integer between 1 - 6
     * @returns {Number}
     * */
    var rolldice = function() {
        // well use the $ws function framdom
        // to get a flat integer between 1-6
        return 1 + $w.math.frandom(6);
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
