var $t; 
// make sure everything is loaded
window.onload = function() {
    // cache the target dom node
    $t = document.getElementById('target');
    // 
    $w.makeFPS();
    // 
    $w.add_object(
        1,
        Cursor,{width:150,height:150,color:{fill:'#ffec00',stroke:'#000000'},opacity:0.7},
        $t
    );
    //
    $w.add_object(
        1,
        Circle,{},
        $t
    );
    //
    $w.add_object(
        1,
        Square,{},
        $t
    );
    //
    $w.add_object(
        1,
        Polygon,{},
        $t
    );
    // get the mouse position 
    $w.loop();
}
var Cursor = function(o) {
    var loop = function() {
        $w.mouse.trackMouse($t,function(m) {
            var x = m.x;
            var y = m.y;
            x -= (o.width / 2);
            y -= (o.height / 2);
            $w.canvas.clear(o.i);
            $w.canvas.rectangle(o.i,x,y,o.width,o.height,o.color.stroke,'both',o.color.fill,o.opacity);
        });
    }
    return {
        loop:loop
    }
}
var Circle = function(o) {
    var x = o.x;
    var y = o.y;
    var r = o.radius;
    var loop = function(){
        $w.canvas.circle(o.i,x,y,r,o.color);
    };
    return {
        loop:loop,
        x:x,
        y:y,
        r:r
    }
}
var Square = function(o) {
    this.loop = function(){};
}
var Polygon = function(o) {
    this.loop = function(){};
}