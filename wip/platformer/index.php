<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Pseudo 3D</title>
    <style>
        .target {
            width: 49vw;
            height: 98vh;
            float: left;
            position: relative;
        }
        canvas {
            position: absolute;
        }
        #target {
            
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -999999;
        }
    </style>
    <?php
    require_once('../../examples/scripts.php'); ?>
    <script>
        const   W = 800,
                H = 800
        window.onload = function() {

            'use strict';
            
            var i = $w.add_object_single(
                100,
                Ground,{},
                document.getElementById('target'),
                W,H
            );
            
            $w.add_object_single(
                1,
                Player,{
                    x:400,
                    y:400
                },
                i,
                W,H
            );
            $w.loop(true,i);
        }
        /**
         * Player
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var Player = function(o){
            
                this.i = o.i;
                this.x = o.x;
                this.y = o.y;
                this.vspeed = 0;
                this.maxvspeed = 5;
                this.vcollision = false;
                this.blockl = $w.objects['Ground'].length;
                this.other = {}
                this.friction = 0.05;
                this.radius = 5;
                this.hspeed = 0;
                $w.game.bindkeys({
                    ArrowLeft:Player.prototype.Aleft
                },"keydown",document,this);
                $w.game.bindkeys({
                    ArrowRight:Player.prototype.Aright
                },"keydown",document,this);
                $w.game.bindkeys({
                    KeyA:Player.prototype.Aa
                },"keydown",document,this);
            }
            /**
             * loop
             * @returns {Void}
             * */
            Player.prototype.loop = function() {
          
                this.vcollision = false;
                for(i=0; i<this.blockl; i++) {
                    if ($w.objects['Ground'][i] != null) {
                        if($w.collision.circle([
                            [$w.objects['Ground'][i].x,$w.objects['Ground'][i].y],
                            [$w.objects['Ground'][i].x+5,$w.objects['Ground'][i].y+5]
                        ],{
                            x:this.x,
                            y:this.y,
                            radius:5
                        })){
                            //console.log('collision');
                            this.vcollision = true;
                            this.other = {
                                x:$w.objects['Ground'][i].x,
                                y:$w.objects['Ground'][i].y
                            }
                        }
                    }
                }
                if (this.vcollision) {
                    this.y = this.other.y-this.radius;
                    //console.log(this.vspeed);
                    //this.vspeed = (-this.vspeed)+(this.friction*35);
                    this.vspeed = 0;
                }
                this.vspeed+=(0.25)-this.friction;
                this.y+=this.vspeed;
                
                this.x+=this.hspeed;
                
                if (this.hspeed < -1)this.hspeed+=0.3;
                if (this.hspeed > 1)this.hspeed-=0.3;
                
                $w.canvas.circle(this.i,this.x,this.y,this.radius);
                
            }
            Player.prototype.Aright = function(e,s) {
                if (s.hspeed < 5) s.hspeed++;
                
            }
            Player.prototype.Aleft = function(e,s) {
                if (s.hspeed > -5) s.hspeed--;
                
            }
            Player.prototype.Aa = function(e,s) {
                s.vspeed = -6;
                s.y-=5;
            }

        /**
         * Ground
         *
         * @param {Object}
         * @returns {Void}
         * */   
        var Ground = function(o) {

                this.i = o.i;
                
                this.w = 10;
                this.h = 10;
                
                this.y = 790;
                this.x = o.z * this.w;
                
                $w.canvas.rectangle(o.i,this.x,this.y,this.w,this.h,'#000000','fill');
            }
            Ground.prototype.loop = function() {
                $w.canvas.rectangle(this.i,this.x,this.y,this.w,this.h,'#000000','fill');    
            }
    </script>
    
</head>
<body>
    <div class="target" id="target">  
    </div>
</body>