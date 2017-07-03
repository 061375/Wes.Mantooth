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