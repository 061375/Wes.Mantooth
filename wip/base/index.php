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
            
            var i = $w.add_object/*_single*/(
                /* Integer */,
                /* Object */,{},
                document.getElementById('target'),
                W,H
            );
            
            $w.loop(true,i);
        }
        /**
         * Object
         * 
         * @param {Object}
         * @returns {Void}
         * */
        var /* Object */ = function(o){
            
            this.i = o.i;
            
        }
        /**
         * loop
         * @returns {Void}
         * */
        /* Object */.prototype.loop = function() {
   
        }
            
    </script>
    
</head>
<body>
    <div class="target" id="target">  
    </div>
</body>