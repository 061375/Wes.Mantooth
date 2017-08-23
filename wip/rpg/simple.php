<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - HD</title>
    <?php
    $path = '../../';
    require_once('../../examples/scripts.php'); ?>
    <script src="js/simple.js"></script>
    <script src="js/map.js"></script>
    <script src="js/room_items.js"></script>
    <script src="js/player.js"></script>
    <script>
        Simple.init();
    </script>
    <style>
        body {
            background: #000;
        }
        #container {
            margin: 100px auto;
            width: 621px;
            height: 621px;
            position: relative;
        }
        #target {
            width: 621px;
            height: 621px;
            z-index: 2;
            position: absolute;
        }
        #bg {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 621px;
            height: 621px;
            background-image: url('assets/four-doors-nogrid.jpg');
            background-position: center;
            background-size: cover;
            opacity: 1;
            transition: all .6s cubic-bezier(0.23, 1, 0.32, 1);
        }
        #bg.out {
            opacity: 0;
        }
        #bg.totop,
        #bg.fromtop {
            top: -621px;    
        }
        #bg.tobottom,
        #bg.frombottom {
            top: 621px;    
        }
        #bg.toleft,
        #bg.fromleft {
            left: -621px;    
        }
        #bg.toright,
        #bg.fromright {
            left: 621px;    
        }
        canvas {
            position: absolute;
            left: 0px;
            top: 0px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="target"></div>
        <div id="bg"></div>
    </div>
</body>