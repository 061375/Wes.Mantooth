var Game = {
    add_object: function(r,o,p,$t){
        var ids = [];
        // run a loop to create all the balls
        for(var i=0; i<r; i++){
            // create a canvas context and assign the result to j
            // its true that this loop will result in the same as i
            // but it demonstrates that the funcxtion returns the ID of the canavas object
            var j = $w.canvas.init($t);
            // instaniate a new ball
            this.objects[o] = new o(j,p);
            ids.push(j);
        }
        return ids;
    }
}