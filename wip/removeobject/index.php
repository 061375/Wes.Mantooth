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
                10,
                Test,{},
                document.getElementById('target'),
                W,H
            );
            setInterval(function(){
                console.log('Add MORE');
                $w.add_object_single (
                    10,
                    Test,{},
                    i,
                    W,H
                );   
            },15000);
            $w.loop(true,i);
            
            
        }
        /**
         * Grid
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var Test = function(o){
            this.i = o.i;
            this.z = o.z;
            this.c = 0;
            this.max = 100 + Math.random() * 1000;
        }
        /**
         * loop
         * @returns {Void}
         * */
        Test.prototype.loop = function() {
            this.c++;
            if (this.c >= this.max) {
                this.die();
                this.c = 0;
            }
        }
        
        Test.prototype.die = function(){
            console.log($w.objects);
            console.log('Test['+this.z+'] qued for destruction');
            $w.kill_player('Test',this.z); 
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