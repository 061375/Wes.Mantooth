<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - HD</title>
    <?php
    $path = '../../';
    require_once('../examples/scripts.php'); ?>
    <script>
        
        function twoDimension() {
            var i=0,l=360,x=0,y=0;
            for(i;i<l;i++) {
                y = (i*i) / 200000;
                x = 1 - y;
                console.log('x :'+x);
                console.log('y :'+y);
                console.log(x+y);
            }
        }
        function threeDimension(i,c) {
            var j=0,l=2000,x=0,y=0,z=1;
            for(j;j<l;j++) {
                y = (j*j) / 200000;
                x = (1 - z) - y;
                
                console.log('x :'+x);
                console.log('y :'+y);
                console.log('z :'+z);
                console.log(x+y+z);
                drawCircle(i,c,x,y,z);
            }
        }
        function drawCircle(i,c,x,y,z) {
            x = (c+(x*800));
            y = (c+(y*800));
            z = z * 800;
            var r = Math.atan2(x,y);
            var d = r * (180 / Math.PI);
            //var a = d * (Math.PI/180);
            var xpos = z * Math.cos(r);
            var ypos = z * Math.sin(r);
            $w.canvas.circle(i,xpos,ypos,1);
        }
        
        window.onload = function() {
            var c = 300, i = $w.canvas.init(document.getElementById('target'));
            // draw the grid
            /**
             * @param {Number} reference the canvas
             * @param {Number} width
             * @param {Number} height
             * @param {Number} grid unit
             * @param {Function} callback
             */
            $w.draw.grid(i,1000,1000,10,function(){
                threeDimension(i,c);
            });
        }
    </script>
</head>
<body>
    <div id="target">  
    </div>
</body>