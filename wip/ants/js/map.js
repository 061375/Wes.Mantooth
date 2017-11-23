/**
 * Map
 * @param {Object}
 * @returns {Void}
 * */
AntSim.Map = function(o){
    // draw the world
    // get the map height
    AntSim.Map.yl = MAP.length;
    // get the map width
    AntSim.Map.xl = MAP[0].length;
    // loop the map matrix
    for(var y=0; y<AntSim.Map.yl; y++) {
        for(var x=0; x<AntSim.Map.xl; x++) {
            // if this cell is true 
            if (MAP[y][x] == 1) {
                // scale the position by 10
                var xx = x*10;
                var yy = y*10;
                // draw a rectangle
                $w.canvas.rectangle(o.i,xx,yy,10,10,'#000','fill');
            }
        }
    }
    
}
/**
 * checks the MAP to see if a collision has occured
 * @param {Number}
 * @param {Number}
 * @returns {Boolean}
 * */
AntSim.Map.checkCollision = function(x,y) {

    mx = Math.floor(x / 10);

    my = Math.floor(y / 10);

    if (typeof AntSim.map[my] === 'undefined')
        return true;
    
    if (typeof AntSim.map[my][mx] === 'undefined')
        return true;
    
    if (AntSim.map[my][mx]) {
        return true;
    }else{
        return false;
    }
}