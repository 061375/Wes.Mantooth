/**
 * Math
 * @author Jeremy Heminger <j.heminger@061375.com>
 * */

/**
 * Extend Math prototype
 * */
$w.math = {
  radians: function(degrees) {
    return degrees * Math.PI / 180;
  },
  // Converts from radians to degrees.
  degrees: function(radians) {
    return radians * 180 / Math.PI;
  },
  //
  sqr: function(number) {
    return number * number;
  },
  dist: function(x1,y1,x2,y2) {
    return Math.hypot(x2-x1, y2-y1);
  },
  frandom: function(n) { 
    return ~~(Math.random() * n);
  },
  isFloat: function(n) {
    return n === +n && n !== (n|0);  
  },
  isInt: function(n) {
    return n === +n && n === (n|0);
  }
}
window.countFPS = (function () {
  var lastLoop = (new Date()).getMilliseconds();
  var count = 1;
  var fps = 0;

  return function () {
    var currentLoop = (new Date()).getMilliseconds();
    if (lastLoop > currentLoop) {
      fps = count;
      count = 1;
    } else {
      count += 1;
    }
    lastLoop = currentLoop;
    return fps;
  };
}());
