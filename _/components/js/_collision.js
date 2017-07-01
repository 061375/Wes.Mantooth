var Collision = {
    checkCollision: function(obj1,obj2)
    {
        
        var pointsX = new Array(
          obj1.x-obj1.negXcollisionBox,
          obj1.x+obj1.posXcollisionBox
        );
        var pointsY = new Array(
          obj1.y-obj1.negYcollisionBox,
          obj1.y+obj1.posYcollisionBox
        );
        for(var xx=0; xx<2; xx++){
          for(var yy=0; yy<2; yy++){
            if(pointsX[xx] > obj2.x-obj2.negXcollisionBox && pointsX[xx] < obj2.x+obj2.posXcollisionBox && pointsY[yy] > obj2.y-obj2.negYcollisionBox && pointsY[yy] < obj2.y + obj2.posYcollisionBox){
              return true;
            }
          }
        }
        return false;
    },
    checkCollisionCoords: function(x1,y1,x2,y2,bsize)
    {
        //10,10,11,30,10
        /*
        10 > 1 = true
        10 < 21 = true
        10 > 20 = false
        10 < 40 = true
        */
        var pointsX = new Array(
          x1-bsize,
          x1+bsize
        );
        var pointsY = new Array(
          y2-bsize,
          y2+bsize
        );
        if(x1 > (x2-bsize) && x1 < (x2+bsize) && y1 > (y2-bsize) && y1 < (y2 + bsize))
        {
          return true;
        }
        return false;
    },
    square: function(x1,y1,s1,x2,y2,s2) {
        var c = [
            {x:x1,y:y1},
            {x:(x1+x2),y:y1},
            {x:x2,y:(y1+y2)},
            {x:(x1+x2),y:(y1+y2)}
        ];
        
    },
    circle: function(p,c) {
        var b = false;
        var l = p.length;
        for(var i=0;i<l;i++) {
            var d = $w.motion.distance_to_point(p[i][0],p[i][1],c.x,c.y);
            if ((d - c.radius) < 0)return true;
        }
        return false;
    },
    checkCircle: function(x1,y1,r1,x2,y2,r2) {
        var d = $w.motion.distance_to_point(x1,y1,x2,y2);
        var s = r1 + r2;
        if ((d - s) > 0) {
            return true;
        }else{
            return false;
        }
    },
    insideCanvas: function(x1,y1) {
         var w = $w.canvas.get(0,'canvas').width;
         var h = $w.canvas.get(0,'canvas').height;

         if (x1 < 0) return 1;
         if (x1 > w) return 3;
         if (y1 > h) return 4;
         if (y1 < 0) return 2;
         
         return 0;
    },
    inside: function (point, vs) {
      // ray-casting algorithm based on
      // http://www.ecse.rpi.edu/Homepages/wrf/Research/Short_Notes/pnpoly.html
  
      var x = point[0], y = point[1];
  
      var inside = false;
      for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
          var xi = vs[i][0], yi = vs[i][1];
          var xj = vs[j][0], yj = vs[j][1];
  
          var intersect = ((yi > y) != (yj > y))
              && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
          if (intersect) inside = !inside;
      }
  
      return inside;
    }
}