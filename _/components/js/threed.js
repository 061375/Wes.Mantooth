/**
 * 3D Object
 * */
$w.threed = {
    makeA3DPoint: function(x,y,z){
        var point = new Object();
        point.x = x;
        point.y = y;
        point.z = z;
      return point;
    },
    convertPointIn3DToPointIn2D: function(pointIn3D,focalLength){
        var pointIn2D = new Object();
        var scaleRatio = focalLength/(focalLength + pointIn3D.z);
        pointIn2D.x = pointIn3D.x * scaleRatio;
        pointIn2D.y = pointIn3D.y * scaleRatio;
      return pointIn2D;
    },
    cP3dto2d: function(pointIn3D,camera,origin){
        var pointIn2D = [];
        
        var angle,radius,cr = $w.math.radians(camera.d);
        pointIn3D.x -= camera.x;
        pointIn3D.z -= camera.y;
        angle = Math.atan2(pointIn3D.z,pointIn3D.x);
        radius = Math.sqrt(pointIn3D.x*pointIn3D.x + pointIn3D.z*pointIn3D.z) * 4;
        pointIn3D.x = Math.cos(angle+cr) * radius + 500;
        var scaleRatio = camera.fov/(camera.fov + (pointIn3D.z*2));
        //console.log(scaleRatio);
        pointIn2D[0] = (pointIn3D.x * scaleRatio) ;
        pointIn2D[1] = (pointIn3D.y * scaleRatio);
        
      return pointIn2D; 
    }
};