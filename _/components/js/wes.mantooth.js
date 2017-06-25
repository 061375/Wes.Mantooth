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
};
// instantiate class an set an alias
var $w = new WesMantooth;