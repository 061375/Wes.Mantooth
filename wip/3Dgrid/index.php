<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - </title>
    <style>

    </style>
    <?php
    require_once('../../examples/scripts.php'); ?>
    <script>
        const   W = 800,
                H = 800
        window.onload = function() {

            'use strict';
            
            $w.gamespeed = 80;
            
            var i = $w.add_object_single (
                1,
                Grid,{
                    w:W,
                    h:H
                },
                document.getElementById('target'),
                W,H
            );
            
            $w.loop(true,i);
        }
        /**
         * Grid
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var Grid = function(o){
            this.degrees = 0;
            this.d = false;
            this.fov = 200;
            this.w = o.w;
            this.i = o.i;
            this.x = 0;
            this.y = 0;
            this.z = 0;
            this.origin = {
                x:o.w/2,
                y:o.w/2,
                z:o.w/2
            }
            //this.pitch = 0;
            //this.yaw = 0;
            this.points = [
                [-400,-400,600],
                [400,-400,600],
                [400,400,100],
                [-400,400,100]
            ];
            var i = 0;
            this.threed = [];
            for(var x=-400; x<400; x+=50) {
                for(var y=-400; y<400; y+=50) {
                    for(var z=100; z<600; z+=50) {
                        this.threed[i] = $w.threed.makeA3DPoint(
                            x,
                            y+Math.random() * 10,
                            z
                        );
                        i++;
                    }
                }
                this.threedl = this.threed.length;
                this.draw();
                i = 0;
                this.threed = [];
            }
            /*
            console.log(this.points);
            this.threed = [];
            var l = this.points.length;
            for (var i=0; i<l; i++) {
                this.threed[i] = $w.threed.makeA3DPoint(
                    this.points[i][0],
                    this.points[i][1],
                    this.points[i][2]
                );
            }
            this.threedl = this.threed.length;
            */
        }
        /**
         * loop
         * @returns {Void}
         * */
        Grid.prototype.loop = function() {
            //this.degrees++;
            //if (this.degrees > 360) this.degrees -= 360;
            //this.draw();
            var i = 0;
            this.threed = [];
            for(var x=-400; x<400; x+=50) {
                for(var y=-400; y<400; y+=50) {
                    for(var z=100; z<800; z+=50) {
                        this.threed[i] = $w.threed.makeA3DPoint(
                            x,
                            600-Math.random() * (Math.random() * 800),
                            z
                        );
                        i++;
                    }
                }
                this.threedl = this.threed.length;
                this.draw();
                i = 0;
                this.threed = [];
            }
        }
        
        Grid.prototype.draw = function(){
            
            var start = 0;
            for(var i=0; i<this.threedl; i++){
                if (i==0) {
                    start = this.threed[i];
                }
                var p1 = this.threed[i];
                //p1.x = (Math.sin($w.math.radians(this.degrees)) * ($w.motion.distance_to_point(p1.x,p1.y,this.origin.x,this.origin.y))/100);//this.x;
                //p1.y += this.y
                //p1.y += (Math.cos($w.math.radians(this.degrees)) * ($w.motion.distance_to_point(p1.x,p1.y,this.origin.x,this.origin.y))/100);//this.z;
                p1 = $w.threed.convertPointIn3DToPointIn2D(p1,this.fov);
                var p2;
                if (undefined === this.threed[i+1]) {
                    p2 = start;
                }else{
                    p2 = this.threed[i+1];
                }
                //p2.x += (Math.sin($w.math.radians(this.degrees)) * ($w.motion.distance_to_point(p2.x,p2.y,this.origin.x,this.origin.y))/100);//this.x;
                //p2.y += this.y
                //p2.y += (Math.cos($w.math.radians(this.degrees)) * ($w.motion.distance_to_point(p2.x,p2.y,this.origin.x,this.origin.y))/100);//this.z;
                p2 = $w.threed.convertPointIn3DToPointIn2D(p2,this.fov);
                $w.canvas.line(this.i,(p1.x+this.origin.x),(p1.y+this.origin.y),(p2.x+this.origin.x),(p2.y+this.origin.y));
            }
        }
    </script>
    <style>
        .target {
            background: url('boney.jpg');
            background-repeat: no-repeat;
    background-size: contain;
    background-position: 37px -17px;
        }
    </style>
</head>
<body>
    <div class="target" id="target">  
    </div>
</body>