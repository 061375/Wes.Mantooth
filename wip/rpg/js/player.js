var Player = function(t) {

    this.t = t.t;
    
    this.map = t.t.map;
    
    this.i = t.i;
    
    this.bg = document.getElementById('bg');
    
    this.x = 300;
    this.y = 300;
    
    this.bdraw = true;
    
    this.sprite = {
        speed:30,
        maxXframes:3,
        maxYframes:4,
        frameX:1,
        frameY:0,
        frameW:80,
        frameH:80,
        frameSize:1,
        img:$w.assets.img.player,
        dir:0,// 0, 1, 2 stopped, left, right
        // we'll assume here that i is the first key
        i:0,
        fps:6,
        cf:0,
        wspeed:0,
        maxspeed:15,
        wdir:0
    }
    // this will also act as the collision box
    this.shadow = {
        x:0,
        y:0,
        w:80,
        h:23,
        img:$w.assets.img.shadow
    }
    
    $w.game.bindkeys({
        ArrowUp:Player.prototype.Aup
    },"keydown",document,this);
    $w.game.bindkeys({
        ArrowDown:Player.prototype.Adown
    },"keydown",document,this);
    $w.game.bindkeys({
        ArrowLeft:Player.prototype.Aleft
    },"keydown",document,this);
    $w.game.bindkeys({
        ArrowRight:Player.prototype.Aright
    },"keydown",document,this);
    
    $w.game.bindkeys({
        ArrowUp:Player.prototype.KeyUp
    },"keyup",document,this);
    $w.game.bindkeys({
        ArrowDown:Player.prototype.KeyUp
    },"keyup",document,this);
    $w.game.bindkeys({
        ArrowLeft:Player.prototype.KeyUp
    },"keyup",document,this);
    $w.game.bindkeys({
        ArrowRight:Player.prototype.KeyUp
    },"keyup",document,this);

}
Player.prototype.KeyUp = function(e,s) {
    s.sprite.frameX = 1;
    s.sprite.dir = 0;
    s.sprite.wspeed = 0;
}
Player.prototype.Aup = function(e,s) {
    //Map.door(document.getElementById('bg'),'down');
    s.sprite.frameY = 3;
    s.sprite.dir = 1;
    s.sprite.wdir = 2;
    s.sprite.wspeed = s.sprite.maxspeed;
}
Player.prototype.Adown = function(e,s) {
    //Map.door(document.getElementById('bg'),'up');
    s.sprite.frameY = 0;
    s.sprite.dir = 1;
    s.sprite.wdir = 0;
    s.sprite.wspeed = s.sprite.maxspeed;
}
Player.prototype.Aleft = function(e,s) {
    //Map.door(document.getElementById('bg'),'right');
    s.sprite.frameY = 1;
    s.sprite.dir = 1;
    s.sprite.wdir = 1;
    s.sprite.wspeed = s.sprite.maxspeed;
}
Player.prototype.Aright = function(e,s) {
    //Map.door(document.getElementById('bg'),'left');
    s.sprite.frameY = 2;
    s.sprite.dir = 1;
    s.sprite.wdir = 3;
    s.sprite.wspeed = s.sprite.maxspeed;
}
Player.prototype.frame = function(callback) {
    switch (this.sprite.dir) {
        case 1:
            this.sprite.frameX++;
            if (this.sprite.frameX >= this.sprite.maxXframes) {
                this.sprite.frameX = 0;
            }
            break;
        case 2:
            this.sprite.frameX--;
            if (this.sprite.frameX < 0) {
                this.sprite.frameX = this.sprite.maxXframes;
            }
            break;
        default:
            // do nothing
    }
    if(typeof callback === 'function')callback(this);
}
Player.prototype.loop = function() {
    this.sprite.cf++;
    if (this.sprite.cf > this.sprite.fps) {
        //console.log(Math.ceil(this.x/50));
        //console.log(Math.floor(this.y/50));
        var g = [Math.ceil(this.y/50),Math.ceil(this.x/50)];
        switch(this.sprite.wdir) {
            // down
            case 0:
                if (this.map[(g[0])][g[1]][0].wall) {
                    //this.y-=(this.sprite.wspeed*2);
                    /*
                    console.log(g[0]);
                    console.log(g[1]);
                    console.log(this.map[g[0]][g[1]]);*/
                    //this.y-=this.sprite.wspeed;
                }else{
                    if (typeof this.map[(g[0])][g[1]][0].cevent !== 'undefined') {
                        this.t.event(this.map[(g[0])][g[1]][0].cevent,this);
                    }else{
                        this.y+=this.sprite.wspeed;
                    }
                }
                break;
            // left
            case 1:
                //this.x-=this.sprite.wspeed;
                if (this.map[g[0]][(g[1])-1][0].wall) {
                    /*
                    console.log(g[0]);
                    console.log(g[1]);
                    console.log(this.map[g[0]][g[1]]);*/
                    //this.x+=(this.sprite.wspeed*2);
                    //this.x+=this.sprite.wspeed;
                }else{
                    //this.x-=this.sprite.wspeed;
                    if (typeof this.map[(g[0])][g[1]-1][0].cevent !== 'undefined') {
                        this.t.event(this.map[(g[0])][g[1]-1][0].cevent,this);
                    }else{
                        this.x-=this.sprite.wspeed;
                    }
                }
                break;
            //up
            case 2:
                //this.y-=this.sprite.wspeed;
                if (this.map[(g[0])-1][g[1]][0].wall) {
                    /*
                    console.log(g[0]);
                    console.log(g[1]);
                    console.log(this.map[g[0]][g[1]]);*/
                    //this.y+=(this.sprite.wspeed*2);
                    //this.y+=this.sprite.wspeed;
                }else{
                    //this.y-=this.sprite.wspeed;
                    if (typeof this.map[(g[0]-1)][g[1]][0].cevent !== 'undefined') {
                        this.t.event(this.map[(g[0]-1)][g[1]][0].cevent,this);
                    }else{
                        this.y-=this.sprite.wspeed;
                    }
                }
                break;
            //right
            case 3:
                //this.x+=this.sprite.wspeed;
                if (this.map[g[0]][(g[1])][0].wall) {
                    /*
                    console.log(g[0]);
                    console.log(g[1]);
                    console.log(this.map[g[0]][g[1]]);*/
                    //this.x-=(this.sprite.wspeed*2);
                    //this.x-=this.sprite.wspeed;
                }else{
                    //this.x+=this.sprite.wspeed;
                    if (typeof this.map[(g[0])][g[1]][0].cevent !== 'undefined') {
                        this.t.event(this.map[(g[0])][g[1]][0].cevent,this);
                    }else{
                        this.x+=this.sprite.wspeed;
                    }
                }
                break;
        }
        this.sprite.cf = 0;
        this.frame();    
    }
    if(this.bdraw){
        this.draw();
    }else{
        $w.canvas.clear(this.i);
    }
}
Player.prototype.draw = function(callback) {
    // draw shadow
 
    if(!$w.canvas.image(this.i,{
        img:this.shadow.img,
        sWidth:false,
        dx:this.x,
        dy:this.y+(this.sprite.frameH-(this.shadow.h/1.5)),
        dWidth:this.shadow.w,
        dHeight:this.shadow.h})){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
    // draw the animation frame
    if(!$w.canvas.image(this.i,{
        img:this.sprite.img,
        sx:(this.sprite.frameX*this.sprite.frameW)+1,
        sy:(this.sprite.frameY*this.sprite.frameH)+1,
        sWidth:this.sprite.frameW,
        sHeight:this.sprite.frameH,
        dx:this.x,
        dy:this.y,
        dWidth:(this.sprite.frameW*this.sprite.frameSize),
        dHeight:(this.sprite.frameH*this.sprite.frameSize)},true,false)){
        // if an error is returned throw the error
        $w.canvas.has_error();
    }
    if(typeof callback === 'function')callback();
}
