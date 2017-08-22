HTMLElement.prototype.hasClass = function(c) {
    if (this.classList) {
        return this.classList.contains(c);
    }
    return !!this.className.match(new RegExp('(\\s|^)' + c + '(\\s|$)'));
}
HTMLElement.prototype.addClass = function(c) {
    if (this.classList) {
        this.classList.add(c);
    }else{
        if (!this.hasClass(c)) {
            this.className += c;
        }
    }
}
HTMLElement.prototype.removeClass = function(c) {
    if (this.classList) {
        this.classList.remove(c);
    }else{
        if (this.hasClass(c)) {
            var reg = new RegExp('(\\s|^)' + c + '(\\s|$)');
            this.className=this.className.replace(reg, ' ');
        }
    }
}

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       // Edge (IE 12+) => return version number
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}