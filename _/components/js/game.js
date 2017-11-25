$w.game = {
    map:{},
    b_keydown:false,
    b_keypress:false,
    b_keyup:false,
    /**
     * @param {Number}
     * @param {Object}
     * @param {Object}
     * @param {Object}
     * @param {Number}
     * @param {Number}
     * @param {Boolean}
     * 
     * @returns {Array}
     * */
    add_object: function(maxobjects,$target,params,$container,w,h,noloop){ 
        var ids = [];
        // run a loop to create all the objects
        for(var i=0; i<maxobjects; i++){
            // create a canvas context and assign the result to j
            // its true that this loop will result in the same as i
            // but it demonstrates that the funcxtion returns the ID of the canavas object
            var j = $w.canvas.init($container,w,h);
            
            params.i = j;
            
            params.count = i;
            
            if (typeof noloop === 'undefined' || noloop) {
                // instaniate a new object
                if (typeof $w.objects[$target.name] === 'object') {
                     $w.objects[$target.name][j] = new $target(params);
                }else{
                    $w.objects[$target.name] = [];
                    $w.objects[$target.name][j] = new $target(params);
                }
            }else{
                // instaniate a new object
                if (typeof $w.noloop[$target.name] === 'object') {
                     $w.noloop[$target.name][j] = new $target(params);
                }else{
                    $w.noloop[$target.name] = [];
                    $w.noloop[$target.name][j] = new $target(params);
                }
            }
            ids.push(j);
        }
        return ids;
    },
    /**
     * @param {Number} [maxobjects] maximum objects to instantiate
     * @param {Object} [$target] target game object to instantiate 
     * @param {Object} [params] target object parameters
     * @param {Variant} DOM Node Object or Number (reference to existing canvas)
     * @param {Number} W
     * @param {Number} H
     *
     * @returns {Number} Reference ID to the canvas
     * */
    add_object_single: function(maxobjects,$target,params,$container,w,h) {
   
        var i,j;
        
        // if $container does not have a reference then this is the first run
        if(typeof $container === 'object') {
            // create a canvas
            i = $w.canvas.init($container,w,h);
        }else{
            // get the reference
            i = $container;
        }
        // run a loop to create all the objects
        for(j=0; j<maxobjects; j++){
           
            params.i = i;
            params.count = j;
            
            // instaniate a new object
            if (typeof $w.objects[$target.name] !== 'object')
                $w.objects[$target.name] = [];
            $w.objects[$target.name].push(new $target(params));
        }
        return i;
    },
    /**
     * @param {Number}
     * @param {Number}
     * @returns {Void}
     * */
    remove_object: function(f,i) {
        $w.objects[f].splice(i,1);
            var $t = document.getElementsByTagName("canvas")[i];
            if (typeof $t !== 'undefined') 
                $t.parentNode.removeChild($t.parentNode.childNodes[i]);
    },
    /**
     * @param {Object} a map of functions to bind to keys
     * @param {Object} target DOM node (default is document)
     * @param {String} [ keyup, keypress, keyup ] the default is keyup
     * */
    bindkeys: function(m,e,$t,s) {
        $w.log('Game.key.'+e);
        if (typeof $w.game.map[e] === 'undefined')
            $w.game.map[e] = [];
        $w.game.map[e].push(m);

        if (typeof $t === 'undefined') {
            $t = document;
        }

        switch(e) {
            case "keydown":
                if (!this.b_keydown) {
                    this.b_keydown = true;
                    $t.addEventListener("keydown",function(evt){
                        if (detectIE) {
                            evt.code = $w.keycode[evt.keyCode];
                        }
                        $w.game.key(evt,e,s);
                    });
                }
                break;
            case "keypress":
                if (!this.b_keypress) {
                    $t.addEventListener("keypress",function(evt){
                        if (detectIE) {
                            evt.code = $w.keycode[evt.keyCode];
                        }
                        $w.game.key(evt,e,s)});
                }
                break;
            default:
                if (!this.b_keyup) {
                    $t.addEventListener("keyup",function(evt){
                        if (detectIE) {
                            evt.code = $w.keycode[evt.keyCode];
                        }
                        $w.game.key(evt,e,s)});
                }
        }
    },
    /**
     * @param {Object} the event
     * @param {String} the event name
     * */
    key: function(e,f,s){
        $w.log('Game.key.'+f);
        $w.log(e);
        var l = $w.game.map[f].length;
        for(var i=0; i<l; i++) {
            var o = $w.game.map[f][i];
            for (var key in o) {
                if (o.hasOwnProperty(key)) {
                    if(e.code == key) {
                        o[key](e,s);    
                    }
                }
            }
        }
    },        
}
/**
 * Internet Explorer Hack
 * To make the keyboard tool easier I built it using the more handy key event code strings that are supported by Firefox and Chrome
 * */
