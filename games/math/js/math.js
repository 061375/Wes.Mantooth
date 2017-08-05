window.onload = function() {
    // initialize 
    var i = $w.canvas.init(document.getElementById('target'));
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
    
    var center = 500, x = -1000, y = -1000, m = 1, b = 60, max = 100, i = 0;
    
    for(x; x < max; x+=10) {
        y = (m * x) + b;
        $w.canvas.circle(i,center + x,center + y,3);
        console.log('x '+x);
        console.log('y '+y);
    }
    
}