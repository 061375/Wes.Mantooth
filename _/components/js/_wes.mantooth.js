/**
 * Wes Mantooth
 * Javascript animation and game engine
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 *
 * @updated July 2017
 * @version 2.1.0
 * */

var $w = {
    // @param {Boolean} if true render log to the console (I suggest overiding this in your code)
    boolLog:false,
    // @param {Object} each game object will be added to this main object so they can be looped through all at once
    objects:{},
    refs:[],
    // @param {Object} pre-load all the assets into this object
    assets: {
        img:[],
        audio:[],
        midi:[],
        scripts:[],
        link:[]
    },
    main: {
        width:0,
        height:0
    },
    /**
     * log
     * if this.boolLog console.log exists this renders a string
     * @param {String}
     * @returns {Void}
     * */
    log: function( text ){
        if (this.boolLog) {
            if( (window['console'] !== undefined) ){
                    console.log( text );
            }
        }
    },
    /**
     * get currentlocation of the wes.mantooth.js script
     * @returns {String}
     * */
    slocation: function() { 
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
    },
    /**
     * @param {Boolean}
     * @returns {Void}
     * */
    makeFPS: function(s) {
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
    },
    /**
     * @param {Object}
     * @returns {Void}
     * */
    upFPS: function($t) {
        if (typeof $t === 'undefined')
            $t = document.getElementById('wm_show_fps');
        $t.innerHTML = countFPS()+' fps';
    },
    /**
     * the main loop
     * @returns {Void}
     * */
    loop: function() {
        for (var prop in this.objects) {
            if (this.objects.hasOwnProperty(prop)) {
                for (var obj in this.objects[prop]) {
                    this.objects[prop][obj].loop();
                }
            }
        }
         window.requestAnimationFrame(this.loop.bind(this));
    },
    
    
    /* Game Hooks */
    
    add_object: function(r,o,p,$t,w,h) {
        return $w.game.add_object(r,o,p,$t,w,h);    
    },
    all: function(ids,o,f,p) {
        var l = ids.length;
        for (var i=0; i<l; i++) {
            p.i = i;
            $w.objects[o][i][f](p);
        }
    }
};