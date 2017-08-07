// http://192.168.1.154/games/knearest/
window.onload = function() {
    'use strict';
    // initialize 
    var i = $w.canvas.init(document.getElementById('target'));
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
    
    // create our sample data
    var green = [
        [-433,-400]/*,
        [-200,-133],
        [10,-60],
        [-100,10],
        [-200,-200]*/
    ];
    var red = [
        [100,200],
        [322,233],
        [127,88],
        [357,276],
        [430,227]
    ];
    for(var j=0; j<green.length; j++) {
        
        green[j] = dtogrid(green[j][0],green[j][1],500);
        $w.canvas.circle(i,green[j][0],green[j][0],3,'#008040');
        $w.canvas.text(i,green[j][0],green[j][0]-5,'{'+green[j][0]+','+green[j][1]+'}');
    }
    for(var j=0; j<red.length; j++) {
        red[j] = dtogrid(red[j][0],red[j][1],500);
        $w.canvas.circle(i,red[j][0],red[j][0],3,'#0013ff');
    }
    // build some random test
    /*
    var tests = [], l = 1, j = 0;
    for(j;j<l;j++) {
        tests[j] = [];
        tests[j][0] = $w.math.frandom(1000) - 500; // random x
        tests[j][1] = $w.math.frandom(1000) - 500; // random y
        tests[j] = dtogrid(tests[j][0],tests[j][1],500);
        $w.canvas.circle(i,tests[j][0],tests[j][1],6,'#000000');
    }
    */
    // I want to setup a basic test with repeatable results to start
    
    var tests = [
        [-20,-30]
    ];
    
    var l = tests.length;
    for (var j=0;j<l;j++) {
        tests[j] = dtogrid(tests[j][0],tests[j][1],500);
        $w.canvas.circle(i,tests[j][0],tests[j][1],6,'#000000');
        console.log(knearest(tests[j][0],tests[j][1],green,red,3));
    }
    
    function dtogrid(x,y,g) {
        x+=g;
        y+=g;
        return [x,y];       
    }
    /**
     * knearest
     * this will loop the x,y of a target to attempt to classify it by its nearest neihbors
     * @param {Number} x of the test
     * @param {Number} y of the test
     * @param {Array}  a target to test
     * @param {Array}  b target to test 
     * @param {Number} the threshold ( number of nearest targets to test )
     * @returns {Array} vote 
     * */
    function knearest(x,y,a,b,th) {
        var results = [],
        t = 0,
        lb = b.length,
        cnow = 0,
        c = 0,
        xy = [0,0],
        l = 0,
        r = [];
        // combine the arrays into one
        a = merge(a,b);

        l = a.length;
        
        console.log(l);
        console.log(lb);
        for(var j=0;j<l;j++) {
            // get the current distance
            cnow=$w.motion.distance_to_point(x,y,a[j][0],a[j][1]);
            // if the current distance to target is less than the clostest target
            if(cnow < c || c == 0) {
                console.log(cnow);
                console.log(j);
                // make cnow the new closest
                c = cnow;
                r.unshift([a[j][0],a[j][1]]);
                if (r.length > th) {
                    r.length--;
                }
                /*
                if (j<(l-lb)) {
                    vote[0]++;
                }else{
                    vote[1]++;
                }
                /*
                t++;
                if (t >= th) {
                    return vote;
                }*/
            }
        }
        l = r.length;
        for(j=0;j<l;j++) {
            console.log(x+','+y+','+r[j][0]+','+r[j][1]);
            $w.canvas.line(0,x,y,r[j][0],r[j][1],'#000000');
        }
        return r;
    }
    function merge(a,b) {
        var al = a.length;
        var bl = al+b.length;
        var j = 0;
        for (i=al;i<bl;i++) {
            a[i] = b[j++];
        }
        return a;
    }
    
}