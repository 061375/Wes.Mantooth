/**
 * 3D Object
 * */
var _3D = {
    makeA3DPoint: function(x,y,z){
        var point = new Object();
        point.x = x;
        point.y = y;
        point.z = z;
      return point;
    },
    convertPointIn3DToPointIn2D: function(pointIn3D){
        var pointIn2D = new Object();
        var scaleRatio = focalLength/(focalLength + pointIn3D.z);
        pointIn2D.x = pointIn3D.x * scaleRatio;
        pointIn2D.y = pointIn3D.y * scaleRatio;
      return pointIn2D;
    }
};