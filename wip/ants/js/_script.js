/**
 * AntSim
 * simple RPG example
 * @author Jeremy Heminger <j.heminger13@gmail.com>
 * */
var AntSim = {
    count:{
        queen:0,
        male:0,
        soldier:0,
        gatherer:0
    },
    map:[],
    init:function(map) {
        AntSim.map = map;
        $w.makeFPS();
        //$w.loading.load({
            //ant:'assets/ant.png',
        //},function(){
            $w.add_object(
                1,
                AntSim.Map,{
                },
                document.getElementById('target'),
                W,H,false
            );
            
            // initialize Ants
            
            var i = $w.add_object_single(
                QUEENMAX,
                Ant,{
                    type:'Queen'
                },
                document.getElementById('target'),
                W,H
            );
            
            $w.add_object_single(
                MALEMAX,
                Ant,{
                    type:'Male'
                },
                i
            );
            $w.add_object_single(
                SOLDIERMAX,
                Ant,{
                    type:'Soldier'
                },
                i
            );
            $w.add_object_single(
                GATHERERMAX,
                Ant,{
                    type:'Gatherer'
                },
                i
            );
            
            $w.add_object_single(
                EGGMAX,
                Egg,{
                    queen:{
                        x:$w.objects.Ant[1].x,
                        y:$w.objects.Ant[1].y
                    }
                },
                i
            );
            /*
            $w.add_object_single(
                MAXFOOD,
                Food,{
                    
                },
                $l
            );*/
            $w.loop(true,i,true);
            console.log($w.objects);
        //});
    },
    /**
    * place ants in random position as long as not in collision with wall
    * @todo:
    * - ants should not be in collision with self
    * - some ants should be in proximety to queen
    * @returns {Void}
    * */
    place: function(x,y,w,h) {
        var collision = true;
        while(collision) {
            if (typeof x === 'undefined') {
                this.x = Math.random() * W;
                this.y = Math.random() * H;
            }else{
                this.x = x + Math.random() * w;
                this.y = y + Math.random() * h;
            }
            collision = AntSim.Map.checkCollision(this.x,this.y);
        }
        return {
            x:this.x,
            y:this.y
        }
    }
}