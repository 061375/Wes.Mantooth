<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Get Coastal Distance</title>
    <style>
        .target, .original {
            width: 807px;
            float: left;
        }
        .clear {
            clear: both;
        }
    </style>
    <?php
    require_once('../../examples/scripts.php'); ?>
    <script>
        const   W = 807,
                H = 807
        window.onload = function() {

            'use strict';
            
            var i = $w.add_object_single(
                1,
                Map,{
                    src:'1pixel2miles.bmp',
                    w:W,
                    h:H
                },
                document.getElementById('target'),
                W,H
            );
        }
        /**
         * Object
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var Map = function(o){
            // SET WATER AS A CONSTANT
            this.water = [202,232,255,255];
            
            // set the width / height of the image
            this.w = o.w;
            this.h = o.h;
            // get the reference to the canvas
            this.i = o.i;
            // create an image object
            var img = new Image();
            img.src = o.src;
            // 
            var $this = this;
            // when the image has been loaded
            img.onload = function() {
                // get the canvas context
                var ctx = $w.canvas.get(o.i,'ctx');
                // draw the image
                ctx.drawImage(img, 0, 0);
                // get the image pixel colors as a two-dimensional array
                var p = $this.getData(ctx);
                // loop the pixels and act on them
                p = $this.loopPixels(p,ctx);
                p = $this.twoColors(p,ctx);
            }
            
        }
        /**
         * get the image data from the canvas
         * @param {Object}
         * @returns {Array}
         * */
        Map.prototype.getData = function(ctx){
            // Create an ImageData object.
            var imgd = ctx.getImageData(0,0,this.w,this.h);
            var pix = imgd.data;
            var x = 0, y = 0;
            var pixels = [[]];
            // Loop over each pixel and set a transparent red.
            for (var i = 0; n = pix.length, i < n; i += 4) {
                pixels[y][x] = [pix[i],pix[i+1],pix[i+2],pix[i+3]];
                x++;
                if (x == this.w) {
                    x = 0;
                    y++;
                    pixels[y] = [];
                }
            }   
            return pixels;
        }
        /**
         * loop all the pixels and run action as necessary
         * @param {Array}
         * @returns {Array}
         * */
        Map.prototype.loopPixels = function(p,ctx) {
            for (var y = 0; y<this.h;y++) {
                for (var x = 0; x<this.w;x++) {
                    // if color close to black
                    // change it to the nearest color
                    if(p[y][x][0] < 144 && p[y][x][1] < 144 && p[y][x][2] < 144) {
                        p[y][x] = this.nearestPixel(p,y,x,147,162,173);
                        ctx.fillStyle=$w.color.rgbToHex(p[y][x][0],p[y][x][1],p[y][x][2]);
                        ctx.fillRect(x,y,1,1);
                    }
                    // lets do a second pass
                    if(p[y][x][0] < 163 && p[y][x][1] < 163 && p[y][x][2] < 163) {
                        p[y][x] = this.nearestPixel(p,y,x,147,162,173,250);
                        ctx.fillStyle=$w.color.rgbToHex(p[y][x][0],p[y][x][1],p[y][x][2]);
                        ctx.fillRect(x,y,1,1);
                    }
                }   
            }
            return p;
        }
        /**
         * reduce the image to two colors
         * @param {Array}
         * @returns {Array}
         * */
        Map.prototype.twoColors = function(p,ctx) {
            // @param {Object}
            var maxa = {
                i:0,
                c:null
            },
            // @param {Object}
            maxb = {
                i:0,
                c:null
            },
            // @param {Object}
            c = {}
            // loop all the pixels
            for (var y = 0; y<this.h;y++) {
                for (var x = 0; x<this.w;x++) {
                    // count all the colors on the stage
                    if (undefined === c[p[y][x][0]+p[y][x][1]+p[y][x][2]]) {
                        c[p[y][x][0]+p[y][x][1]+p[y][x][2]] = {
                            i:1,
                            c:p[y][x]
                        }
                    }else{
                        c[p[y][x][0]+p[y][x][1]+p[y][x][2]].i++;
                    }
                }   
            }
            // loop all the found colors
            for(var i in c) {
                if (c.hasOwnProperty(i)) {
                    // if this color was found more often than max then replace it
                    if(c[i].i > maxa.i) {
                        maxa.i = c[i].i
                        maxa.c = c[i].c;
                    }
                    // if this color was found more often than max - 1 replace it
                    if(c[i].i > maxb.i && c[i].i < maxa.i) {
                        maxb.i = c[i].i
                        maxb.c = c[i].c;
                    } 
                }
            }
            // looop the pixels again
            for (var y = 0; y<this.h;y++) {
                for (var x = 0; x<this.w;x++) {
                    // if the current color is NOT the MAX color
                    if (p[y][x][0] != maxa.c[0] && p[y][x][1] != maxa.c[1] && p[y][x][2] != maxa.c[2]) {
                        // then set it to the next mst common color
                        ctx.fillStyle=$w.color.rgbToHex(maxb.c[0],maxb.c[1],maxb.c[2]);
                        ctx.fillRect(x,y,1,1);
                        p[y][x][0] = maxb.c[0];
                        p[y][x][1] = maxb.c[1];
                        p[y][x][2] = maxb.c[2];
                    }
                }   
            }
            
            return p;
        }
        /**
         * get the most common color within a range of nine pixels
         * @param {Array}
         * @param {Number}
         * @param {Number}
         * @param {Number} 0-255
         * @param {Number} 0-255
         * @param {Number} 0-255
         * @returns {Array}
         * */
        Map.prototype.nearestPixel = function(p,y,x,r,g,b){
                // @param {Object}
            var c = {},
                // @param {Number} how many surrounding pixels to look
                l = 5;
            /**
             * look at the adjoining pixels to get the most common pixel color
             *
             * #####
             * ##X##
             * #####
             *
             * */
            for(var yy=y-l;yy<y+l;yy++) {
                for(var xx=x-l;xx<x+l;xx++){
                    // if this is not black
                    if(p[yy][xx][0] > r && p[yy][xx][1] > g && p[yy][xx][2] > b) {
                        var q = p[yy][xx][0]+p[yy][xx][1]+p[yy][xx][2];
                        // increment a count of the color of this pixel
                        if (typeof c[q] === 'undefined') {
                            c[q] = {
                                c:p[yy][xx],
                                i:1
                            };
                        }else{
                            c[q].i++;
                        }
                    }
                }
            }
            // @param {Object}
            var max = {
                i:0,
                c:null
            }
            // loop the colors to see which is the most common
            for(var i in c) {
                if (c.hasOwnProperty(i)) {
                    // if this color was found more often than max then replace it
                    if(c[i].i > max.i) {
                        max.i = c[i].i
                        max.c = c[i].c;
                    }
                }
            }
            return max.c;
        }
    </script>
    
</head>
<body>
    <div class="original">
        <img src="1pixel2miles.bmp" />
    </div>
    <div class="target" id="target">  
    </div>
    <div class ="clear"></div>
</body>