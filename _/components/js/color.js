$w.color = {
  /**
   * returns a color hex value from an integer
   * @param {Number}
   *
   * @returns {String}
   * */
  componentToHex: function(c) {
    c = parseInt(c);
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
  },
  /**
   * returns a color hex value from an 3 integers
   * @param {Number}
   * @param {Number}
   * @param {Number}
   *
   * @returns {String}
   * */
  rgbToHex: function(r, g, b) {
    return "#" + $w.color.componentToHex(r) + $w.color.componentToHex(g) + $w.color.componentToHex(b);
  },
  /**
   * returns a random color
   * @returns {String}
   * */
  random: function() {
    var c = [];
      for(var i=0; i<3;i++) {
        c.push(~~(Math.random() * 255));
      }
      return $w.color.rgbToHex(c[0],c[1],c[2]);
  }
}