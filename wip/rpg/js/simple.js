/**
 * Simple
 * simple RPG example
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 * */
var Simple = {
    player:{},
    init:function() {
        $w.loading.load({
            player:'assets/girl.png',
            foreground:'assets/easy.foreground.png',
            shadow:'assets/shadow.png',
            grid:'assets/grid.png',
            table:'assets/table.png',
            dungeon:'assets/dungeon.mp3',
            wine:'assets/wine.png'
        },function(){
            $w.add_object( 
                1,
                Player,
                {
                    t:Simple
                },
                document.getElementById('target'),
                612,
                612
            );
            // method for simlulating depth
            $w.add_object( 
                1,
                LayerHack,
                {},
                document.getElementById('target'),
                612,
                612
            );
            // testing adding a table
            $w.add_object( 
                1,
                Table,
                {
                    t:Simple,
                    x:250,
                    y:250
                },
                document.getElementById('target'),
                612,
                612
            );
            // testing adding a table
            $w.add_object( 
                1,
                Wine,
                {
                    t:Simple,
                    x:300,
                    y:240
                },
                document.getElementById('target'),
                612,
                612
            );
            // this overlays a grid for debugging
            /*
            $w.add_object( 
                1,
                GridHack,
                {},
                document.getElementById('target'),
                612,
                612
            );*/
            
            // @todo needs a $w method for audio for browser compatability
            $w.assets.audio.dungeon.loop = true;
            $w.assets.audio.dungeon.play();
            //console.log($w);
            $w.loop(true);
        });
    },
    event: function(e,p) {
        
        for(k in e) {
            if(e.hasOwnProperty(k)) {
                this[k](e[k],p);
            }
        }
    },
    door: function(d,p) {
        $w.bdraw = false;
        document.getElementsByTagName('canvas')[1].addClass('hidden');
        switch(d) {
            case 'bottom':
                p.y = 60;
                Map.door(document.getElementById('bg'),'up');
                break;
            case 'top':
                p.y = 550;
                Map.door(document.getElementById('bg'),'down');
                break;
            case 'left':
                p.x = 500;
                Map.door(document.getElementById('bg'),'right');
                break;
            case 'right':
                p.x = 60;
                Map.door(document.getElementById('bg'),'left');
                break;
        }
        setTimeout(function(){
            $w.bdraw = true;
            document.getElementsByTagName('canvas')[1].removeClass('hidden');
        },1000);
    },
    item: function(i,callback) {
        for (k in i) {
            
            // display message // i[k].message
            $w.objects.Player[0].items.push(k).toString();
            i[k].target.bdraw = false;
            i[k].target.remove();
        }
        if (typeof callback === 'undefined') callback();
    },
    // @param {Number}
    gridsize:50,
    
    // @param {Array} {Array} {Object}
    //          is this grid a wall ?
    //          does it have an event associated with it?
    
    /**
     * [f][f][f][t][t][f][f][t][t][f][f][f]
     * [f][f][f][t][t][f][f][t][t][f][f][f]
     * [f][f][f][t][f][f][f][f][t][f][f][f]
     * [f][f][f][t][f][f][f][f][t][f][f][f]
     * [t][t][t][t][f][f][f][f][t][ft[t][t]
     * [t][f][f][f][f][f][f][f][f][f][f][t]
     * [f][f][f][f][f][f][f][f][f][f][f][f]
     * [f][f][f][f][f][f][f][f][f][f][f][f]
     * [t][t][t][t][f][f][f][f][t][t][t][t]
     * [f][f][f][t][f][f][f][f][t][f][f][f]
     * [f][f][f][t][f][f][f][f][t][f][f][f]
     * [f][f][f][t][t][f][f][t][t][f][f][f]
     * [f][f][f][t][t][f][f][t][t][f][f][f]
     * */
    map: [
            [
            [{
                wall:false   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false,
                // this grid has an event associated with it
                // when the player steps on this grid section it will pass through a door
                cevent:{door:'top'}
            }],
            [{
                wall:false,
                // this grid has an event associated with it
                // when the player steps on this grid section it will pass through a door
                cevent:{door:'top'}
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }]
        ],
        // 1
        [
            [{
                wall:false   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }]
        ],
        // 2
        [
            [{
                wall:false   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }]
        ],
        // 3
        [
            [{
                wall:true   
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }]
        ],
        // 4
        [
            [{
                wall:true   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }]
        ],
        // 5
        [
            [{
                wall:true   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }]
        ],
        // 6
        [
            [{
                wall:false,
                cevent:{door:'left'}
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false,
                cevent:{door:'right'}
            }]
        ],
        // 7
        [
            [{
                wall:false,
                cevent:{door:'left'}
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false,
                cevent:{door:'right'}
            }]
        ],
        // 8
        [
            [{
                wall:true   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }]
        ],
        // 9
        [
            [{
                wall:true   
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            1[{
                wall:true
            }]
        ],
        // 10
        [
            [{
                wall:false   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }]
        ],
        // 11
        [
            [{
                wall:false   
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false,
                cevent:{door:'bottom'}
            }],
            [{
                wall:false,
                cevent:{door:'bottom'}
            }],
            [{
                wall:true
            }],
            [{
                wall:true
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }],
            [{
                wall:false
            }]
        ]
    ]
}