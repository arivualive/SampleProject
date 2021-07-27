
var addEvent = (window.addEventListener) ?
   (function(elm, type, event) {
      elm.addEventListener(type, event, false);
   }) : (window.attachEvent) ?
   (function(elm, type, event) {
      elm.attachEvent('on'+type, event);
   }) :
   (function(elm, type, event) {
      elm['on'+type] = event;
   }) ;

var Position = {
   offset: function(elm) {
      var pos = {};
      pos.x = this.getOffset('Left', elm);
      
      //ブラウザによってY軸情報の解釈が異なるので、見た目が同じになるように調整
      var addY = 0;
      if(jQuery.browser.mozilla){
        addY = -20;
      }
      pos.y = this.getOffset('Top', elm) + addY;
      return pos;
   },

   getOffset: function(prop, el) {
      if(!el.offsetParent || el.offsetParent.tagName.toLowerCase() == "body")
         return el['offset'+prop];
      else
         return el['offset'+prop]+ this.getOffset(prop, el.offsetParent);
   }
};

