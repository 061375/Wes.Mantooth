<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - </title>
    <style>

    </style>
    <?php
    require_once('../../examples/scripts.php'); ?>
    <script>
        var i;
        
        var LOOP = [];
        var RESULT = [];
        var _I = 0;
        var _L = 0;

        var xy = [
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0],
                 [0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0],
                 [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0],
                 [0,0,0,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                 [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
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
            
            moves = true;
            var j = 0;
            var id = setInterval(function() {
                if(obj.i == 2)RESULTnow.push([obj.x,obj.y]);
                obj = move(obj);

                moves = obj.m;
                j++;
                if (j > 200) {
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
            var max = 8;
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
    <div class="target" id="target">  
    </div>
</body>