<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Simple Draw a Grid</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/draw_simplegrid.js?a=<?php echo strtotime('now'); ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css?a=<?php echo strtotime('now'); ?>" />
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    // initialize Wes Mantooth
    var i = $w.canvas.init(document.getElementById('target'));
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
}   
        </pre>
    </div>
    <script src="http://192.168.1.154:35729/livereload.js"></script>
</body>
</html>
