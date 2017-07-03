var Game = {
    map:{},
    add_object: function(r,o,p,$t){
        var ids = [];
        // run a loop to create all the balls
        for(var i=0; i<r; i++){
            // create a canvas context and assign the result to j
            // its true that this loop will result in the same as i
            // but it demonstrates that the funcxtion returns the ID of the canavas object
            var j = $w.canvas.init($t);
            
            p.i = j;
    
            // instaniate a new ball
            if (typeof $w.objects[o.name] === 'object') {
                 $w.objects[o.name][j] = new o(p);
            }else{
                $w.objects[o.name] = [];
                $w.objects[o.name][j] = new o(p);
            }
            ids.push(j);
        }
        return ids;
    },
    /**
     * @param {Object} a map of functions to bind to keys
     * @param {Object} target DOM node (default is document)
     * @param {String} [ keyup, keypress, keyup ] the default is keyup
     * */
    bindkeys: function(m,e,$t) {
        $w.log('Game.key.'+e);
        if (typeof $w.game.map[e] === 'undefined')
            $w.game.map[e] = [];
        $w.game.map[e].push(m);

        if (typeof $t === 'undefined') {
            $t = document;
        }

        switch(e) {
            case "keydown":
                $t.addEventListener("keydown",function(evt){Game.key(evt,e)});
                break;
            case "keypress":
                $t.addEventListener("keypress",function(evt){Game.key(evt,e)});
                break;
            default:
                $t.addEventListener("keyup",function(evt){Game.key(evt,e)});
        }
    },
    /**
     * @param {Object} the event
     * @param {String} the event name
     * */
    key: function(e,f){
        $w.log('Game.key.'+f);
        $w.log(e);
        var l = $w.game.map[f].length;
        for(var i=0; i<l; i++) {
            var o = $w.game.map[f][i];
            for (var key in o) {
                if (o.hasOwnProperty(key)) {
                    if(e.code == key) {
                        o[key](e);    
                    }
                }
            }
        }
    }
}