<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Simple Draw a Grid</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/knearest.2.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
/**
 * a Javascript implementation of the k-nearest algorithm
 *
 * https://www.youtube.com/watch?v=AoeEHqVSNOw
 *
 * Following these tutorials I decided to write a javascript version of the algorithm
 * ( not based on the sample code but based on the teachers visual explaination about
 * how the agorithm worked). 
 *
 * @author Jeremy Aaron Heminger &lt;j.heminger13@gmail.com>
 *
 * */
window.onload = function() {
   
    'use strict';
    
    $w.boolLog = true;
    
    // initialize
    $w.log('initilizing');
    
    var i = $w.canvas.init(document.getElementById('target'),1000,1000),
        r,
        NUMBEROFTESTS = 30,
        NUMBEROFSAMPLES = 5, // the number of samples to test against ( &lt;= (red || green) length)
        QUARTERSIZE = 500, // the size of the grid quarter (for drawing)
        GREEN = '#008040',
        BLUE = '#0013ff',
        SAMPLEDOTSIZE = 5,
        TESTDOTSIZE = 8,
        LABELOFFSET = 8;
        
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
    
    // create our sample data
    var green = [
        [-433,-400],
        [-200,-133],
        [10,-60],
        [-100,10],
        [-200,-200]
    ];
    //
    var blue = [
        [100,200],
        [322,233],
        [127,88],
        [357,276],
        [430,227]
    ];
    
    //
    var greenl = green.length, bluel = blue.length;
    
    $w.log("Sample:");
    $w.log("- green: "+greenl);
    $w.log("- blue: "+bluel);
    $w.log("- total: "+greenl+bluel);
    
    var TEST = new WhatIsit(green,blue,QUARTERSIZE,TESTDOTSIZE,GREEN,BLUE);
    
    // build some random tests
    var tests = [], j = 0;
    
    for(j;j&lt;NUMBEROFTESTS;j++) {
        tests[j] = [];
        tests[j][0] = $w.math.frandom(1000) - 1000; // random x
        tests[j][1] = $w.math.frandom(1000) - 1000; // random y
        tests[j] = TEST.dtogrid(tests[j][0],tests[j][1],QUARTERSIZE);
    }
    
    
    $w.log("drawing sample data");
    
    // setup the visible part of the tests
    for(var j=0; j&lt;greenl; j++) { 
        green[j] = TEST.dtogrid(green[j][0],green[j][1]);
        $w.canvas.circle(i,green[j][0],green[j][1],SAMPLEDOTSIZE,GREEN);
        $w.canvas.text(i,green[j][0],green[j][1]-LABELOFFSET,'{'+(green[j][0]-QUARTERSIZE)+','+(green[j][1]-QUARTERSIZE)+'}');
    }
    // setup the visible part of the tests
    for(var j=0; j&lt;bluel; j++) {
        blue[j] = TEST.dtogrid(blue[j][0],blue[j][1],QUARTERSIZE);
        $w.canvas.circle(i,blue[j][0],blue[j][1],SAMPLEDOTSIZE,BLUE);
        $w.canvas.text(i,blue[j][0],blue[j][1]-LABELOFFSET,'{'+(blue[j][0]-QUARTERSIZE)+','+(blue[j][1]-QUARTERSIZE)+'}');
    }
    
    $w.log("run test");
    
    // run everything 
    for (var jj=0;jj&lt;NUMBEROFTESTS;jj++) {
        tests[jj] = TEST.dtogrid(tests[jj][0],tests[jj][1],QUARTERSIZE);
        r = TEST.knearest(tests[jj][0],tests[jj][1],green,blue,NUMBEROFSAMPLES);
        TEST.drawnearest(i,tests[jj][0],tests[jj][1],r);
    }
}
/**
 * WhatIsit
 * @param {Array}
 * @param {Array}
 * @returns {Void}
 * */
var WhatIsit = function(green,blue,qsize,tdotsize,gcolor,bcolor) {
    this.green = green;
    this.blue = blue;
    this.greenl = green.length;
    this.bluel = blue.length;
    this.alength = this.bluel + this.greenl;
    this.qsize = qsize;
    this.tdotsize = tdotsize;
    this.gcolor = gcolor;
    this.bcolor = bcolor;
}
/**
 * knearest
 * @param {Number}
 * @param {Number}
 * @param {Array}
 * @param {Array}
 * @param {Number}
 * @returns {Array}
 * */
WhatIsit.prototype.knearest = function(x,y,green,blue,th) {
    
    var ro = {},re = [],c=0;
    
    green = this.merge(green,blue);
    
    for(var h=0;h&lt;this.alength;h++) {
        
        // get the current distance
        cnow=$w.motion.distance_to_point(x,y,green[h][0],green[h][1]);
        
        // if the current distance to target is less than the closest target
        if (h&lt;(this.alength-this.bluel)) {
            green[h][2] = 0; // green
        }else{
            green[h][2] = 1; // blue
        }
        // flatten the distance and make it a key in the object
        ro[Math.floor(cnow)] = green[h];
    }
    // @todo maybe there is a better way to get these without looping through them all...(maybe not)
    // the object will be ordered by distance
    for(var h in ro) {
        // so I can grab the sample size requested by th
        // if th is met then we are done
        if (c>=th) continue;
        // move the count forward
        c++;
        // add the result to the array
        re.push(ro[h]);
    }
    //
    return re;
}
/**
 * merge
 * merges two arrays
 * @param {Array}
 * @param {Array}
 * @returns {Array}
 * */
WhatIsit.prototype.merge = function(a,b) {
    // get a length
    var al = a.length;
    // get b length
    var bl = al+b.length;
    // 
    var hh=0,jj = 0;
    // start the loop where a ends
    for (hh=al;hh&lt;bl;hh++) {
        // add b to a with a the key jj
        a[hh] = b[jj++];
    }
    return a;
}
/**
 * drawnearest
 * determines what the test subject is based on a vote of the nearest n samples
 * @param {Number} the ctx reference
 * @param {Number} x
 * @param {Number} y
 * @param {Array} the samples
 * @returns {Void}
 * */
WhatIsit.prototype.drawnearest = function(i,x,y,r) {
    
    var green = 0, blue = 0
    
    l = r.length;
    
    for(j=0;j&lt;l;j++) {
        // check the 3rd param
        if (r[j][2] == 0) {
            green++; // increment green
        }else{
            blue++; // increment blue
        }
        // draw a line to the sample from the test
        $w.canvas.line(i,r[j][0],r[j][1],x,y,'#000000');
    }
    var color;
    if (green > blue) {
        // It's a Green!!
        $w.log("It's a Green!!!");
        color = this.gcolor;
    }else{
        // It's a Blue!!
        $w.log("It's a Blue!!!");
        color = this.bcolor;
    }
    // draw a dot where the test is base don the winning color
    $w.canvas.circle(i,x,y,this.tdotsize,color);
}
/**
 * dtogrid
 * converts a coord to a location on the canvas for drawing
 * @param {Number} x
 * @param {Number} x
 * @returns {Array}
 * */
WhatIsit.prototype.dtogrid = function(x,y) {
    x+=this.qsize;
    y+=this.qsize;
    return [x,y];       
}
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
