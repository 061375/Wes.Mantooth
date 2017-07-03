/**
 * Wes Mantooth
 * Javascript animation and game engine
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 *
 * @updated July 2017
 * @version 2.1.0
 * */

var WesMantooth = function(){
    // globalize all the sub-classes
    this.canvas = Canvas;
    this._3D = _3D;
    this.math = _Math;
    this.motion = Motion;
    this.collision = Collision;
    this.mouse = Mouse;
    this.draw = Draw;
    this.color = Color;
    this.buttons = Buttons;
    this.loading = Loading;
    this.game = Game; 
    // @param {Boolean} if true render log to the console (I suggest overiding this in your code)
    this.boolLog = false;
    // @param {Object} each game object will be added to this main object so they can be looped through all at once
    this.objects = {};
    this.refs = [];
    // @param {Object} pre-load all the assets into this object
    this.assets = {
        img:[],
        audio:[],
        midi:[],
        scripts:[],
        link:[]
    }
    /**
     * log
     * if this.boolLog console.log exists this renders a string
     * @param {String}
     * @returns {Void}
     * */
    this.log = function( text ){
        if (this.boolLog) {
            if( (window['console'] !== undefined) ){
                    console.log( text );
            }
        }
    }
    /**
     * get currentlocation of the wes.mantooth.js script
     * @returns {String}
     * */
    this.slocation = function() { 
        var s = document.getElementsByTagName('script');
        var l = s.length;
        var r = '';
        for(var i = 0; i<l; i++) {
            if (s[i].src.indexOf('wes.mantooth.js') > -1) {
                r = s[i].src;
                r = r.replace(r.substr(r.indexOf('wes.mantooth.js'),r.length),'');
                r = r.replace('components/','');
            }
        }
        return r; 
    }
    /**
     * @param {Boolean}
     * @returns {Void}
     * */
    this.makeFPS = function(s) {
        if (typeof s === 'undefined')
            s = true;
        
        if (s) {
            s = 'show';
        }else{
            s = '';
        }
        var b = document.createElement('div');
            b.setAttribute('id','wm_show_fps');
            b.setAttribute('class',s);
        document.getElementsByTagName('body')[0].appendChild(b);    
    }
    /**
     * @param {Object}
     * @returns {Void}
     * */
    this.upFPS = function($t) {
        if (typeof $t === 'undefined')
            $t = document.getElementById('wm_show_fps');
            
        $t.innerHTML = countFPS()+' fps';
    }
    /**
     * the main loop
     * @returns {Void}
     * */
    this.loop = function() {
        for (var prop in this.objects) {
            if (this.objects.hasOwnProperty(prop)) {
                for (var obj in this.objects[prop]) {
                    this.objects[prop][obj].loop();
                }
            }
        }
    }
    
    
    /* Game Hooks */
    
    this.add_object = function(r,o,p,$t) {
        return $w.game.add_object(r,o,p,$t);    
    }
    this.all = function(ids,o,f,p) {
        var l = ids.length;
        for (var i=0; i<l; i++) {
            p.i = i;
            $w.objects[o][i][f](p);
        }
    }
};
// instantiate class an set an alias
var $w = new WesMantooth;