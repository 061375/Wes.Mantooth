/**
 * Paint version 1.0.2
 * @author Jeremy Heminger <j.heminger@gmail.com>
 * a simple paint program that runs in a web page
 * - 1.0.2
 *   Added support for drag events
 *   Added support for a simple line drawing tool
 *
 *   */
window.onload = function() {
    var $t = document.getElementById('target'),
        w = 900,
        h = 600;
    // initialize Wes Mantooth
    $w.canvas.init($t,
                w,h);
    Paint.init($t,w,h);
};

var Paint = (function(){
    
    "use strict";
    
    // Start Initalization
    var $t,width,height;
    
    /**
     * @param {Boolean} is the program drawing
     * */
    var isDrawing = false;
    /**
     * @param {Boolean} is mouse in drag mode for lines and marquees
     * */
    var startDrag = false;
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
    var init = function(t,w,h) {
        $t = t;
        width = w;
        height = h;
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
        $w.log('initialize Paint.bind');
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
        $w.log('current tool "spray paint"');
        ctool = 0;
    }
    /**
     * */
    var pencil = function() {
        $w.log('current tool "pencil"');
        ctool = 1;
    }
    /**
     * */
    var line = function() {
        $w.log('current tool "line"');
        ctool = 2;
    }
    /**
     * */
    var eraser = function() {
        $w.log('current tool "eraser"');
        ctool = 3;
    }
    // End set the tools
    // -------------------------------------------------
    // Start set the tool size
    /**
     * */
    var small = function() {
        $w.log('current draw size "small"');
        psize = 1;
    }
    /**
     * */
    var medium = function() {
        $w.log('current draw size "medium"');
        psize = 2;
    }
    /**
     * */
    var large = function() {
        $w.log('current draw size "large"');
        psize = 3;
    }
    // End set the tool sizes
    // -------------------------------------------------
    // Start set the paint color
    /**
     * */
    var black = function() {
        $w.log('current draw color "black"');
        ccolor = 0;
    }
    /**
     * */
    var white = function() {
        $w.log('current draw color "white"');
        ccolor = 1;
    }
    /**
     * */
    var red = function() {
        $w.log('current draw color "red"');
        ccolor = 2;
    }
    /**
     * */
    var blue = function() {
        $w.log('current draw color "blue"');
        ccolor = 3;
    }
    /**
     * */
    var green = function() {
        $w.log('current draw color "green"');
        ccolor = 4;
    }
    /**
     * */
    var yellow = function() {
        $w.log('current draw color "yellow"');
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
        $w.log('Paint.newPainting');
        if (confirm("Are you sure?\nThis action will delete your awsome painting permanently.")) {
            $w.canvas.clear(0);
        }
    }
    // -------------------------------------------------
    // Start Tools
    /**
     * drawSpray
     * @param {Object} mouse event object
     * @returns {Void}
     * */
    var drawSpray = function(m) {
        var s = (psize * 10);
        for(var i=0; i<10;i++) {
            var x = (m.x + Math.random() * s) - (s/2);
            var y = (m.y + Math.random() * s) - (s/2);
            $w.canvas.circle(0,x,y,3,colors[ccolor]);
        }
        
    }
    /**
     * drawPencil
     * @param {Object} mouse event object
     * @returns {Void}
     * */
    var drawPencil = function(m){
        var s = (psize * 10);
        $w.canvas.circle(0,m.x,m.y,s,colors[ccolor]); 
    }
    /**
     * drawLine
     * @param {Object} mouse event object
     * @returns {Void}
     * */
    var drawLine = function(m){
        // if not dragging then set drag x,y as current mouse
        if(!startDrag) {
            startDrag = new Drag($t,m,'line',width,height);
        }
    }
    /**
     * @param {Object} mouse event object
     * @returns {Void}
     * */
    var drawEraser = function(m){
        var s = (psize * 10);
        $w.canvas.circle(0,m.x,m.y,s,'#ffffff'); 
    }
    
    // ---------------------------------------------------
    // Drag Events
    
    /**
     * confirmLine
     * actually draws a line once the drag event is complete
     * @param {Number}
     * @param {Number}
     * @param {Number}
     * @param {Number}
     * @returns {Void}
     * */
    var confirmLine = function(x,y,x2,y2) {
        $w.canvas.line(0,x,y,x2,y2,colors[ccolor],psize);    
    }
    /**
     * stopDrag
     * resets the drag 
     * @param {Number}
     * @returns {Void}
     * */
    var stopDrag = function(i) {
        var $t = document.getElementsByTagName("canvas")[i];
        $t.parentNode.removeChild($t.parentNode.childNodes[i]);
        endDraw();
        startDrag = false;
        $w.canvas.pop();
    }
    return {
        init:init,
        stopDrag:stopDrag,
        confirmLine:confirmLine
    }
})();
/**
 * Drag
 * creates a new layer to allow a drag event and runs the drag event
 * @param {Object} the target 
 * @param {Object} mouse x, y
 * @param {String} the operation to run line, marquee, etc...
 * @param {Number} width of the canvas layer
 * @param {Number} height of the canvas layer
 * @returns {Void}
 * */
var Drag = function($t,m,f,w,h) {
    
    $w.log('start drag: '+f);
    
    // @param {Number}
    this.i = $w.canvas.init($t,w,h);
    // @param {Object}
    this.ctx = $w.canvas.get(this.i,'canvas');
    // @param {Number}
    this.x = m.x;
    // @param {Number}
    this.y = m.y;
    // get the target canvas and cache it
    // @param {Object}
    this.$t = document.getElementsByTagName("canvas")[this.i];
    
    // get the mouse position 'on mouse move'
    $w.mouse.trackMouse(this.ctx,function(m,o){
        // set the useful varibales to the canvas DOM data attribute
        o.$t.dataset.x = m.x;
        o.$t.dataset.y = m.y;
        o.$t.dataset.x2 = o.x;
        o.$t.dataset.y2 = o.y;
        o.$t.dataset.i = o.i;
        o.$t.dataset.f = f;
        o.loop(m,f);
    },this);
    /**
     * stopDrag
     * fires when the mouse is released
     * @returns {Void}
     * */
    this.stopDrag = function() {
        switch(this.dataset.f) {
            case 'line':
                Paint.confirmLine(
                    this.dataset.x,
                    this.dataset.y,
                    this.dataset.x2,
                    this.dataset.y2
                );
                break;
        }
        $w.mouse.remove(this);
        Paint.stopDrag(this.dataset.i);
        
    }
    
    // add an event listener for the stop drag event after everything
    this.$t.addEventListener("mouseup",this.stopDrag);
}
/**
 * loop
 * @param {Object} mouse x, y
 * @param {String}
 * @returns {Void}
 * */
Drag.prototype.loop = function(m,f) {
    $w.canvas.clear(this.i);
    switch(f) {
        case 'line':
            $w.canvas.line(this.i,this.x,this.y,m.x,m.y);
        break;
    }
}