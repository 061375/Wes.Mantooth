<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Collision Examples</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/collisions.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        #target {
            position: relative;
        }
        canvas {
            position: absolute;
            left: 0px;
            top: 0px;
        }
    </style>
</head>
<body>
    <div class="left" id="target">
        
    </div>
    <div class="right">
        <pre class="brush: js">
var $t; // initalize a global variable to hold the target DOM node
// make sure everything is loaded
window.onload = function() {
    
    // cache the target dom node
    $t = document.getElementById('target');

    // add the cursor object
    $w.add_object(
        1,
        Cursor,{width:100,height:100,color:{fill:'#ffec00',stroke:'#000000'},opacity:0.7},
        $t
    );
    // add a circle
    $w.add_object(
        1,
        Circle,{
            x:($t.scrollWidth/6),
            y:($t.scrollHeight/2),
            radius:100,
            color:'#3c00ff',
            opacity:0.5
        },
        $t
    );
    // add a square
    $w.add_object(
        1,
        Square,{
            x:($t.scrollWidth/4),
            y:($t.scrollHeight/3),
            width:150,
            height:150,
            color:{fill:'#ff0000',stroke:'#000000'},
            opacity:0.7
        },
        $t
    );
    // add a complex polygon
    var x = ($t.scrollWidth/7);
    var y = ($t.scrollHeight/9);
    $w.add_object(
        1,
        Polygon,{
            a:[
                [x,y],
                [x+90,y+180],
                [x-100,y+60],
                [x+100,y+60],
                [x-60,y+180]
            ],
            color:{fill:'#73621e',stroke:'#000000'},
            opacity:0.7
        },
        $t
    );
    // add some text to display if a collision occured
    $w.add_object(
        1,
        Text, {x:50,y:50,font:'30px Arial'},
        $t
    )
    // get the mouse position and form the loop
    $w.loop();
}
/**
 * creates a simple box that follows the mouse and acts as a target
 * @param {Object}
 * */
var Cursor = function(o) {
    // initalize
    var x, y;
    // the loop
    var loop = function() {
        // get the mouse position
        $w.mouse.trackMouse($t,function(m) {
            // init some locals
            x = m.x;
            y = m.y;
            // center the box over the mouse coords
            x -= (o.width / 2);
            y -= (o.height / 2);
            // clear the canvas
            $w.canvas.clear(o.i);
            // draw the rectangle
            $w.canvas.rectangle(o.i,x,y,o.width,o.height,o.color.stroke,'both',o.color.fill,o.opacity);
            /**
             * normally we might use the engines game loop
             * but in this case we'll use the mouse event and loop through
             * each object...we are only instantiating 1 instance per object so
             * we can easily know its position in the objects array
             * */
            var c = "";
            var chk = [];
            // check the collisions for each object
            chk.push($w.objects.Square[2].checkCollision());
            chk.push($w.objects.Circle[1].checkCollision());
            chk.push($w.objects.Polygon[3].checkCollision());
            for(var i=0; i&lt;3;i++){
                if(chk[i])c = "Collision!";   
            }
            // if collision pass that to the text object
            $w.objects.Text[4].loop(c);
        });
    }
    // getter
    var get_pos = function() {
        o.x = x;
        o.y = y;
        o.a =   [
                    [o.x,o.y],
                    [(o.x+o.width),o.y],
                    [(o.x+o.width),(o.y+o.height)],
                    [o.x,(o.y+o.height)]
                ];
        return o;   
    }
    return {
        loop:loop,
        get_pos:get_pos
    }
}
/**
 * @param {Object}
 * */
var Circle = function(o) {
    var loop = function(){
        $w.canvas.circle(o.i,o.x,o.y,o.radius,o.color,o.opacity);
    };
    var checkCollision = function() {
        // get the cursor mouse position
        var a = $w.objects.Cursor[0].get_pos();
        return $w.collision.circle(a.a,o);
    }
    return {
        loop:loop,
        checkCollision:checkCollision
    }
}
/**
 * @param {Object}
 * */
var Square = function(o) {
    var loop = function(){
        $w.canvas.rectangle(o.i,o.x,o.y,o.width,o.height,o.color.stroke,"both",o.color.fill,o.opacity);
    };
    var checkCollision = function() {
        var b = $w.objects.Cursor[0].get_pos();
        var a = [
                    [o.x,o.y],
                    [(o.x+o.width),o.y],
                    [(o.x+o.width),(o.y+o.height)],
                    [o.x,(o.y+o.height)]
                ];
        var isc = false;
        var l = a.length;
        for(var i=0; i&lt;l; i++) {
            if($w.collision.inside(a[i],b.a))isc = true;
        }
        return isc;
    }
    return {
        loop:loop,
        checkCollision:checkCollision
    }
}
/**
 * @param {Object}
 * */
var Polygon = function(o) {
    var loop = function(){
        $w.canvas.polygon(o.i,o.a,o.color.fill,"fill",o.color.stroke,o.opacity);
    };
    var checkCollision = function() {
        console.log(o);
        var b = $w.objects.Cursor[0].get_pos();
        var isc = false;
        var l = o.a.length;
        for(var i=0; i&lt;l; i++) {
            if($w.collision.inside(o.a[i],b.a))isc = true;
        }
        return isc;
    }
    return {
        loop:loop,
        checkCollision:checkCollision
    }
}
/**
 * @param {Object}
 * */
var Text = function(o) {
    var loop = function(text) {
        if (typeof text === 'undefined') text = '';
        $w.log('collision = '+text);
        $w.canvas.clear(o.i);
        $w.canvas.text(o.i,o.x,o.y,text,true,o.font);    
    }
    return {
        loop:loop
    }
}
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
