<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Find Shapes</title>
    <link rel="stylesheet" href="../../_/css/style.css<?php echo $dev ?>" />
    <style>

    </style>
    <?php
    $path = '../../';
    require_once('../../examples/scripts.php'); ?>
    <script>
        var i;
        
        var LOOP = [];
        var RESULT = [];
        //@param {Number}
        var MAXLOOPS = 200;
        var _I = 0;
        var _L = 0;

        var xy = [
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0],
                 [0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,0,0,0],
                 [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,1,0,0,0,0,1,1,0,1,1,1,1,1,1,0,0,0],
                 [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,1,1,1,1,1,1,1,1,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,1,0,0,0,0,0,0,0,1,0,0,0,1,1,1,1,1,0,0,0],
                 [0,0,0,0,0,0,0,1,1,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                 [0,0,0,0,1,1,1,1,1,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                 [0,0,0,0,1,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,1,0],
                 [0,0,0,0,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                 [0,0,0,0,0,1,1,1,1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                 [0,0,0,0,0,0,1,1,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,0],
                 [0,0,0,0,0,0,1,1,1,1,1,0,0,1,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,0],
                 [0,0,0,0,0,1,1,0,0,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0],
                 [0,0,0,0,0,1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,1,0,0,0],
                 [0,0,0,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,1,0,0,0,0,1,0,1,1,1,0,0,0,0,0,0,0,0,1,0,0,0],
                 [0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,1,0,0,0,0,0,0,1,0,0,0],
                 [0,0,0,0,0,0,1,1,1,1,1,1,0,0,1,1,1,1,1,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0],
                 [0,1,1,0,0,0,0,1,1,1,1,1,0,0,1,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0],
                 [0,0,1,0,0,0,0,1,1,1,1,1,1,1,1,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0],
                 [0,0,1,1,1,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,1,0],
                 [0,0,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                 [0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                 [0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                 [0,0,0,0,1,1,1,0,0,1,0,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                 [0,0,0,0,1,1,1,1,1,1,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,1,1,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
                 ];
        
        
        var yl = xy.length;
        var xl = xy[0].length;
        
        window.onload = function() {

            'use strict';
            
            // initialize a Wes Mantooth canvas
            i = $w.canvas.init(document.getElementById('target'));
            // draw the grid
            $w.draw.grid(i,1000,1000,10);
            run();
        }
        function run() {
            for(var y=0; y<yl; y++) {
                for(var x=0; x<xl; x++) {
                    if (xy[y][x] == 1) {
                        $w.canvas.rectangle(i,x*10,y*10,10,10,'#2c07b9','fill');
                        LOOP.push([x,y]);
                    }
                }
            }
            _L = LOOP.length;
            let promise = look(xy,LOOP[_I][0],LOOP[_I][1]);
            promise.then(successCallback, failureCallback);
        }
        function successCallback() {
            _I++;
            if (_I<_L) {
                setTimeout(function(){
                    console.log('RUNNING');
                    let promise = look(xy,LOOP[_I][0],LOOP[_I][1]);
                    promise.then(successCallback, failureCallback);
                },100);
            }else{
                console.log(RESULT);
            }
        }
        function failureCallback(error) {
            console.log('failureCallback');
            console.log(error);
        }
        async function look(xy,x,y) {
            if (xy[y][x] != 1) {
                console.log('NO NEED TO RUN');
                return;
            }
            var RESULTnow = [];
            console.log('look');
            var obj = {
                x:x,
                y:y,
                xy:xy,
                m:true,
                i:0
            }
            
            obj = move(obj);
            
            var moves = true;
            var j = 0;
            var id = setInterval(function() {
                if(obj.i == 2)
                    RESULTnow.push([obj.x,obj.y]);
                obj = move(obj);

                moves = obj.m;
                j++;
                if (j > MAXLOOPS) {
                    console.log('MAX LOOPS');
                    moves = false;
                    j = 0;
                }
                if (!moves) {
                    clearInterval(id);
                    console.log("NO MORE MOVES");
                    var duplicate = false;
                    var rl = RESULT.length;
                    var rnl = RESULTnow.length;
                    for(var j=0; j<rl; j++) {
                        for(var k = 0; k<rnl;k++) {
                            if (RESULTnow[k][0] == RESULT[j][0] && RESULTnow[j][1] == RESULT[k][1]) {
                                duplicate = true;
                            }
                        }
                    }
                    if (!duplicate) {
                        RESULT.push(RESULTnow);
                    }
                }
            },1);
        }
        function move(obj) {
            var max = 15;
            var moved = false;
            obj.xy[obj.y][obj.x]++;
            obj.i = obj.xy[obj.y][obj.x];
            var c = obj.xy[obj.y][obj.x] * 10;
            var color = $w.color.rgbToHex(c*2,c*3,200);
           
            $w.canvas.rectangle(0,(obj.x)*10,(obj.y)*10,10,10,color,'fill');
            
            var dirs = [null,null,null,null];
            
            if (undefined !== obj.xy[obj.y-1] && obj.xy[obj.y-1][obj.x] > 0)dirs[0] = obj.xy[obj.y-1][obj.x];
            if (undefined !== obj.xy[obj.y][obj.x+1] && obj.xy[obj.y][obj.x+1] > 0)dirs[1] = obj.xy[obj.y][obj.x+1];
            if (undefined !== obj.xy[obj.y+1] && obj.xy[obj.y+1][obj.x] > 0)dirs[2] = obj.xy[obj.y+1][obj.x];
            if (undefined !== obj.xy[obj.y][obj.x-1] && obj.xy[obj.y][obj.x-1] > 0)dirs[3] = obj.xy[obj.y][obj.x-1];
            
            var min = max, dir = 0;
            for(var i = 0; i<4; i++) {
                if (dirs[i] != null)
                    if (dirs[i] < min){
                        min = dirs[i];
                        dir = i;
                    }
            }
            
            if (min < max) {
                switch(dir) {
                    case 0:
                        obj.y--;
                        moved = true;
                        break;
                    case 1:
                        obj.x++;
                        moved = true;
                        break;
                    case 2:
                        obj.y++;
                        moved = true;
                        break;
                    case 3:
                        obj.x--;
                        moved = true;
                        break;
                }
            }
            if (!moved)obj.m = false;
            
            return obj;
        }   
    </script>
    
</head>
<body>
    <div class="target left" id="target">  
    </div>
    <div class="right">
        <pre class="brush: js">
            /**
             * Finds individual shapes within a map
             * This map can be a bitmap if code is added to get canvas img data
             * This is just a proof of concept for the [Find the length of a coastline] project
             *
             * To view the resulting array Right-Click and Inspect
             * */
             
            //@param {Number} reference the canvas
            var i;
            //@param {Array}
            var LOOP = [];
            //@param {Array}
            var RESULT = [];
            //@param {Number}
            var MAXLOOPS = 200;
            //@param {Number}
            var _I = 0;
            //@param {Number}
            var _L = 0;
            //@param {Number}
            var yl = xy.length;
            //@param {Number}
            var xl = xy[0].length;
            //@param {Array} this is the map we will be testing
            var xy = [
                     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                     [0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0],
                     [0,0,0,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0],
                     [0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0],
                     [0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,0,0,0],
                     [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,1,0,0,0,0,1,1,0,1,1,1,1,1,1,0,0,0],
                     [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,1,1,1,1,1,1,1,1,0],
                     [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,0,0],
                     [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,0,0],
                     [0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,1,0,0,0,0,0,0,0,1,0,0,0,1,1,1,1,1,0,0,0],
                     [0,0,0,0,0,0,0,1,1,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                     [0,0,0,0,1,1,1,1,1,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                     [0,0,0,0,1,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,1,0],
                     [0,0,0,0,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                     [0,0,0,0,0,1,1,1,1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1,0,1,0],
                     [0,0,0,0,0,0,1,1,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,0],
                     [0,0,0,0,0,0,1,1,1,1,1,0,0,1,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,0],
                     [0,0,0,0,0,1,1,0,0,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0],
                     [0,0,0,0,0,1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,1,0,0,0],
                     [0,0,0,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0],
                     [0,0,0,0,0,1,1,1,1,0,0,0,0,1,0,0,0,0,1,0,1,1,1,0,0,0,0,0,0,0,0,1,0,0,0],
                     [0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,1,0,0,0,0,0,0,1,0,0,0],
                     [0,0,0,0,0,0,1,1,1,1,1,1,0,0,1,1,1,1,1,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0],
                     [0,1,1,0,0,0,0,1,1,1,1,1,0,0,1,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0],
                     [0,0,1,0,0,0,0,1,1,1,1,1,1,1,1,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0],
                     [0,0,1,1,1,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,1,0],
                     [0,0,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                     [0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                     [0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                     [0,0,0,0,1,1,1,0,0,1,0,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0],
                     [0,0,0,0,1,1,1,1,1,1,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,1,1,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0],
                     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
                     ];
            // when the browser is ready
            window.onload = function() {
    
                'use strict';
                
                // initialize a Wes Mantooth canvas
                i = $w.canvas.init(document.getElementById('target'));
                // draw the grid
                $w.draw.grid(i,1000,1000,10);
                run();
            }
            /**
             * run everything when ready
             * @returns {Void}
             **/
            function run() {
                // loop the map
                for(var y=0; y&lt;yl; y++) {
                    for(var x=0; x&lt;xl; x++) {
                        // if this pixel is a target and has not yet been tested
                        if (xy[y][x] == 1) {
                            // draw a dot here
                            $w.canvas.rectangle(i,x*10,y*10,10,10,'#2c07b9','fill');
                            // add the x,y coordinate to an array
                            LOOP.push([x,y]);
                        }
                    }
                }
                // get the length of the loop array
                _L = LOOP.length;
                // run the loop with a promise in order to allow asynchronous 
                let promise = look(xy,LOOP[_I][0],LOOP[_I][1]);
                promise.then(successCallback, failureCallback);
            }
            /**
             * @returns {Void}
             * */
            function successCallback() {
                _I++;
                if (_I&lt;_L) {
                    setTimeout(function(){
                        console.log('RUNNING');
                        let promise = look(xy,LOOP[_I][0],LOOP[_I][1]);
                        promise.then(successCallback, failureCallback);
                    },100);
                }else{
                    console.log(RESULT);
                }
            }
            /**
             * @returns {Void}
             * */
            function failureCallback(error) {
                console.log('failureCallback');
                console.log(error);
            }
            /**
             * @param {Array}
             * @param {Number}
             * #param {Number}
             * @returns {Void}
             * */
            async function look(xy,x,y) {
                // check if this shape has already been found 
                if (xy[y][x] != 1) {
                    console.log('NO NEED TO RUN');
                    return;
                }
                // @param {Array} a local array to test against
                var RESULTnow = [];
                
                console.log('look');
                //@param {Object}
                var obj = {
                    x:x,
                    y:y,
                    xy:xy,
                    m:true,
                    i:0
                }
                // run a test on the first pixel
                obj = move(obj);
                
                //@param {Boolean}
                var moves = true;
                //@param {Number}
                var j = 0;
                //@param {Number}
                var id = setInterval(function() {
                    if(obj.i == 2)
                        RESULTnow.push([obj.x,obj.y]);
                    // run the test
                    obj = move(obj);
                    // update if there are any moves left
                    moves = obj.m;
                    // increment the counter
                    j++;
                    // if the test has run too many times its likely never to complete
                    if (j > MAXLOOPS) {
                        console.log('MAX LOOPS');
                        moves = false;
                        j = 0;
                    }
                    if (!moves) {
                        clearInterval(id);
                        console.log("NO MORE MOVES");
                        var duplicate = false;
                        var rl = RESULT.length;
                        var rnl = RESULTnow.length;
                        for(var j=0; j&lt;rl; j++) {
                            for(var k = 0; k&lt;rnl;k++) {
                                if (RESULTnow[k][0] == RESULT[j][0] && RESULTnow[j][1] == RESULT[k][1]) {
                                    duplicate = true;
                                }
                            }
                        }
                        if (!duplicate) {
                            RESULT.push(RESULTnow);
                        }
                    }
                },1);
            }
            function move(obj) {
                var max = 15;
                var moved = false;
                obj.xy[obj.y][obj.x]++;
                obj.i = obj.xy[obj.y][obj.x];
                var c = obj.xy[obj.y][obj.x] * 10;
                var color = $w.color.rgbToHex(c*2,c*3,200);
               
                $w.canvas.rectangle(0,(obj.x)*10,(obj.y)*10,10,10,color,'fill');
                
                var dirs = [null,null,null,null];
                
                if (undefined !== obj.xy[obj.y-1] && obj.xy[obj.y-1][obj.x] > 0)dirs[0] = obj.xy[obj.y-1][obj.x];
                if (undefined !== obj.xy[obj.y][obj.x+1] && obj.xy[obj.y][obj.x+1] > 0)dirs[1] = obj.xy[obj.y][obj.x+1];
                if (undefined !== obj.xy[obj.y+1] && obj.xy[obj.y+1][obj.x] > 0)dirs[2] = obj.xy[obj.y+1][obj.x];
                if (undefined !== obj.xy[obj.y][obj.x-1] && obj.xy[obj.y][obj.x-1] > 0)dirs[3] = obj.xy[obj.y][obj.x-1];
                
                var min = max, dir = 0;
                for(var i = 0; i&lt;4; i++) {
                    if (dirs[i] != null)
                        if (dirs[i] &lt; min){
                            min = dirs[i];
                            dir = i;
                        }
                }
                
                if (min &lt; max) {
                    switch(dir) {
                        case 0:
                            obj.y--;
                            moved = true;
                            break;
                        case 1:
                            obj.x++;
                            moved = true;
                            break;
                        case 2:
                            obj.y++;
                            moved = true;
                            break;
                        case 3:
                            obj.x--;
                            moved = true;
                            break;
                    }
                }
                if (!moved)obj.m = false;
                
                return obj;
            }    
        </pre>
    </div>
</body>