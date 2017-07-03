var Buttons = (function() {
    
    "use strict";
    var hovering = false;
    function pill(i,x,y,w,h,radius,style,text,events) {
        var r_x = x;
        var r_y = y;
        var t_x = x;
        var t_y = y;
        if (typeof style.text.padding !== 'undefined') {
            t_x+=style.text.padding;
            t_y+=style.text.padding;
        }
        $w.canvas.roundRectangle(i,x,y,w,h,radius,
                                   style.button.color,
                                   style.button.fill,
                                   style.button.acolor,
                                   style.button.opacity);
        $w.canvas.text(i,t_x,t_y,text,style.text.fill,style.text.font,style.text.color);
        if (typeof events !== 'undefined') {
            $w.mouse.trackMouse(document,function(e){
                if (typeof events.hover === 'function') {
                    if (e.x > x && e.x < (x+w) && e.y > y && e.y < (y+h)) {
                        $w.canvas.roundRectangle(i,x,y,w,h,radius,
                                   style.button.hcolor,
                                   style.button.fill,
                                   style.button.acolor,
                                   style.button.opacity);
                        var color = style.text.color;
                        if (typeof style.text.hcolor !== 'undefined') {
                            color = style.text.hcolor;
                        }
                        $w.canvas.text(i,t_x,t_y,text,style.text.fill,style.text.font,color);
                        if(!hovering){hovering=true;events.hover();}
                    }else{
                        $w.canvas.roundRectangle(i,x,y,w,h,radius,
                                   style.button.color,
                                   style.button.fill,
                                   style.button.acolor,
                                   style.button.opacity);
                        $w.canvas.text(i,t_x,t_y,text,style.text.fill,style.text.font,style.text.color);
                        hovering = false;
                    }
                }
            });
            if (typeof events.click === 'function') {
                // add click event
                document.addEventListener("click",function(e){
                    // check if the click is inside the target
                    if (e.clientX > x && e.clientX < (x+w) && e.clientY > y && e.clientY < (y+h)) {
                        events.click();
                    }
                });
            }
        }
    }
    return {
        pill:pill    
    }
}());