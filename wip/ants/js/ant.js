/**
* Ant
* @param {Object}
* @returns {Void}
* */
var Ant = function(o) {
    
    this.i = o.i;
    
    this.radius = 3;
    
    this.type = o.type;
    
    this.colliding = false;
    
    this.hunger = 100;
    
    this.health = 100;
    
    this.afraid = false;
    
    this.nearest = null;
    
    this.otherants = [];
    
    switch(o.type) {
        case 'Queen':
            AntSim.count.queen++;
            this.color = '#1d00ff';
            this.radius = 5;
            break;
        case 'Male':
            AntSim.count.male++;
            this.color = '0bd000';
            break;
        case 'Soldier':
            AntSim.count.soldier++;
            this.color = '#ff0101';
            break;
        case 'Gatherer':
            AntSim.count.gatherer++;
            this.color = '#fff000';
            break;
    }
    var xy = AntSim.place();
    this.x = xy.x;
    this.y = xy.y;
}

//

/**
 * loop
 * @returns {Void}
 * */
Ant.prototype.loop = function() {
    
    this.nearest = $w.collision.objectNearest(this.x,this.y);
    
    // check for collision
    if (this.checkCollision(this.nearest)) {
        switch(this.colliding.other) {
            case 'Food':
                this.hunger+=50;
                this.colliding.o.destroy();
                this.colliding = false;
                break;
            case 'Predator':
                this.health -= this.colliding.o.damagelevel;
                this.afraid = {
                    x:this.colliding.o.x,
                    y:this.colliding.o.y
                }
                break;
            case 'Ant':
                if (typeof this.otherants[this.colliding.id] === 'undefined') {
                    this.otherants[this.colliding.id] = {
                        timesmet:1
                    }
                }else{
                    this.otherants[this.colliding.id].timesmet++;
                }
                break;
        }  
    }else{
        // do what you do
        switch(this.type) {
            case 'Queen':
                
                break;
            case 'Male':
                
                break;
            case 'Soldier':
                // if hungry look for food
                break;
            case 'Gatherer':
                // if hungry look for food
                break;
        }
    }
    
    if (this.health <= 0) {
        this.die();
    }
    $w.canvas.clear(this.i);
    $w.canvas.circle(this.i,this.x,this.y,this.radius,this.color);  
}

// actions common for all ants *****************

Ant.prototype.walk = function() {
    
}
Ant.prototype.die = function() {
    
}
Ant.prototype.eat = function() {
    
}
/**
 * @param {Object}
 * @param {String}
 * @param {Number}
 * */
Ant.prototype.checkCollision = function(o,type,radius) {
    // init
    if (typeof type === 'undefined') {
        type = 'damage';
    }
    if (typeof radius === 'undefined') {
        radius = o.radius;
    }
    // check if the collision occured
    if($w.collision.checkCircle(o.x,o.y,radius,this.x,this.y,this.radius)) {
        // true then ad a reference
        this.colliding = {
            type:type,
            other:prop, // string name of other object
            o:o // reference to other object
        }
        return true;
    }
    // false then clear the reference
    this.colliding = false;
    return false;
}
Ant.prototype.runAway = function(){
    
}

// ant types ************************************

// Queen      ***
Ant.prototype.Queen = function() {
       
}
Ant.prototype.Queen.layEgg = function() {
    
}
// end Queen  ***


// ------


// Soldier    ***
Ant.prototype.Soldier = function() {
   
}
Ant.prototype.Attack = function() {
   
}
// end Soldier ***


// ------


// Gather      ***
Ant.prototype.Gatherer = function() {
   
}
// end Gather  ***


// ------


// Male        *** 
Ant.prototype.Male = function() {
   
}
// end Male    ***

// --------------------- ****
