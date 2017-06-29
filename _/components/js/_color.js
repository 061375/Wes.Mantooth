var Color = {
  componentToHex: function(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
  },
  rgbToHex: function(r, g, b) {
    return "#" + this.componentToHex(r) + this.componentToHex(g) + this.componentToHex(b);
  },
  /**
   * returns a random color
   * @returns {String}
   * */
  random: function() {
    var c = [];
      for(var i=0; i<3;i++) {
        c.push(Math.floor(Math.random() * 255));
      }
      return Color.rgbToHex(c[0],c[1],c[2]);
  }
}