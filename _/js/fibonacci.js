/**
 * 
 *
 * */
window.onload = function(){
    //$w.boolLog = false;
    
    $w.canvas.init(document.getElementById("target"),
              (window.innerWidth - 25),
              (window.innerHeight - 25),
    function(i){
        Fibonacci.init(i,function() {
            Fibonacci.loop(Fibonacci.goldenOne,1,i,function(){
                Fibonacci.reset(function(){
                    //Fibonacci.loop(Fibonacci.goldenTwo,1,i);
                    //Fibonacci.goldenTwo(i);
                    Fibonacci.drawF(i,{font:'italic 30px Arial',x:10,y:100});
                });
            });
        });
    }); 
}
/**
 *
 *
 * */
var Fibonacci = (function() {

    "use strict";
    
    //var W = window.innerWidth;
    //var H = window.innerHeight;
    var xO, yO;
    
    var W = 1000;
    var H = 1000;
    
    var L = 10; // a unit of length [ x : y ]
    
    var O = {
        id:null,    // the loop id
        c:0,        // count
        m:13,       // max
        p:0,        // previous
        n:1,        // now
        d:0,        // direction
        t:0,        // track grid in order to draw
        l:[0,0],     // x,y for drawing,
        f:[]        // the sequence to display
    }
    var init = function(i,callback) {
         // set the origin
        O.l[0] = (W / 2);
        O.l[1] = (H / 2);
        xO = O.l[0];
        yO = O.l[1];
        // lets draw a grid to help set things up
        $w.draw.grid(i,W,H,L,'',function(){
            // this allows another function to be called after this operation
            callback();
        });
    }
    var reset = function(callback) {
        O = {
            id:null,    // the loop id
            c:0,        // count
            m:13,       // max
            p:0,        // previous
            n:1,        // now
            d:0,        // direction
            t:0,        // track grid in order to draw
            l:[0,0],     // x,y for drawing,
            f:[]        // the sequence to display
        }
        callback();
    }
    /**
     * @param {Function} f a function
     * @param {Number} t seconds
     * @param {Object} parameters
     * @return {Void}
     * */
    var loop = function(f,t,p,callback) {
        if(typeof f === 'function'){
            O.id = setInterval(function() {
                    f(p);
                    O.c++;
                    if (O.c >= O.m) {
                        clearInterval(O.id);
                        // display the sequence
                        $w.log(O.f);
                        if (typeof callback === 'function') callback();
                    }
            },t);
        }
    }
    /**
     * @param {Number}
     * @param {Number}
     * @returns {Number}
     * */
    var theF = function(p,n) {
        // 0,1,1,2,3,5,8,13 ...
        O.p = O.n; // new previous becomes current next
        O.n = p + n; // new next = (old previous + old next)
        O.f.push(n);
        return n;
    }
    /**
     * Draw Fibonacci Numbers
     * @param {Number} reference the canvas level we are drawing on
     * @param {Object} style parameters
     * @returns {Void}
     * */
    var drawF = function(i,s) {
        var F = '';
        for(var j=0; j<O.m; j++) {
            var p = O.p;
            var n = O.n;
            // add to the sequence
            n = theF(p,n);
            F += n+",";
        }
        F = F.substring(0,F.length-1);
        F += '...';
        $w.canvas.text(i,s.x,s.y,F,'stroke',s.font);
    }
    /**
     * the golden ratio (basic)
     * @param {Number} reference the canvas level we are drawing on
     * @param {Function} callback
     * @returns {Void}
     * */
    var goldenOne = function(i,callback) {
        var c = '#F00';
        var x = O.l[0];
        var y = O.l[1];
        var p = O.p;
        var n = O.n;
        var c2 = $w.color.rgbToHex(Math.floor(Math.random() * 255),Math.floor(Math.random() * 255),Math.floor(Math.random() * 255));
        if (n == 0) {
            $w.canvas.rectangle(i,x,y,(1*L),(1*L),c,'*',c2,0.5);
        }else{
            $w.canvas.rectangle(i,x,y,(n*L),(n*L),c,'*',c2,0.5);
        }
        
        // add to the sequence
        n = theF(p,n);
        
        
        switch(O.d) {
            case 0:
                x-=(L*O.p);
                break;
            case 1:
                y+=(L*O.p);
                break;
            case 2:
                x+=(L*O.p);
                switch(O.t) {
                    case 6:
                        y-=(L*8);
                        break;
                    case 10:
                        y-=(L*55);
                        break;
                    default:
                        y-=L;
                }
                break;
            case 3:
                y-=(L*O.n);
                switch(O.t) {
                    case 7:
                        x-=(L*13);
                        break;
                    case 11:
                        x-=(L*118); // disproves my conjecture that these are all fibonacci numbers
                        break;
                    default:
                        x-=(L*2);
                }
                break;
            default:
                O.d = 0;
                x-=(L*O.n);
        }

        O.d++;
        O.l[0] = x;
        O.l[1] = y;
        O.t++;
        
        if (typeof callback === 'function') {
            callback(i);
        }
    }
    /**
     * the golden ratio (with arc)
     * */
    var goldenTwo = function(i,callback) {
        console.log('g2');
        var c = '#F00';
        var x = O.l[0];
        var y = O.l[1];
        var p = O.p;
        var n = O.n;
       
        
        
        var degrees = 180;
        var radius = 0.1;
        var nn = 1;
        var nnn = 0.15;
        var id = setInterval(function(){
            var p = O.p;
            var n = O.n;
            switch(degrees) {
                case 0:
                case 90:
                case 180:
                case 270:
                    // add to the sequence
                    n = theF(p,n);
                    //nn = nn * 2;
                    //nn+=n+(n+2)
                    //console.log(nn);
            }
            // lets do the trig
            var angle = degrees * (Math.PI/180);
            var xpos = radius * Math.cos(angle);
            var ypos = radius * Math.sin(angle);
            radius+=(n/nn);
            nn+=nnn;
            nnn+=0.001; 
            degrees-=1;
            if( degrees >= 360 ) degrees-=360;
            if( degrees < 0 ) degrees+=360;
            
            $w.canvas.circle(i,xpos+(W / 2),ypos+(H / 2),1);
            
            //if((xpos+(W / 2)) > W) {
            if (n > 1200000) {

                console.log('DONE');
                clearInterval(id);
            }
        },10);
        if (typeof callback === 'function') {
            callback(i);
        }
    }
    return {
        init: init,
        loop: loop,
        drawF: drawF,
        goldenOne: goldenOne,
        goldenTwo: goldenTwo,
        reset:reset
    };   
}());