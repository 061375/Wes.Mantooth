<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Buttons</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/buttons.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        #text_demo {
            position: absolute;
            left: 100px;
            top: 100px;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="left" id="target">  
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    // initialize Wes Mantooth
    $w.canvas.init(document.getElementById('target'));
    // Basic Pill Button
    /**
     * @param {Number} canvas reference
     * @param {Number} x
     * @param {Number} y
     * @param {Number} width
     * @param {Number} height
     * @param {Number} border radius ( this may move to style )
     * @param {Object} style
     * @param {String} text
     * @param {Object} event functions ( click, hover )
     * */
    $w.buttons.pill(0,100,100,150,30,15,{
        button:{
            color:'#3c00ff',
            fill:'fill',
            acolor:'#000000',
            opacity:1,
            hcolor:'#ff0000'
        },
        text:{
            color:'#ffffff',
            font:'20px Arial',
            padding:23
        }
    },'Click Me',{
        hover: function(){
            $w.log('hover');  
        },
        click: function(){
            $w.log('clicked');
            alert('button clicked');
        }
    });
}
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
