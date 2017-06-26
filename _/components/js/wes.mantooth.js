/**
 * Wes Mantooth
 * Javascript animation and game engine
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 *
 * @updated June 2017
 * @version 2.0.0
 * */

var WesMantooth = function(){
    this.canvas = Canvas;
    this._3D = _3D;
    this.motion = Motion;
    this.collision = Collision;
    this.mouse = Mouse;
    this.draw = Draw;
    this.color = Color;
    this.boolLog = true;
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
                r = r.replace('wes.mantooth.js','');
            }
        }
        return r; 
    }
};
// instantiate class an set an alias
var $w = new WesMantooth;