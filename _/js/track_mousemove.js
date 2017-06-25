window.onload = function() {
    // initialize Wes Mantooth
    var i = $w.canvas.init();
    // get the canvas object
    var ctx = $w.canvas.get(i,'canvas');
    // get the mouse position 'on mouse move'
    $w.mouse.trackMouse(ctx,function(m){
        console.log(m);
    });
}