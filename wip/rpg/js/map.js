var Map = (function(){
    // @param {Number}
    var tspeed = 300;
    /**
     * door
     * basically allows expansion by expanding across multiple wrappers
     * @param {Object}
     * @param {String}
     * @returns {Void}
     * */
    var door = function($t,d) {
        switch(d) {
            case 'up':up($t);break;
            case 'down':down($t);break;
            case 'left':left($t);break;        
            case 'right':right($t);break;
        }
    }
    
    // wrappers to setup what the door will do
    
    /**
     * up
     * @param {Object}
     * @returns {Void}
     * */
    var up = function($t) {
        rundoor($t,'totop','frombottom');
    }
    /**
     * down
     * @param {Object}
     * @returns {Void}
     * */
    var down = function($t) {
        rundoor($t,'tobottom','fromtop');
    }
    /**
     * left
     * @param {Object}
     * @returns {Void}
     * */
    var left = function($t) {
        rundoor($t,'toleft','fromright');
    }
    /**
     * right
     * @param {Object}
     * @returns {Void}
     * */
    var right = function($t) {
        rundoor($t,'toright','fromleft');
    }
    
    /**
     * rundoor
     * actually runs the room animation
     * @param {Object}
     * @param {String}
     * @param {String}
     * @returns {Void}
     * */
    var rundoor = function($t,to,from) {
        $t.setAttribute('class','');
        $t.addClass('out');
        $t.addClass(to);
        setTimeout(function(){
            $t.removeClass(to);
            $t.addClass(from);
            setTimeout(function(){
                $t.setAttribute('class','');
            },tspeed);
        },tspeed);
    }
    
    var init = function() {
        
    }
    
    return {
        init:init,
        door:door
    }
})();

var LayerHack = function(o) {
    this.i = o.i;
    this.x = 0;
    this.y = 350;
    if(!$w.canvas.image(this.i,
        {
            img:$w.assets.img.foreground,
            dx:this.x,
            dy:this.y,
            dWidth:620,
            dHeight:267,
            sWidth:false
        })){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
    var hide = function(b) {
        if(b) {
            document.getElementsByTagName('canvas')[this.i].addClass('hidden');
        }else{
            document.getElementsByTagName('canvas')[this.i].removeClass('hidden');
        }
    }
}
LayerHack.prototype.loop = function() {

}
var GridHack = function(o) {
    this.i = o.i;
    this.x = 0;
    this.y = 0;
    if(!$w.canvas.image(this.i,
        {
            img:$w.assets.img.grid,
            dx:this.x,
            dy:this.y,
            dWidth:620,
            dHeight:620,
            sWidth:false
        })){
        // if an error is returned throw the error
        $w.canvas.has_error();
    } 
}
GridHack.prototype.loop = function() {

}