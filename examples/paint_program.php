<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Examples - Simple Paint Program</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/paint_program.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        .left,.right {
            max-width: 50%;
        }
        #target {
            border: solid 1px #000;

            float: left;
        }
        #buttons {
            width: 40px;
            float: left;
            padding: 0;
            cursor: pointer;
        }
        #buttons button {
            box-shadow: 1px 1px 1px;
            width: 100%;
            max-width: 100%;
            padding: 5px;
            cursor: pointer;
        }
        #buttons button img {
            width: 99%;
        }
        #drawsizes button {
            width: 40px;
            height: 40px;
        }
        #drawsizes div {
            border-radius: 50%;
            background: #000;
            margin: auto;
        }
        #drawsizes #small div {
            height: 10px;
            width: 10px;
        }
        #drawsizes #medium div {
            height: 20px;
            width: 20px;
        }
        #drawsizes #large div {
            height: 25px;
            width: 25px;
        }
        #swatches {
            clear: both;
        }
        #swatches div {
            width: 20px;
            height: 20px;
            float: left;
            box-shadow: 1px 1px 1px;
        }
        #black {background: black}
        #white {background: white}
        #red {background: red}
        #blue {background: #0000ff}
        #green {background: #008000}
        #yellow {background: #ffff00}
    </style>
</head>
<body>
    <div class="left">
        <div id="target"></div>
        <div id="buttons">
            <div id="tools">
                <button id="new">New</button>
                <button id="spray"><img src="../_/assets/paint/spray.gif"/></button>
                <button id="pencil"><img src="../_/assets/paint/pencil.gif"/></button>
                <button id="line"><img src="../_/assets/paint/line.gif"/></button>
                <button id="eraser"><img src="../_/assets/paint/eraser.gif"/></button>
            </div>
            <div id="drawsizes">
                <button id="small"><div></div></button>
                <button id="medium"><div></div></button>
                <button id="large"><div></div></button>   
            </div>
            <div id="swatches">
                <div id="black"></div>
                <div id="white"></div>
                <div id="red"></div>
                <div id="blue"></div>
                <div id="green"></div>
                <div id="yellow"></div>
            </div>
        </div>
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    // initialize Wes Mantooth
    $w.canvas.init(document.getElementById('target'),
                900,600);
    Paint.init();
};

var Paint = (function(){
    
    "use strict";
    
    // Start Initalization
    /**
     * @param {Boolean} is the program drawing
     * */
    var isDrawing = false;
    /**
     * @param {Object} the available tools
     * */
    var tools = {
        0:drawSpray,
        1:drawPencil,
        2:drawLine,
        3:drawEraser
    }
    /**
     * @param {Number} the currently selected tool
     * */
    var ctool = 0;
    /**
     * @param {Number} ( 1,2,3 ) ( small, medium, large )
     * */
    var psize = 1;
    /**
     * @param {Object} the avaiable colors
     * */
    var colors = {
        0:'#000000',
        1:'#ffffff',
        2:'#ff0000',
        3:'#0000ff',
        4:'#008000',
        5:'#ffff00'
    }
    /**
     * @param {Number} the current color picked
     * */
    var ccolor = 0;
    // End initialization
    // -------------------------------------------------
    var init = function() {
        tools = {
            0:drawSpray,
            1:drawPencil,
            2:drawLine,
            3:drawEraser
        }
        // init bind 
        bind();
         // get the canvas object
        var ctx = $w.canvas.get(0,'canvas');
        // get the mouse position 'on mouse move'
        $w.mouse.trackMouse(ctx,function(m){
            // if the mouse button is clicked currently
            if(isDrawing) {
                // if the curent tool IS a tool
                if (typeof tools[ctool] === 'function') {
                    // run the currently selected tool
                    tools[ctool](m);
                }
            }
        });
    }
    /**
     * bind click events to their perspective buttons
     * */
    var bind = function(){
        document.getElementsByTagName("canvas")[0].addEventListener("mousedown",startDraw);
        document.getElementsByTagName("canvas")[0].addEventListener("mouseup",endDraw);
        document.getElementById("new").addEventListener("click",newPainting);
        document.getElementById("spray").addEventListener("click",spray);
        document.getElementById("pencil").addEventListener("click",pencil);
        document.getElementById("line").addEventListener("click",line);
        document.getElementById("eraser").addEventListener("click",eraser);
        document.getElementById("small").addEventListener("click",small);
        document.getElementById("medium").addEventListener("click",medium);
        document.getElementById("large").addEventListener("click",large);
        document.getElementById("black").addEventListener("click",black);
        document.getElementById("white").addEventListener("click",white);
        document.getElementById("red").addEventListener("click",red);
        document.getElementById("blue").addEventListener("click",blue);
        document.getElementById("green").addEventListener("click",green);
        document.getElementById("yellow").addEventListener("click",yellow);
    }
    // -------------------------------------------------
    // Start set the tools
    /**
     * */
    var spray = function() {
        ctool = 0;
    }
    /**
     * */
    var pencil = function() {
        ctool = 1;
    }
    /**
     * */
    var line = function() {
        ctool = 2;
    }
    /**
     * */
    var eraser = function() {
        ctool = 3;
    }
    // End set the tools
    // -------------------------------------------------
    // Start set the tool size
    /**
     * */
    var small = function() {
        psize = 1;
    }
    /**
     * */
    var medium = function() {
        psize = 2;
    }
    /**
     * */
    var large = function() {
        psize = 3;
    }
    // End set the tool sizes
    // -------------------------------------------------
    // Start set the paint color
    /**
     * */
    var black = function() {
        ccolor = 0;
    }
    /**
     * */
    var white = function() {
        ccolor = 1;
    }
    /**
     * */
    var red = function() {
        ccolor = 2;
    }
    /**
     * */
    var blue = function() {
        ccolor = 3;
    }
    /**
     * */
    var green = function() {
        ccolor = 4;
    }
    /**
     * */
    var yellow = function() {
        ccolor = 5;
    }
    //End set the paint color
    // -------------------------------------------------
    /**
     * */
    var startDraw = function() {
        $w.log('stop drawing');
        isDrawing = true;    
    }
    var endDraw = function() {
        $w.log('stop drawing');
        isDrawing = false;
    }
    /**
     * clears the canvas
     * */
    var newPainting = function() {
        if (confirm("Are you sure?\nThis action will delete your awsome painting permanently.")) {
            $w.canvas.clear(0);
        }
    }
    // -------------------------------------------------
    // Start Tools
    var drawSpray = function(m) {
        var s = (psize * 10);
        for(var i=0; i&lt;10;i++) {
            var x = (m.x + Math.random() * s) - (s/2);
            var y = (m.y + Math.random() * s) - (s/2);
            $w.canvas.circle(0,x,y,3,colors[ccolor]);
        }
        
    }
    var drawPencil = function(m){
        var s = (psize * 10);
        $w.canvas.circle(0,m.x,m.y,s,colors[ccolor]); 
    }
    var drawLine = function(m){}
    var drawEraser = function(m){
        var s = (psize * 10);
        $w.canvas.circle(0,m.x,m.y,s,'#ffffff'); 
    }
    
    return {
        init:init
    }
})();
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
