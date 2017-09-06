$w.gui = (function() {
    
    "use strict";
    
    var dialog = function(d,m,s) {
        var j = $w.add_object( 
            1,
            wesDialog,
            {
                style:s,
                m:m
            },
            document.getElementById('target'),
            d.cw,
            d.ch
        );
        $w.objects.wesDialog[j[0]].run(j[0]);
    }
    
    return {
        dialog:dialog
    }
})();

var wesDialog = function(o) {
    this.run = function(i) {
        $w.canvas.rectangle(
            i,
            o.style.box.x,
            o.style.box.y,
            o.style.box.w,
            o.style.box.h,
            o.style.box.color,
            o.style.box.method,
            o.style.box.acolor,
            o.style.box.opacity
        );
        $w.canvas.text(
            i,
            (o.style.text.x+o.style.text.p),
            (o.style.text.y+o.style.text.p),
            o.m,
            o.style.text.method,
            o.style.text.font,
            o.style.text.color
        );
        $w.buttons.pill(i,(o.style.box.x+(o.style.box.w/2)-75),(o.style.box.y+o.style.box.h)-60,150,30,15,{
            button:{
                color:'#ff0000',
                fill:'fill',
                acolor:'#000000',
                opacity:1,
                hcolor:'#ff0000'
            },
            text:{
                color:'#ffffff',
                font:'20px Arial',
                padding:23
            }
        },'Close',{
            hover: function(){
                $w.log('hover');  
            },
            click: function(){
                console.log('clicked');
                $w.remove_object('wesDialog',i);    
            }
        });
    }
}
wesDialog.prototype.loop = function() {
    
}