var Stars = (function(){
    var s = [];
    var ns;
    /**
     * @param {Number} integer number of stars
     * */
    var init = function($t,n) {
        ns = n;
        for(var i=0;i<n;i++) {
            s[i] = {
                i:$w.canvas.init($t,10,10)   
            }
            document.getElementsByTagName('canvas')[i].style.left = 1 + (Math.random() * ($w.main.width * 0.98))+'px';
            document.getElementsByTagName('canvas')[i].style.top = (Math.random() * ($w.main.height * 0.70))+'px';
        }
        loop();
    }
    var loop = function() {
        
        for(var i=0;i<ns;i++) {
            $w.canvas.clear(s[i].i);
            var f = Math.random() * 2000;
            if (f < 10) {
                //flicker
                $w.canvas.circle(s[i].i,1,1,3,'#b9b1fc');
            }else{
                // dont
                $w.canvas.circle(s[i].i,1,1,1,'#9387fa');
            }
        }
        $w.upFPS();
        window.requestAnimationFrame(loop.bind(this));
    }
    return {
        init:init
    }
})();