/**
 * 
 * Lunar Lander
 * @author Jeremy Heminger 2017 <j.heminger13@gmail.com>
 * @version 2.0
 * 
 * */
window.onload = function(){
    $w.boolLog = false;
    $w.makeFPS();
    $w.main.width = (0.80*window.outerWidth); // 80% screen width
    $w.main.height = (0.35*window.outerWidth); // 35% screen width
    var $t = document.getElementById('target');
    load($t,function(){
        //GUI.init();
        rungame($t);
    });
}
function rungame($t) {
    Moon.init($t,10,2,400,function(){
        Lander.init($t);
    });
}
function load($t,callback) {
    $w.loading.init($t,0,'',function(r){
        if (!r) {
            callback(false);
        }
        $w.loading.load({
            lander:'assets/sprites/lander.png',
            lander_small:'assets/sprites/lander_small.png',
            lander_tiny:'assets/sprites/lander_tiny.png',
            nuke:'assets/sprites/nuke72frames.png',
            thrust:'assets/audio/thrust.mp3',
            kaboom:'assets/audio/kaboom.mp3',
            thrustogg:'assets/audio/thrust.ogg',
            kaboomogg:'assets/audio/kaboom.ogg'
        },function(){
            Stars.init($t,10);
            callback();
        });
    });
}

