/**
 * Wes Mantooth
 * Javascript animation and game engine
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 *
 * @updated August 21, 2017
 * @version 2.1.1
 * */

var $w = {
    // @var {Boolean} if true render log to the console (I suggest overiding this in your code)
    boolLog:false,
    // @var {Object} each game object will be added to this main object so they can be looped through all at once
    objects:{},
    killobjects:{},
    // @var {Object} objects that are on the stage but will never be looped
    noloop:{},
    // @var {Array} list of objects that currently do not want to have their canvas cleared
    noclear:[],
    looprunning:true,
    // @var {Object} if set into the inits loop all objects will call an init function for all called by add_object
    inits:{},
    refs:[],
    hasdepth:[],
    gamespeed:0,
    global:{},
    // @var {Object} pre-load all the assets into this object
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
        var style = document.createElement('style');
            style.innerHTML = '#wm_show_fps{background: #000;z-index: 999999;width: 100px;height: 80px;position: absolute;color: #ffff00;right: 0;top: 0;padding: 5px;display:none;}#wm_show_fps.show{display:block}'
        document.getElementsByTagName('head')[0].appendChild(style);
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
     * @param {Boolean} if true loop
     * @param {Number} a reference to a canvas by ID
     * @param {Boolean}
     * @returns {Void}
     * */
    loop: function(ra,i,fps) {
        if (typeof i !== 'undefined' && !isNaN(i)) { 
            if(this.noclear.indexOf(i) == -1){
                $w.canvas.clear(i);
            }
        }
        if (typeof fps !== 'undefined' || fps) {
            $w.upFPS();
        }
        for (var prop in this.objects) {
            if (this.objects.hasOwnProperty(prop)) {
                var l = this.objects[prop].length;
                for(var j = 0; j < l; j++) {
                    if (this.objects[prop][j] != null)
                        this.objects[prop][j].loop();    
                }
                //
                if ($w.hasdepth.indexOf(prop) > -1) {
                    for(var j = 0; j < l; j++) {
                        // make sure our target to move is not null
                        if (this.objects[prop][j] != null)
                            // make sure this wants to be moved (i.e. an Object that has no z)
                            if (typeof this.objects[prop][j].z !== 'undefined') {
                                var remove = this.objects[prop].splice(j,1);
                                this.objects[prop].splice(remove[0].z,0,remove[0]);
                            }
                    } 
                }
            } 
        }
        if(ra && $w.looprunning){
            window.setTimeout(function(){
                window.requestAnimationFrame(function(){ 
                    $w.loop(ra,i,fps);
                });
            },$w.gamespeed);
        }
        $w.kill_players();
    },
    clearloop: function() {
        $w.looprunning = false;  
    },
    requestNoClear: function(i) {
        if(this.noclear.indexOf(i) == -1)
            this.noclear.push(i);
    },
    removeRequestNoClear: function(i) {
        var ii = 0;
        for(var j=0; j<this.noclear.length; j++) {
            if(this.noclear[j]==i)
                ii = j;
        }
        this.noclear.splice(ii,1);
    },
    /**
     * set a variable for all objects of type obj
     * @param {String} the name of the target object
     * @param {String} the name of the object to update
     * @param {Variant} 
     * @returns {Void}
     * */ 
    obj_set_var: function(obj,v,val,callback) {
        if (this.objects.hasOwnProperty(obj)) {
            var l = this.objects[obj].length;
            for(var j = 0; j < l; j++) {
                if (this.objects[obj][j] != null)
                    this.objects[obj][j][v] = val;    
            }
        }
        if (typeof callback === 'function')
            callback();
    },
    /**
     * runs a method for all instances of an object
     * @param {String} the name of the target object
     * @param {String} the name of the object to update
     * @param {Variant} parameter to pass to the function (probably an object)
     * @returns {Void}
     * */ 
    obj_run_method: function(obj,f,p,callback) {
        if (this.objects.hasOwnProperty(obj)) {
            var l = this.objects[obj].length;
            for(var j = 0; j < l; j++) {
                if (this.objects[obj][j] != null)
                    if (typeof this.objects[obj][j][f] === 'function')
                        this.objects[obj][j][f](p);    
            }
        }
        if (typeof callback === 'function')
            callback(); 
    },
    kill_players: function() {
        for (var prop in this.killobjects) {
            if (this.killobjects.hasOwnProperty(prop)) {
                var l = this.killobjects[prop].length;
                for(var j = 0; j < l; j++) {
                    this.objects[prop][this.killobjects[prop][j]] = null;
                    //this.objects[prop].splice(this.killobjects[prop][j],1);
                }
            }
        }
    },
    /* Game Hooks */
    
    add_object: function(r,o,p,$t,w,h,noloop) {
        return $w.game.add_object(r,o,p,$t,w,h,noloop);    
    },
    add_object_single: function(r,o,p,$t,w,h,noloop) {
        return $w.game.add_object_single(r,o,p,$t,w,h,noloop);    
    },
    remove_object: function(f,i) {
        return $w.game.remove_object(f,i);
    },
    kill_player: function(f,i) {
        if(undefined === this.killobjects[f]) {
            this.killobjects[f] = [];
        }
        this.killobjects[f].push(i);
    },
    all: function(ids,o,f,p) {
        var l = ids.length;
        for (var i=0; i<l; i++) {
            p.i = i;
            $w.objects[o][i][f](p);
        }
    }
};