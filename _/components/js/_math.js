/**
 * Math
 * @author Jeremy Heminger <j.heminger@061375.com>
 * */

/**
 * Extend Math prototype
 * */
Math.radians = function(degrees) {
  return degrees * Math.PI / 180;
};
// Converts from radians to degrees.
Math.degrees = function(radians) {
  return radians * 180 / Math.PI;
};
//
Math.sqr = function(number) {
  return number * number;
}
Math.dist = function(x1,y1,x2,y2) {
  return Math.hypot(x2-x1, y2-y1);
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