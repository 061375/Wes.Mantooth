<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Sprite Animation</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/sprite_animation.js?a=<?php echo strtotime('now'); ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css" />
    
</head>
<body>
    <div class="container">
        <div class="left" id="target">
            
        </div>
        <div class="right">
            <label for="left">
                <input type="button" id="left" value="Run animation forward" />
            </label>
            <label for="right">
                <input type="button" id="right" value="Run animation in reverse" />
            </label>
            <label for="start">
                <input type="button" id="start" value="Start" />
            </label>
            <label for="stop">
                <input type="button" id="stop" value="Stop" />
            </label>
            <label for="turntable">
                Turntable
                <input type="checkbox" id="turntable" checked="checked" />
            </label>
            <label for="speed">
                Speed
                <input type="range" id="speed" min="0" max="50" value="25" />
                <span id="speed-range">25</span>
            </label>
            <label for="direction">
                Direction
                <input type="range" id="direction" min="1" max="8" value="1" />
                <span id="direction-range">1</span>
            </label>
        </div>
        <img id="sprite" src="../_/assets/sprites/runningman.png" />
    </div>
    <script src="http://192.168.1.154:35729/livereload.js"></script>
</body>
</html>
