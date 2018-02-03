/**
 * 3D Object
 * */
$w.threed = {
    makeA3DPoint: function(x,y,z){
        var point = {
            x:x,
            y:y,
            z:z
        }
        return point;
    },
    make2DPoint: function(x, y, depth, scaleRatio){
        var point = {
            x:x,
            y:y,
            depth:depth,
            scaleRatio:scaleRatio
        }
        return point;
    },
    Transform3DPointsTo2DPoints: function(points, axisRotations, focalLength, zOrigin){
        
        if (undefined === zOrigin) zOrigin = 1;
        
        // the array to hold transformed 2D points - the 3D points
        // from the point array which are here rotated and scaled
        // to generate a point as it would appear on the screen
        var TransformedPointsArray = [];
        // Math calcs for angles - sin and cos for each (trig)
        // this will be the only time sin or cos is used for the
        // entire portion of calculating all rotations
        var sx = Math.sin(axisRotations.x);
        var cx = Math.cos(axisRotations.x);
        var sy = Math.sin(axisRotations.y);
        var cy = Math.cos(axisRotations.y);
        var sz = Math.sin(axisRotations.z) * zOrigin;
        var cz = Math.cos(axisRotations.z) * zOrigin;
        
        // a couple of letiables to be used in the looping
        // of all the points in the transform process
        var x,y,z, xy,xz, yx,yz, zx,zy, scaleFactor;
    
        // 3... 2... 1... loop!
        // loop through all the points in your object/scene/space
        // whatever - those points passed - so each is transformed
        var i = points.length;
        while (i--){
            // apply Math to making transformations
            // based on rotations
            
            // assign letiables for the current x, y and z
            var x = points[i].x;
            var y = points[i].y;
            var z = points[i].z;
    
            // perform the rotations around each axis
            // rotation around x
            var xy = cx*y - sx*z;
            var xz = sx*y + cx*z;
            // rotation around y
            var yz = cy*xz - sy*x;
            var yx = sy*xz + cy*x;
            // rotation around z
            var zx = cz*yx - sz*xy;
            var zy = sz*yx + cz*xy;
            
            // now determine perspective scaling factor
            // yz was the last calculated z value so its the
            // final value for z depth
            var scaleRatio = focalLength/(focalLength + yz);
            // assign the new x, y and z (the last z calculated)
            x = zx*scaleRatio;
            y = zy*scaleRatio;
            z = yz;
            // create transformed 2D point with the calculated values
            // adding it to the array holding all 2D points
            TransformedPointsArray[i] = this.make2DPoint(x, y, -z, scaleRatio);
        }
        // after looping return the array of points as they
        // exist after the rotation and scaling
        return TransformedPointsArray;
    },
    convertPointIn3DToPointIn2D: function(pointIn3D,focalLength){
        var scaleRatio = focalLength/(focalLength + pointIn3D.z);
        return {
          x:(pointIn3D.x * scaleRatio),
          y:(pointIn3D.y * scaleRatio)
        };
    },
    drawLines: function(ci,screenPoints,facesArray,x,y,color,lineWidth){
        var l = facesArray.length, prev, i = 0, j = 0, fl = 0;
        for (i=0; i<l; i++){
            if (0 == fl) {
                fl = facesArray[0].length;
            }
            for(j=0; j<fl; j++){
                if (j==0) {
                    prev = facesArray[i][j];
                }else{
                    if (undefined !== screenPoints[prev] && undefined !== screenPoints[facesArray[i][j]]) {
                        $w.canvas.line(ci,
                                       screenPoints[prev].x+x,
                                       screenPoints[prev].y+y,
                                       screenPoints[facesArray[i][j]].x+x,
                                       screenPoints[facesArray[i][j]].y+y,color,lineWidth);
                    }
                    prev = facesArray[i][j];
                }
            }
        }
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