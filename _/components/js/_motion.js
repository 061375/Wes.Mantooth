/**
 * Motion
 * some game motion operations
 * */
var Motion = {
  distance_to_point: function(x1,y1,x2,y2)
  {
    return Math.hypot(x2-x1, y2-y1);
  },
  point_direction: function(x1,y1,x2,y2,radians)
  {
    var x = x2 - x1;
    var y = y2 - y1;
    var angleInRadians = Math.atan2(y,x);
    var angleInDegrees = angleInRadians * (180/ Math.PI);
    if(angleInDegrees < 0){
      angleInDegrees+=360;
    }
    if(radians){
      return angleInRadians;
    }
    return angleInDegrees;
  },
  motion_set: function(x,y,r,speed)
  {
    var angle = r * (Math.PI/180);
    x += (Math.cos(angle) * Math.PI / 180) * speed;
    y += (Math.sin(angle) * Math.PI / 180) * speed;

    return [x,y];
  },
  motion_set_2: function(obj,speed)
  {
    var x = obj.position.x;
    var y = obj.position.y;
    var angle = obj.rotation.z;// * (Math.PI/180);
    x += (Math.cos(angle) * Math.PI / 180) * speed;
    y += (Math.sin(angle) * Math.PI / 180) * speed;
    obj.position.x = x;
    obj.position.y = y;
    return obj;
  },
  move_to_contact: function(x,y,z,degrees,speed)
  {
    var obj = new Object();
    var angle = degrees * (Math.PI/180);
    x += (Math.cos(angle) * Math.PI / 180) * speed;
    y += (Math.sin(angle) * Math.PI / 180) * speed;
    z += (Math.sin(angle) * Math.PI / 180) * speed;
    obj.x = x;
    obj.y = y;
    obj.z = z;
    return obj;
  },
  move_to_contact_2: function(obj1,obj2)
  {
    var c_direction = this.point_direction(obj1.x,obj1.y,obj2.x,obj2.y);
    c_direction+=180;
    var speed = 15;
    if(obj1.speed > 1){
      speed = obj1.speed;
    }else{
      if(obj2.speed > 1){
        speed = obj2.speed;
      }
    }
    while(true == this.checkCollision(obj1,obj2)){
      var angle = c_direction * (Math.PI/180);
      obj1.x += (Math.cos(angle) * Math.PI / 180) * obj1.speed;
      obj1.y += (Math.sin(angle) * Math.PI / 180) * obj1.speed;
    }
  }
}

var Mouse = {
    mouseX:0,
    mouseY:0,
    trackMouse: function($target,callback) {
        $target.addEventListener("mousemove", function(e) {
            this.mouseX = e.clientX;
            this.mouseY = e.clientY;
            callback({x:e.clientX,y:e.clientY});
        });
    }
}