$w.keycode = [];
$w.keycode[0]='';
$w.keycode[1]='';
$w.keycode[2]='';
$w.keycode[3]='';
$w.keycode[4]='';
$w.keycode[5]='';
$w.keycode[6]='';
$w.keycode[7]='';
$w.keycode[8]='Backspace';
$w.keycode[9]='Tab';
$w.keycode[10]='';
$w.keycode[11]='';
$w.keycode[12]='';
$w.keycode[13]='Enter';
$w.keycode[14]='';
$w.keycode[15]='';
$w.keycode[16]='ShiftLeft';
$w.keycode[17]='ControlLeft';
$w.keycode[18]='AltLeft';
$w.keycode[19]='';
$w.keycode[20]='';
$w.keycode[21]='';
$w.keycode[22]='';
$w.keycode[23]='';
$w.keycode[24]='';
$w.keycode[25]='';
$w.keycode[26]='';
$w.keycode[27]='Escape';
$w.keycode[28]='';
$w.keycode[29]='';
$w.keycode[30]='';
$w.keycode[31]='';
$w.keycode[32]='';
$w.keycode[33]='';
$w.keycode[34]='';
$w.keycode[35]='';
$w.keycode[36]='';
$w.keycode[37]='ArrowLeft';
$w.keycode[38]='ArrowUp';
$w.keycode[39]='ArrowRight';
$w.keycode[40]='ArrowDown';
$w.keycode[41]='';
$w.keycode[42]='';
$w.keycode[43]='';
$w.keycode[44]='';
$w.keycode[45]='';
$w.keycode[46]='';
$w.keycode[47]='';
$w.keycode[48]='Digit0';
$w.keycode[49]='Digit1';
$w.keycode[50]='Digit2';
$w.keycode[51]='Digit3';
$w.keycode[52]='Digit4';
$w.keycode[53]='Digit5';
$w.keycode[54]='Digit6';
$w.keycode[55]='Digit7';
$w.keycode[56]='Digit8';
$w.keycode[57]='Digit9';
$w.keycode[58]='';
$w.keycode[59]='';
$w.keycode[60]='';
$w.keycode[61]='';
$w.keycode[62]='';
$w.keycode[63]='';
$w.keycode[64]='';
$w.keycode[65]='KeyA';
$w.keycode[66]='KeyB';
$w.keycode[67]='KeyC';
$w.keycode[68]='KeyD';
$w.keycode[69]='KeyE';
$w.keycode[70]='KeyF';
$w.keycode[71]='KeyG';
$w.keycode[72]='KeyH';
$w.keycode[73]='KeyI';
$w.keycode[74]='KeyJ';
$w.keycode[75]='KeyK';
$w.keycode[76]='KeyL';
$w.keycode[77]='KeyM';
$w.keycode[78]='KeyN';
$w.keycode[79]='KeyO';
$w.keycode[80]='KeyP';
$w.keycode[81]='KeyQ';
$w.keycode[82]='KeyR';
$w.keycode[83]='KeyS';
$w.keycode[84]='KeyT';
$w.keycode[85]='KeyU';
$w.keycode[86]='KeyV';
$w.keycode[87]='KeyW';
$w.keycode[88]='KeyX';
$w.keycode[89]='KeyY';
$w.keycode[90]='KeyZ';
$w.keycode[91]='';
$w.keycode[92]='';
$w.keycode[93]='';
$w.keycode[94]='';
$w.keycode[95]='';
$w.keycode[96]='Numpad0';
$w.keycode[97]='Numpad1';
$w.keycode[98]='Numpad2';
$w.keycode[99]='Numpad3';
$w.keycode[100]='Numpad4';
$w.keycode[101]='Numpad5';
$w.keycode[102]='Numpad6';
$w.keycode[103]='Numpad7';
$w.keycode[104]='Numpad8';
$w.keycode[105]='Numpad9';
$w.keycode[106]='NumpadMultiply';
$w.keycode[107]='NumpadAdd';
$w.keycode[108]='';
$w.keycode[109]='NumpadSubtract';
$w.keycode[110]='NumpadDecimal';
$w.keycode[111]='NumpadDivide';
$w.keycode[112]='F1';
$w.keycode[113]='F2';
$w.keycode[114]='F3';
$w.keycode[115]='F4';
$w.keycode[116]='F5';
$w.keycode[117]='F6';
$w.keycode[118]='F7';
$w.keycode[119]='F8';
$w.keycode[120]='F9';
$w.keycode[121]='F10';
$w.keycode[122]='F11';
$w.keycode[123]='F12';
/*
$w.keycode[124]='';
$w.keycode[125]='';
$w.keycode[126]='';
$w.keycode[127]='';
$w.keycode[128]='';
$w.keycode[129]='';
$w.keycode[130]='';
$w.keycode[131]='';
$w.keycode[132]='';
$w.keycode[133]='';
$w.keycode[134]='';
$w.keycode[135]='';
$w.keycode[136]='';
$w.keycode[137]='';
$w.keycode[138]='';
$w.keycode[139]='';
$w.keycode[140]='';
$w.keycode[141]='';
$w.keycode[142]='';
$w.keycode[143]='';
$w.keycode[144]='';
$w.keycode[145]='';
$w.keycode[146]='';
$w.keycode[147]='';
$w.keycode[148]='';
$w.keycode[149]='';
$w.keycode[150]='';
$w.keycode[151]='';
$w.keycode[152]='';
$w.keycode[153]='';
$w.keycode[154]='';
$w.keycode[155]='';
$w.keycode[156]='';
$w.keycode[157]='';
$w.keycode[158]='';
$w.keycode[159]='';
$w.keycode[160]='';
$w.keycode[161]='';
$w.keycode[162]='';
$w.keycode[163]='';
$w.keycode[164]='';
$w.keycode[165]='';
$w.keycode[166]='';
$w.keycode[167]='';
$w.keycode[168]='';
$w.keycode[169]='';
$w.keycode[170]='';
$w.keycode[171]='';
$w.keycode[172]='';
$w.keycode[173]='';
$w.keycode[174]='';
$w.keycode[175]='';
$w.keycode[176]='';
$w.keycode[177]='';
$w.keycode[178]='';
$w.keycode[179]='';
$w.keycode[180]='';
$w.keycode[181]='';
$w.keycode[182]='';
$w.keycode[183]='';
$w.keycode[184]='';
$w.keycode[185]='';
$w.keycode[186]='';
$w.keycode[187]='';
$w.keycode[188]='';
$w.keycode[189]='';
$w.keycode[190]='';
$w.keycode[191]='';
$w.keycode[192]='';
$w.keycode[193]='';
$w.keycode[194]='';
$w.keycode[195]='';
$w.keycode[196]='';
$w.keycode[197]='';
$w.keycode[198]='';
$w.keycode[199]='';
$w.keycode[200]='';
$w.keycode[201]='';
$w.keycode[202]='';
$w.keycode[203]='';
$w.keycode[204]='';
$w.keycode[205]='';
$w.keycode[206]='';
$w.keycode[207]='';
$w.keycode[208]='';
$w.keycode[209]='';
$w.keycode[210]='';
$w.keycode[211]='';
$w.keycode[212]='';
$w.keycode[213]='';
$w.keycode[214]='';
$w.keycode[215]='';
$w.keycode[216]='';
$w.keycode[217]='';
$w.keycode[218]='';
$w.keycode[219]='';
$w.keycode[220]='';
$w.keycode[221]='';
*/
