/**
 * Loading
 * @version 1.0.0
 * @author Jeremy Heminger <j.heminger@gmail.com>
 *
 * */
var Loading = (function() {

    "use strict";
    
    var errors = [];
    
    var loader_images = ['.jpg','.gif','.png','.svg'];
    
    var asset_filter = ['.jpg','.gif','.png','.svg','.bmp','.js','.txt','.ogg','.mp3','.mid','.mp4'];
    
    var O = {
        loaders:[
            // path to loader image or text
            'loading1.gif',
            'loading2.gif'
        ],
        loaded:0,
        loading:null,
        timeout:10000
    }
    /**
     * @param {Object} DOM node target to add loader to
     * @param {Number} O.loader[i] loader image or text
     * @param {String|Boolean} a class overide 
     * @param {Function}
     * @return {Function} callback
     * */
    var init = function($t,i,c,callback) {
        
        O.assets_path = $w.sloading()+'../assets/';
        
        // if c not set make it an empty string
        if (typeof c === 'undefined') c = '';
        
        // create fader background
        var fader = document.createElement('div');
            fader.setAttribute('class','loader_fader '+c);
        // if the 
        if (typeof O.loaders[i] === 'undefined') {
            set_error('selected loader reference does not exist');
            if(typeof callback === 'function') {
                callback(false);
            }else{
                return false;
            }
        }
        var loader = document.createElement('div');
            loader.setAttribute('class','loader_container '+c);
            if (loader_images.indexOf(O.loaders[i]) > -1) {
                var img = document.createElement('img');
                    img.setAttribute('src',O.assets_path+O.loaders[i]);
                loader.appendChild(img);
            }else{
                loader.innerHTML = O.loaders[i];
            }
        $t.appendChild(fader);
        $t.appendChild(loader);
        if(typeof callback === 'function') {
            callback(true);
        }
        return true;
    }
    /**
    * @param {Object} list of assets to load
    * @param {Function}
    * @return {Function} callback
    * */ 
    var load = function(a,callback) {
        var tcount = 0;
        var p = /\.[0-9a-z]+$/i;
        _.each(a, function(value, key){
            var e = value.match(p);
            switch (e) {
                case '.jpg':
                case '.gif':
                case '.png':
                case '.svg':
                case '.bmp':
                    load_images(value,key);
                    break;
                case '.js':
                case '.json':
                    load_script(value,key);
                    break;
                case '.txt':
                case '.css':
                    load_link(value,key);
                    break;
                case '.ogg':
                case '.mp3':
                    load_audio(value,key);
                    break;
                case '.midi': // @todo 
                    break;
                case '.mp4': // @todo
                    break;
                default:
                   set_error('requested MIME type not supported');
                   callback(false);
            }
            has_error();
        });
        // this will loop and check if the number of assets loaded is equal to the number of requested assets
        O.loading = setInterval(function(){
            // true return true
            if(O.loaded == l) {
                callback(true);
            }
            // increment timeout counter
            tcount++;
            // if greater than O.timeout
            if (tcount >= O.timeout) {
                // throw error
                set_error('assets failed to load, process timed out');
                callback(false);
            }
        },100);
    }
    /**
     * removes asset loader animation
     * @param {Function}
     * @returns {Function} callback
     * */
    var complete = function(callback) {
        var c = ['loader_fader','loader_container'];
        for(var x = 0; x<=2;x++) {
            var lo = document.getElementsByClassName(c[x]);
            var l = l.length;
            for(var i=0; i<l; i++) {
                lo[i].parentElement.removeChild(lo[i]);
            }
        }
        callback();
    }
    /**
     * @param {String} image path
     * @param {String} object key to reference the image in the $w.assets object
     * @returns {Void}
     * */
    var load_images = function(img,key) {
        var r = new Image();
        r.src = img;
        r.onload = function() {
            $w.assets.img[key] = r;
            O.loaded++;   
        }
    }
    /**
     * @param {String} image path
     * @param {String} object key to reference the audio in the $w.assets object
     * @returns {Void}
     * */
    var load_audio = function(au) {
        var a = new Audio(au);
        a.oncanplaythrough = function() {
            $w.assets.audio[key] = a;
            O.loaded++;      
        }
    }
    /**
     * appends the link tag, genrally used for css
     * there is currently limited sopport for onload of stylesheets
     * and frankly, I don't think its that important...css loads pretty fast
     * and browsers pick up the rules on the fly.
     * @param {Object}
     * @param {String}
     * @returns {Boolean}
     * */
    var load_link = function(l,key) {
        if (typeof l.rel === 'undefined') {
            set_error('Loading.load_link param l.rel is a required field');
            return false;
        }
        if (typeof l.href === 'undefined') {
            set_error('Loading.load_link param l.href is a required field');
            return false;
        }
        var link = document.createElement('link');
            link.setAttribute('rel',l.rel);
            link.setAttribute('href',l.href);
        document.getElementsByName('head').appendChild(link);
        $w.assets.link[key] = link;
        O.loaded++;
        return true;
    }
    /**
     * this does not currently contain an onload for external libraries
     * either load them with the script tag as normal or check if the class/function etc exists in your own code
     * @param {Object}
     * @param {String}
     * @returns {Boolean}
     * */
    var load_script = function(l,key) {
        if (typeof l.src === 'undefined') {
            set_error('Loading.load_script param l.src is a required field');
            return false;
        }
        var script = document.createElement('script');
            if (typeof l.type !== 'undefined')
                script.setAttribute('type',l.type);
            if (typeof l.integrity !== 'undefined')
                script.setAttribute('integrity',l.integrity);
            if (typeof l.crossorigin !== 'undefined')
                script.setAttribute('crossorigin',l.crossorigin);
            script.setAttribute('src',l.src);
        document.getElementsByName('head').appendChild(script);
        $w.assets.script[key] = link;
        O.loaded++;
        return true;
    }
    /**
     * @param {String}
     * @returns {Void}
     * * */
    var set_error = function(e) {
        errors.push('Error: '+e);     
    }
    /**
     * if errors exist they are dumped to the console
     * @returns {Void}
     * * */
    var has_error = function() {
        if (errors.length > 0) {
            var l = errors.length;
            for(var i = 0; i < l; i++) {
                $w.log(errors[i]);   
            }
            return true;
        }
        return false;
    }
    /**
     * wrapper to update O
     * @returns {Void}
     * */
    var setO_val = function(k,v) {
        O[k] = v;
    }
    return {
        init: init,
        setO_val: setO_val,
        has_error:has_error
    };   
}());