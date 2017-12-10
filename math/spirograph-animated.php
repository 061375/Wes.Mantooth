<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - HD</title>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <?php
    $path = '../../';
    require_once('../examples/scripts.php'); ?>
    <script>

        window.onload = function() {
            // set the animation speed
            $w.gamespeed = 80;
            // init
            const L = 200,
            M = 2,
            W = 800,
            H = 800;
            // Wes mantooth function to create a list of functions
            var i = $w.add_object_single(
                L,
                Line,{
                    /**
                     * the center of the spirograph
                     * will be 1/2 the width of the canvas
                     * -50 pixels for good measure
                     * */
                    start:(W-50) / 2,
                    // pass how many times we want to iterate
                    l:L,
                    // pass the multiplier M
                    m:M
                },
                document.getElementById('target'),
                W,H
            );
            $w.add_object(
                1,
                setColor,{},
                document.getElementById('target'),
                W,H
            );
            $w.loop(true,i);
        }
        /**
         * setColor
         * @param {Object}
         * @returns {Void}
         * */
        var setColor = function(o) {}
        setColor.prototype.loop = function() {
            // this sets a random colr each loop
            $w.obj_set_var('Line','color',$w.color.random());
        }
        /**
         * Line
         * @param {Object}
         * @returns {Void}
         * */
        var Line = function(o) {
            // reference the canvas
            this.i = o.i;
            // set the radius of our graph
            this.radius = o.start;
            // set the center of the graph (slightly off center so its not up against the edge)
            this.ox = (o.start+20);
            this.oy = (o.start+20);
            
            this.z = o.z;
            this.l = o.l;
            this.m = o.m;
            
            this.color = '#000000';
        }
        /**
         * A Wes Mantooth requirement
         * */
        Line.prototype.loop = function() {
            if (this.m >= 100) this.m = 1;
            /*
             * get the first degree
             * 1. divide 360 by the number of iterations L
             * 2. multiply that by the current index o.z (a built-in value passed from Wes Mantooth add_object_single)
             * */
            var d = (360 / this.l) * this.z;
            // get the location on the circle
            var xy = this.trig(this.ox,this.oy,d);
            
            /*
             * At its core this exercise is about multiplication tables
             * */
            var d2 = d * this.m;
            // if the degrees are greater than 360 
            if (d2 > 360)   d2 -= 360;
            // get the location of the second 
            var xy2 = this.trig(this.ox,this.oy,d2);
            
            // draw the line
            $w.canvas.line(this.i,xy.x,xy.y,xy2.x,xy2.y,this.color);
            
            // draw up all the possible points on the circle
            $w.canvas.circle(this.i,xy.x,xy.y,3);
            
            this.m++;
            
        }
        /**
         * @param {Number}
         * @param {Number}
         * @param {Number}
         * 
         * @returns {Object}
         * */
        Line.prototype.trig = function(ox,oy,degrees) {
            var angle = $w.math.radians(degrees);
            var xpos = this.radius * Math.cos(angle);
            var ypos = this.radius * Math.sin(angle);
            return {
                x:xpos+ox,
                y:ypos+oy
            }
        }

    </script>
</head>
<body>
    <div class="left" id="target"></div>
    <div class="right">
        <pre class="brush: js">
            window.onload = function() {
                // set the animation speed
                $w.gamespeed = 80;
                // init
                const L = 200,
                M = 2,
                W = 800,
                H = 800;
                // Wes mantooth function to create a list of functions
                var i = $w.add_object_single(
                    L,
                    Line,{
                        /**
                         * the center of the spirograph
                         * will be 1/2 the width of the canvas
                         * -50 pixels for good measure
                         * */
                        start:(W-50) / 2,
                        // pass how many times we want to iterate
                        l:L,
                        // pass the multiplier M
                        m:M
                    },
                    document.getElementById('target'),
                    W,H
                );
                $w.add_object(
                    1,
                    setColor,{},
                    document.getElementById('target'),
                    W,H
                );
                $w.loop(true,i);
            }
            /**
             * setColor
             * @param {Object}
             * @returns {Void}
             * */
            var setColor = function(o) {}
            setColor.prototype.loop = function() {
                // this sets a random colr each loop
                $w.obj_set_var('Line','color',$w.color.random());
            }
            /**
             * Line
             * @param {Object}
             * @returns {Void}
             * */
            var Line = function(o) {
                // reference the canvas
                this.i = o.i;
                // set the radius of our graph
                this.radius = o.start;
                // set the center of the graph (slightly off center so its not up against the edge)
                this.ox = (o.start+20);
                this.oy = (o.start+20);
                
                this.z = o.z;
                this.l = o.l;
                this.m = o.m;
                
                this.color = '#000000';
            }
            /**
             * A Wes Mantooth requirement
             * */
            Line.prototype.loop = function() {
                if (this.m >= 100) this.m = 1;
                /*
                 * get the first degree
                 * 1. divide 360 by the number of iterations L
                 * 2. multiply that by the current index o.z (a built-in value passed from Wes Mantooth add_object_single)
                 * */
                var d = (360 / this.l) * this.z;
                // get the location on the circle
                var xy = this.trig(this.ox,this.oy,d);
                
                /*
                 * At its core this exercise is about multiplication tables
                 * */
                var d2 = d * this.m;
                // if the degrees are greater than 360 
                if (d2 > 360)   d2 -= 360;
                // get the location of the second 
                var xy2 = this.trig(this.ox,this.oy,d2);
                
                // draw the line
                $w.canvas.line(this.i,xy.x,xy.y,xy2.x,xy2.y,this.color);
                
                // draw up all the possible points on the circle
                $w.canvas.circle(this.i,xy.x,xy.y,3);
                
                this.m++;
                
            }
            /**
             * @param {Number}
             * @param {Number}
             * @param {Number}
             * 
             * @returns {Object}
             * */
            Line.prototype.trig = function(ox,oy,degrees) {
                var angle = $w.math.radians(degrees);
                var xpos = this.radius * Math.cos(angle);
                var ypos = this.radius * Math.sin(angle);
                return {
                    x:xpos+ox,
                    y:ypos+oy
                }
            }
        </pre>
    </div>
</body>