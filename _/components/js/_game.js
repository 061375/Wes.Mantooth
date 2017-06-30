var Game = {
    add_object: function(r,o,p,$t){
        var ids = [];
        // run a loop to create all the balls
        for(var i=0; i<r; i++){
            // create a canvas context and assign the result to j
            // its true that this loop will result in the same as i
            // but it demonstrates that the funcxtion returns the ID of the canavas object
            var j = $w.canvas.init($t);
            p.i = j;
    
            // instaniate a new ball
            if (typeof $w.objects[o.name] === 'object') {

                 $w.objects[o.name][j] = new o(p);
            }else{
                $w.objects[o.name] = [];
                $w.objects[o.name][j] = new o(p);
            }
            ids.push(j);
        }
        return ids;
    }
}