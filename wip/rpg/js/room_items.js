var Table = function(t) {
    this.i = t.i;
    this.x = t.x;
    this.y = t.y;
    
    // setup the collision in the map
    // this table will never move
    // so this will be simpler for collisions
    map = t.t.map;
    var g = [Math.ceil(this.y/50),Math.ceil(this.x/50)];
    map[g[0]][g[1]][0].wall = true;
    map[g[0]][g[1]+1][0].wall = true;
    
    // add a message when the player touches the table
    
    this.sprite = {
        x:0,
        y:0,
        w:100,
        h:40,
        img:$w.assets.img.table
    }
    this.shadow = {
        x:0,
        y:0,
        w:100,
        h:23,
        img:$w.assets.img.shadow
    }
}
Table.prototype.loop = function() {
    if($w.bdraw){
        this.draw();
    }else{
        $w.canvas.clear(this.i);
    }
}
Table.prototype.draw = function() {
    // draw shadow
    if(!$w.canvas.image(this.i,{
        img:this.shadow.img,
        sWidth:false,
        dx:this.x,
        dy:this.y+(this.sprite.h-(this.shadow.h/1.5)),
        dWidth:this.shadow.w,
        dHeight:this.shadow.h})){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
    // draw the animation frame
    if(!$w.canvas.image(this.i,{
        img:this.sprite.img,
        sWidth:false,
        dx:this.x,
        dy:this.y,
        dWidth:this.sprite.w,
        dHeight:this.sprite.h},true,false)){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
}

// -----------------------------------------

var Wine = function(t) {
    this.bdraw = true;
    this.i = t.i;
    this.x = t.x;
    this.y = t.y;
    var item = 'wine', message = "You drink the potion and immediately feel refreshed\nYour health is restored";
    // setup the collision in the map
    // this table will never move
    // so this will be simpler for collisions
    map = t.t.map;
    var g = [Math.ceil(this.y/50),Math.ceil(this.x/50)];
    map[g[0]][g[1]][0].cevent = {item:item,message:message};
    map[g[0]][g[1]+1][0].cevent = {item:item,message:message};
    this.sprite = {
        x:0,
        y:0,
        w:10,
        h:20,
        img:$w.assets.img.wine
    }
}
Wine.prototype.loop = function() {
    if($w.bdraw && this.bdraw){
        this.draw();
    }else{
        $w.canvas.clear(this.i);
    }
}
Wine.prototype.draw = function() {
    // draw the animation frame
    if(!$w.canvas.image(this.i,{
        img:this.sprite.img,
        sWidth:false,
        dx:this.x,
        dy:this.y,
        dWidth:this.sprite.w,
        dHeight:this.sprite.h},true,false)){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
}