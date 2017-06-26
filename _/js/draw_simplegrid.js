window.onload = function() {
    // initialize Wes Mantooth
    var i = $w.canvas.init(document.getElementById('target'));
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
}