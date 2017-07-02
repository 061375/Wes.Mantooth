<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Simple Draw a Grid</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/draw_simplegrid.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
/**
 * draws a grid using 2 lines of code
 */
window.onload = function() {
    // initialize a Wes Mantooth canvas
    var i = $w.canvas.init(document.getElementById('target'));
    // draw the grid
    /**
     * @param {Number} reference the canvas
     * @param {Number} width
     * @param {Number} height
     * @param {Number} grid unit
     */
    $w.draw.grid(i,1000,1000,10);
}   
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
