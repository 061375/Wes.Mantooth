<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - HD</title>
    <?php
    $path = '../../';
    require_once('../../examples/scripts.php'); ?>
    <script>
        window.onload = function() {
            var i = $w.canvas.init(document.getElementById('target'));
            $w.draw.grid(i,621,621,1.2,false);
        }
    </script>
    <style>
        #target {
            background: url('assets/four-doors-basic.5.bmp');
            background-size: cover;
            width: 621px;
            height: 621px;
        }
    </style>
</head>
<body>
    <div id="target">  
    </div>
</body>