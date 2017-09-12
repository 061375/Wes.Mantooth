<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Pseudo 3D</title>
    <style>
        div {
            width: 49vw;
            height: 98vh;
            float: left;
            position: relative;
        }
        canvas {
            position: absolute;
        }
    </style>
    <?php
    $path = '../../';
    require_once('../../examples/scripts.php'); ?>
    <script>
        const   W = (window.innerHeight-20),
                H = (window.innerHeight-20),
                hW = W/2,
                hH = H/2,
                TSPEED = 3,
                WSPEED = 5;
        window.onload = function() {

            'use strict';
            
            $w.add_object(
                1,
                Camera,{},
                document.getElementById('target2'),
                W,H
            );
            $w.add_object(
                1,
                NPCflatView,{},
                document.getElementById('target2'),
                W,H
            );
            $w.add_object(
                10,
                NPC,{},
                document.getElementById('target'),
                W,H
            );
            $w.loop(true);
        }
        /**
         * Camera
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var Camera = function(o){
                this.i = o.i;
                this.d = 0;
                this.x = hW;
                this.y = hH;
                this.fov = 500;
                this.count = 0;
                this.fps = 5;
                this.view = {x:null,y:null,r:200};
                $w.canvas.zIndex(this.i,9999);
                $w.game.bindkeys({
                    ArrowLeft:Camera.prototype.Aleft
                },"keydown",document,this);
                $w.game.bindkeys({
                    ArrowRight:Camera.prototype.Aright
                },"keydown",document,this);
                $w.game.bindkeys({
                    ArrowUp:Camera.prototype.Aup
                },"keydown",document,this);
                $w.game.bindkeys({
                    ArrowDown:Camera.prototype.Adown
                },"keydown",document,this);
            }
            /**
             * loop
             * @returns {Void}
             * */
            Camera.prototype.loop = function() {
                $w.canvas.clear(this.i);
                this.drawCamera(this.i,this.x,this.y,this.d);
                if (this.d > 360) this.d = 0;
                if (this.d < 0) this.d = 360;
            }
            /**
             * drawCamera
             * @param {Number} 
             * @param {Number}
             * @param {Number}
             * @param {Number}
             * @returns {Void}
             * */
            Camera.prototype.drawCamera = function(i,x,y,d) {
                const dd = -d;
                $w.canvas.polygon(i,[
                    this.calcPoint(x,y,(dd+45),5),
                    this.calcPoint(x,y,(dd+135),5),
                    this.calcPoint(x,y,(dd+225),5),
                    this.calcPoint(x,y,(dd+315),5)
                ],'#000000','fill');
                $w.canvas.polygon(i,[
                    this.calcPoint(x,y,(dd+90),5),
                    this.calcPoint(x,y,(dd+100),10),
                    this.calcPoint(x,y,(dd+80),10)
                ],'#000000','fill');
                const c = this.calcPoint(x,y,(dd+90),this.view.r);
                $w.canvas.circle(i,c[0],c[1],this.view.r,'#FF0000',0.5);
                this.view.x = c[0];
                this.view.y = c[1];
            }
            /**
             * calcPoint
             * @param {Number} 
             * @param {Number}
             * @param {Number}
             * @returns {Array} [x,y]
             * */
            Camera.prototype.calcPoint = function(x,y,d,r){
                
                const a = $w.math.radians(d);
                x = x + Math.cos(a)*r;
                y = y + Math.sin(a)*r;
                return [x,y];
            }
            /**
             * Aleft
             * @param {Object} event
             * @param {Object} this
             * @returns {Void}
             * */
            Camera.prototype.Aleft = function(e,s) {
                //console.log(s.d);
                s.d-=TSPEED;
            }
            /**
             * Aright
             * @param {Object} event
             * @param {Object} this
             * @returns {Void}
             * */
            Camera.prototype.Aright = function(e,s) {
                //console.log(s.d);
                s.d+=TSPEED;
            }
            /**
             * Aup
             * @param {Object} event
             * @param {Object} this
             * @returns {Void}
             * */
            Camera.prototype.Aup = function(e,s) {
                s.x+=Math.sin($w.math.radians(s.d))*WSPEED;
                s.y+=Math.cos($w.math.radians(s.d))*WSPEED;
            }
            /**
             * Adown
             * @param {Object} event
             * @param {Object} this
             * @returns {Void}
             * */
            Camera.prototype.Adown = function(e,s) {
                s.x-=Math.sin($w.math.radians(s.d))*5;
                s.y-=Math.cos($w.math.radians(s.d))*5;
            }
        /**
         * NPCflatView
         * dummy object to create a canvas to hold the 2D representations of the NPCs
         * @param {Object}
         * @returns {Void}
         * */
        var NPCflatView = function(o){
            $w.canvas.zIndex(o.i,9998);
            this.loop = function(){}}
        /**
         * NPC
         * non player character
         * @param {Object}
         * @returns {Void}
         * */   
        var NPC = function(o) {
            o.x = o.i*80;
            o.y = 800;//o.i*30;
            /*
            if (o.i == 2) {
                this.x = (W/2);
                this.y = H;//hH + (hH/3);
            }else{
                this.x = (W/2);
                this.y = hH + (hH/2);
            }*/
            //this.x = (W/2);
            //this.y = hH + (hH/2);
            
            if (typeof o.x === 'undefined'){
                this.x = $w.math.frandom(W);
            }else{
                this.x = o.x;
            }
            if (typeof o.y === 'undefined'){
                this.y = $w.math.frandom(H);
            }else{
                this.y = o.y;
            }
                
                this.camera = $w.objects.Camera[0],
                this.i = o.i,
                this.dx,
                this.dy,
                this.dz,
                this.fov = this.camera.fov,
                this.scale = 0,
                this.angle,
                this.color = $w.color.random(),
                this.radius,
                this.scaleRatio,
                this.size = 30;
                // draw a point to represent the 2D location of this NPC
                $w.canvas.circle(1,this.x,this.y,5);
            }
            NPC.prototype.loop = function() {
                $w.canvas.clear(this.i);
                if (!$w.collision.checkCircle(this.camera.view.x,this.camera.view.y,this.camera.view.r,this.x,this.y,5)) {
                    this.cr = $w.math.radians(this.camera.d);
                    this.dx = this.x-this.camera.x;
                    this.dz = this.y-this.camera.y;
                    this.dy = hH;
                    this.angle = Math.atan2(this.dz,this.dx);
                    this.radius = Math.sqrt(this.dx*this.dx + this.dz*this.dz);
                    this.dx = Math.cos(this.angle+this.cr) * this.radius;
                    var dis = $w.motion.distance_to_point(this.x,this.y,this.camera.x,this.camera.y);
                    $w.canvas.zIndex(this.i,-dis);
                    this.scaleRatio = this.fov/(this.fov+(dis*4));
                    this.dx = this.dx * this.scaleRatio;
                    this.scale = this.scaleRatio * this.size;
                    $w.canvas.circle(this.i,this.dx+hW,this.dy,this.scale,this.color);
                    //$w.canvas.text(this.i,this.dx+hW,this.dy-100,~~(-dis),'fill','Arial','#000');
                }
            }
    </script>
    
</head>
<body>
    <div id="target">  
    </div>
    <div id="target2">  
    </div>
</body>