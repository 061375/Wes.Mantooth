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