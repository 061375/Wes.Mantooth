
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