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
    for(var i=0; i<l;i++){
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