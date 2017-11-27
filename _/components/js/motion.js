/**
 * Motion
 * some game motion operations
 * */
$w.motion = {
  /**
   * @param {Number}
   * @param {Number}
   * @param {Number}
   * @param {Number}
   *
   * @returns {Number}
   * */
  distance_to_point: function(x1,y1,x2,y2)
  {
    return Math.hypot(x2-x1, y2-y1);
  },
  /**
   * @param {Number}
   * @param {Number}
   * @param {Number}
   * @param {Number}
   * @param {Boolean}
   *
   * @returns {Number}
   * */
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
  /**
   * @param {Number}
   * @param {Number}
   * @param {Number}
   * @param {Number}
   *
   * @returns {Array}
   * */
  motion_set: function(x,y,d,speed)
  {
    // assumes that degrees are integer
    if (!$w.math.isFloat(d)) {
      // if degrees convert to radians
      d = $w.math.radians(d);
    }
    x += (Math.cos(angle) * Math.PI / 180) * speed;
    y += (Math.sin(angle) * Math.PI / 180) * speed;

    return [x,y];
  },
  //  DEPRECATED ... DO NOT USE
  /*
  motion_set_2: function(obj,speed)
  {
    var x = obj.position.x;
    var y = obj.position.y;
    var angle = obj.rotation.z;
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
  */
}
$w.mouse = {
    mouseX:0,
    mouseY:0,
    trackMouse: function($target,callback,o) {
        $target.addEventListener("mousemove", function(e) {
            this.mouseX = e.clientX;
            this.mouseY = e.clientY;
            if(typeof callback === 'function')callback({x:e.clientX,y:e.clientY},o);
        });
    },
    remove: function($target) {
      $target.removeEventListener("mouseup",this,false);
    }
}