<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Track Mouse Movement</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/track_mousemove.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    // initialize Wes Mantooth
    var i = $w.canvas.init(document.getElementById('target'));
    
    // turn on logging
    $w.boolLog = true;
    
    // get the canvas object
    var ctx = $w.canvas.get(i,'canvas');
    
    // get the mouse position 'on mouse move'
    $w.mouse.trackMouse(ctx,function(m){
        // first claer the canvas
        $w.canvas.clear(i);
        // draw the x , y position of the mouse cursor
        $w.canvas.text(i,m.x,m.y,'['+m.x+' , '+m.y+']','fill');
        // write to the log
        $w.log(m);
    });
}  
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
