window.onload = function() {
    'use strict';
    
    // initialize 
    var i = $w.canvas.init(document.getElementById('target'),1000,1000), r;
    
    // get the canvas object
    $w.draw.grid(i,1000,1000,10);
    
    // create our sample data
    var green = [
        [-433,-400],
        [-200,-133],
        [10,-60],
        [-100,10],
        [-200,-200]
    ];
    var blue = [
        [100,200],
        [322,233],
        [127,88],
        [357,276],
        [430,227]
    ];
    for(var j=0; j<green.length; j++) {
        
        green[j] = dtogrid(green[j][0],green[j][1],500);
        $w.canvas.circle(i,green[j][0],green[j][1],3,'#008040');
        //console.log('{'+green[j][0]+','+green[j][1]+'}');
        $w.canvas.text(i,green[j][0],green[j][1]-5,'{'+(green[j][0]-500)+','+(green[j][1]-500)+'}');
    }
    for(var j=0; j<blue.length; j++) {
        blue[j] = dtogrid(blue[j][0],blue[j][1],500);
        $w.canvas.circle(i,blue[j][0],blue[j][1],3,'#0013ff');
        $w.canvas.text(i,blue[j][0],blue[j][1]-5,'{'+(blue[j][0]-500)+','+(blue[j][1]-500)+'}');
    }
    
    // build some random test
    
    var tests = [], l = 5, j = 0;
    for(j;j<l;j++) {
        tests[j] = [];
        tests[j][0] = $w.math.frandom(1000) - 1000; // random x
        tests[j][1] = $w.math.frandom(1000) - 1000; // random y
        
        tests[j] = dtogrid(tests[j][0],tests[j][1],500);
    }
   
    // I want to setup a basic test with repeatable results to start
    /*
    var tests = [
        [-20,-30]
    ];
    */
    var ll = tests.length;
   
    for (var jj=0;jj<ll;jj++) {
        tests[jj] = dtogrid(tests[jj][0],tests[jj][1],500);
        r = knearest(tests[jj][0],tests[jj][1],green,blue,3);
        drawnearest(i,tests[jj][0],tests[jj][1],r);
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
        ro = {},
        re = [];
        // combine the arrays into one
        a = merge(a,b);

        l = a.length;
        for(var h=0;h<l;h++) {
            // get the current distance
            cnow=$w.motion.distance_to_point(x,y,a[h][0],a[h][1]);
            // if the current distance to target is less than the closest target
            
            if (h<(l-lb)) {
                a[h][2] = 0; // 
            }else{
                a[h][2] = 1; // 
            }
            ro[Math.floor(cnow)] = a[h];
        }
        c = 0;
        for(var h in ro) {
            if (c>=th) continue;
            c++;
            re.push(ro[h]);
        }
        
        return re;
    }
    function drawnearest(i,x,y,r) {
        var green = 0, blue = 0
        l = r.length;
        console.log(l);
        for(j=0;j<l;j++) {
            if (r[j][2] == 0) {
                green++;
            }else{
                blue++;
            }
            $w.canvas.line(i,r[j][0],r[j][1],x,y,'#000000');
        }
        var color;
        if (green > blue) {
            color = '#008040';
        }else{
            color = '#0013ff';
        }
        $w.canvas.circle(i,tests[jj][0],tests[jj][1],6,color);
    }
    function merge(a,b) {
        var al = a.length;
        var bl = al+b.length;
        var hh=0,jj = 0;
        for (hh=al;hh<bl;hh++) {
            a[hh] = b[jj++];
        }
        return a;
    }
    
}