$w.buttons = (function() {
    
    "use strict";
    
    var hovering = false;
    /**
     * pill
     * draws a simple pill shaped button
     * @param {Number} reference the canvas ID
     * @param {Number} x
     * @param {Number} y
     * @param {Number} width
     * @param {Number} height
     * @param {Number} radius
     * @param {Object} style
     * @param {String} text to display on the button
     * @param {Object} ( hover, click )
     * */
    function pill(i,x,y,w,h,radius,style,text,events) {
        var r_x = x,
            r_y = y,
            t_x = x,
            t_y = y,
            $t = document.getElementsByTagName("canvas")[i],
            $tx = $t.documentOffsetLeft,
            $ty = $t.documentOffsetTop,
            bx = $tx+x,
            by = $ty+y;
            
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
            $w.mouse.trackMouse($t,function(e){
                if (typeof events.hover === 'function') {
                    /*
                    console.log(e);
                    console.log(bx);
                    console.log(bx+w);
                    console.log(by);
                    console.log(by+h);*/
                    if (e.x > bx && e.x < (bx+w) && e.y > by && e.y < (by+h)) {
                        //console.log('got here '+style.button.color);
                        //console.log('got here '+style.button.hcolor);
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
                    if (e.clientX > bx && e.clientX < (bx+w) && e.clientY > by && e.clientY < (by+h)) {
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