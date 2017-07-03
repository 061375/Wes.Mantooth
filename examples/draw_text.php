<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Draw Text To The Canvas</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/draw_text.js<?php echo $dev ?>"></script>
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
        <div id="text_demo">
            <p>Type text here</p>
            <input type="text" id="typetext" onkeyup="typing()" />
        </div>
        
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    // initialize Wes Mantooth
    $w.canvas.init(document.getElementById('target'));
}
// create a function to call when text is being typed
function typing() {
    // initialize all the fonts we want to use
    var fonts = ['Arial','Verdana','Comic Sans','Times New Roman','Impact','Webdings'];
    // set the font size
    var font_size = '20px';
    
    // get the user typed text
    var text = document.getElementById("typetext").value;
    
    // cache the length of fonts
    var l = fonts.length;
    // clear the canvas
    $w.canvas.clear(0);
    // loop all the fonts
    for(var i=0; i&lt;l; i++){
        // concatnate font name with the message
        var message = fonts[i]+': '+text;
        // concatnate the font size with the font
        var font = font_size+' '+fonts[i];
        
        /**
         *  write the message to the canvas
         *  
         *  @param {Number} reference the canvas by ID (in this case we know its zero)
         *  @param {Number} x position to draw the text
         *  @param {Number} y position to draw the text
         *  @param {String} the text
         *  @param {String} ( fill, stroke, both )
         *  @param {String} font
         *  */
        $w.canvas.text(0,100,300+(i*25),message,'fill',font);
    }
}
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
