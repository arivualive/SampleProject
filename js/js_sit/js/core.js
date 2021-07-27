(function() {
  function Efo() {
    return (this instanceof Efo) ? this.init() : new Efo()
  }
  Efo.prototype = {
    model: {},
    validator: {},
    validatorTimerId: '',
    lastValidObjName: '',
    lastValidObjValue: '',
    timerInterval: 500,
    dragFlag: false,
    dragObj: { flag: false },
    userAgent: '',
    fadecounter: {},
    init: function() {

      this.userAgent = navigator.userAgent.toLowerCase();
      this.loadCss('/css/efo.css');
      
      if (typeof(model_efo_data) == 'undefined') {

        this.load('/js/efo_data.js', this.callback);
      } else {
        if (typeof(model_efo_data) == 'undefined') {
          return;
        }
        if (typeof(model_msg_data) != 'undefined') {
          Validator.rule.msg = model_msg_data.ja;
        }

        if (typeof(model_efo_config_data) != 'undefined') {
          this.model.settings = model_efo_config_data;
        }
        this.model.efo = model_efo_data;
        this.apply();
      }
      return this;
    },

    /**
     * Load css file
     *
     * @param  src Path to css file
     * @return void
     */
    loadCss: function(src) {
      if (/msie/.test(this.userAgent) && !/opera/.test(this.userAgent)) {

        // IE can use document.createStyleSheet()
        try{
          (function() {
            try {
                document.createStyleSheet(src);
            } catch (e) {}
            arguments.callee();
          })();
        } catch(e) {}
      } else {

        var element  = document.createElement('link');
        element.href = src;
        element.type = 'text/css';
        element.rel  = 'stylesheet';
        document.getElementsByTagName('head')[0].appendChild(element);
      }
      return this;
    },

    /**
     * Load data model
     */
    load: function(src, callback) {
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = src;
      document.getElementsByTagName('head')[0].appendChild(script);
      return this;
    },

    /**
     * Callback
     */
    callback: function(self, value)
    {
      if (value === './data.js') {
        var form = eval(efo_data);
        self.model = form;
        self.apply();
      }
    },

    /**
     * Apply event handler from model data
     */
    apply: function() {

      var self     = this;
      var elements = self.model.efo;
      var settings = self.model.settings;
      var send_obj = document.getElementsByName(settings.form_send_obj)[0];
      // Add color
      if (typeof(settings.error_color) == 'undefined') {
        settings.error_color = '#FFDDDD';
      }

      var p          = 0; //counter
      for (var name in elements) {
        var properties = elements[name];
        var id         = document.getElementsByName(name)[0];
        var _events    = new Array;
        var size       = 1;


        if (typeof(id) == 'undefined') {
          continue;
        }

        if (typeof(properties.nest) == 'undefined') {
          _events = this.getEvents(properties);

          if (properties.require === '1') {
            id.style.backgroundColor = settings.normal_color;
          } else {
            if ((id.type === 'radio' || id.type === 'checkbox')) {
              if (id.checked == false) {
                // Add color
                id.style.backgroundColor = settings.error_color;
              }
            } else if (!id.value){ // case of not input
              id.style.backgroundColor = settings.error_color;
            }
          }
          // Add events
          this.addEvents(_events, id);
        } else { // nest
          var nest = properties.nest.length;
          var _events;
          var normal_flg = 0;
          for (var i = 0; i < nest; i ++) {
            var nestedId = document.getElementsByName(name)[i];
            var parentId = document.getElementById(properties[i].label);

            if(nestedId){
              if (parentId
                    && (!typeof(nestedId.checked) == 'undefined') || nestedId.checked == true) {
                if(properties[i].parent != 1){
                  normal_flg = 1;
                }
              }
              _events = this.getEvents(properties[i]);
              this.addEvents(_events, nestedId);
            }
          }
          // radio check backgroudcolor
          if (parentId && normal_flg == 0) {
            parentId.style.backgroundColor = settings.error_color;
          } else if(parentId) {
            parentId.style.backgroundColor = settings.normal_color;
          }
        }
      }
      return this;
    },
    getEvents: function(properties) {
      var _events = new Array;
      var size    = 1;
      if (properties.event instanceof Array) {
        size = properties.event.length;
        for (var i = 0; i < size; i ++) {
          _events[i] = properties.event[i].toLowerCase();
        }
      } else {
        _events[0] = properties.event.toLowerCase();
      }

      return _events;
    },
    addEvents: function(events, id) {
      var length = events.length;
      for (var i = 0; i < length; i ++) {
        // Add event
        if (events[i] === 'realtime') {
          this.addEvent(id, 'focus', this.eventListner);
          this.addEvent(id, 'keydown', this.eventListner);
          this.addEvent(id, 'keyup', this.eventListner);
        } else if (events[i] === 'onblur') {
          this.addEvent(id, 'blur', this.eventListner);
        } else if (events[i] === 'onchange') {
          this.addEvent(id, 'change', this.eventListner);
          this.addEvent(id, 'keyup', this.eventListner);
        } else if (events[i] === 'onclick') {
          this.addEvent(id, 'click', this.eventListner);
        } else if (events[i] === 'onload') {
          this.addEvent(id, 'load', this.eventListner);
        } else if (events[i] === 'onkeyup') {
          this.addEvent(id, 'keyup', this.eventListner);
        }
      }
    },

    /**
     * Start to watch event
     */
    start: function(obj, rule, equal, require) {

      var self = this;
      if (this.lastValidObjName != '') {

        // Valid form changed
        if (this.lastValidObjName != obj.name) {

          this.lastValidObjName  = obj.name;
          this.lastValidObjValue = obj.value;
        }
      }else{

        this.lastValidObjName  = obj.name;
        this.lastValidObjValue = obj.value;
      }

      // Start timer
      this.validatorTimerId = setTimeout(function() {
        self.start(obj, rule, equal, require);
      }, this.timerInterval);

      if (this.lastValidObjValue != obj.value) {
        this.lastValidObjValue = obj.value;
        this.valid(obj, rule, equal, require);
      }
    },

    /**
     * Stop timer
     *
     * @return void
     */
    stop: function() {
      clearTimeout(this.validatorTimerId);
    },

    /**
     * Add event to event listner
     *
     * @param  node Form element
     * @param  e    Event name
     * @param  func Callback method
     * @return void
     */
    addEvent: function(node, e, method) {
      if (node.addEventListener) {
        node.addEventListener(e, method, false);
      } else if (node.attachEvent) {
        node.attachEvent('on' + e, method);
      }
    },
    removeEvent: function(node, e, method) {
      // Remove event link
      if (node.removeEventListener) {
        node.removeEventListener(e, method, false);
      } else if (node.detachEvent){
        node.detachEvent('on' + e, method);
      }
    },
    /**
     * Event listner
     *
     * @param  e Event
     * @return void
     */
    eventListner: function(e) {
      var element    = e.target || e.srcElement;
      var properties = self.model_efo_data[element.name];
      var equal      = properties.same_fname || '';
      var require    = properties.require || '';
      var klass      = self.efo || window.efo;



      if (typeof(properties.nest) == 'undefined') {
        var realtime = klass.isEventRealtime(properties);
        var obj      = new Object;
        obj.element  = element;
        obj.rules    = properties.rules;
        obj.require  = require;
        obj.equal    = equal;

        klass.startValid(obj, realtime);
      } else {
        var length  = properties.nest.length;
        var obj     = new Object;
        obj.element = element;
        
        // Parent-child relationship
        var nestLength = properties.nest.length;
        for (var j = 0; j < nestLength; j ++) {
          var child = properties[j].parent_act || [];
          var childLength = child.length;
          for (var k = 0; k < childLength; k ++) {
            var elm = properties[j][child[k]];
            var id  = document.getElementsByName(elm.name)[0];
            var child_filed = klass.model.efo[elm.name];
            
            if (properties[j].value == element.value) {
              // "0":required, "1":not required
              if (id.value == '' && elm.require == '0') {
                id.style.backgroundColor = klass.model.settings.error_color;
              } else {
                id.style.backgroundColor = klass.model.settings.normal_color;
              }
              
              child_filed.rules   = elm.rule;
              child_filed.require = elm.require;
              
              
            }
          }
        }


        for (var i = 0; i < length; i ++) {
          if (element.value == properties[i].value) {
            var realtime = klass.isEventRealtime(properties[i]);
            obj.rules    = properties[i].rules;
            obj.require  = properties[i].require;
            obj.equal    = properties[i].equal;
            klass.startValid(obj, realtime);
          }
        }
      }
      
      return klass;
    },
    isEventRealtime: function(properties) {
      if (properties.event instanceof Array) {
        var length = properties.event;
        for (var i = 0; i < length; i ++) {
          if (properties.event[i].toLowerCase() === 'realtime') {
            return true;
          }
        }
        return false;
      }
      if (properties.event.toLowerCase() === 'realtime') {
        return true;
      }
      return false;
    },
    startValid: function(elements, realtime) {

      var klass   = self.efo;
      var element = elements.element;
      var rules   = elements.rules;
      var equal   = elements.equal;
      var require = elements.require;
      if (realtime == true) {

        klass.stop();
        klass.start(element, rules, equal, require);
      } else {

        klass.valid(element, rules, equal, require);
      }
      return klass;
    },

    /**
     * Valid
     *
     * @param  obj Form element
     * @param  rule Validation rule
     * @param  equal Form name
     * @param  require Required flag 1:required
     * @return void
     */
    valid: function(obj, rule, equal, require) {
      var ret = Validator.check(obj, rule, equal);
      if (ret === true) {
        // Validation ok
        // If input value not exists, change input color
        if(require == 1){
          obj.style.backgroundColor = this.model.settings.normal_color;
        } else if (obj.value == '') {
          obj.style.backgroundColor = this.model.settings.error_color;
        } else {
          obj.style.backgroundColor = this.model.settings.normal_color;
          var properties = self.efo.model.efo[obj.name];
          if (typeof(properties.nest) != 'undefined') {
            var length = properties.nest.length;
            for (var i = 0; i < length; i ++) {
              var id = document.getElementById(properties[i].id);
              id.style.backgroundColor = this.model.settings.normal_color;
            }
          }
        }

      } else {
        if (obj.style.backgroundColor != this.model.settings.error_color) {
          obj.style.backgroundColor = this.model.settings.error_color;
        }
        // Error occured, show baloon
        var elements = document.getElementsByTagName('div');
        var length   = elements.length;
        var element;

        $('.baloon').fadeOut(this.model.settings.error_disp_time);
      }
      return ret
    },
    
    getElement: function(node, name) {
      var elements = document.getElementsByTagName(node);
      var length   = elements.length;
      var element;
      for (var i = 0; i < length; i ++) {
        if (elements[i].className == name) {
          element = elements[i];
          break;
        }
      }
      return element;
    },

    _fadeout: function(obj, millisec, opacity, timer) {
    }
  };

  /**
   * Validator
   */
  var Validator = {
    check: function(field, reg, extra, abcdmsg) {
      var abcdmsg;
      var response;
      var rule = this.rule;
      rule.field = field;
      rule.value = field.value;
      rule.extra = extra;


      if(!reg || !reg.match(/^!/))
         response = rule.input();

      if(reg && !response && rule.value != '') {
         reg = reg.replace(/^!/, '');

         var mode = reg.split(/\s+/);
         for(var i = 0, m; m = mode[i]; i++) {
            m = m.replace(/([\d\-]+)?$/, '');
            response = rule[m](RegExp.$1);
            if(response) break;
         }
      }

      if (response) {
         this.baloon.open(field, response);
         return m;
      } else {
        return true;
      }
    },

    submit: function(form) {
      this.allclose(form);
      var btns = new Array;

      for (var i = 0, f; f = form[i]; i++) {
         if (f.onblur)
            f.onblur();
         if (f.type == 'submit')
            btns.push(f);
      }

      for (var i = 0, f, z; f = form[i]; i++) {
         if (f._validbaloon && f._validbaloon.visible()) {
            while (z = btns.shift())
               this.baloon.open(z, this.rule.submit());
            return false;
         }
      }

      return true;
    },

    allclose: function(form) {
      for(var i = 0, f; f = form[i]; i++)
         if(f._validbaloon) f._validbaloon.close();
    }
  };

  /**
   * Validator rule
   */
  Validator.rule = {
    msg: null,

    submit: function() {
      return this.msg.submit;
    },

    input: function() {
      if (this.field.type == 'radio' || this.field.type == 'checkbox') {
        for (var i = 0, e; e = this.field.form[this.field.name][i]; i++)
          if(e.checked) return;
        return this.msg.noselect;
      } else if (this.value == '')
        return (this.field.type == 'select-one') ? this.msg.noselect : this.msg.noinput;
    }
  };

  Validator.baloon = {
    index: 0,

    open: function(field, msg) {
      if (!field._validbaloon) {
        var obj = new this.element(field);
        obj.create();
        field._validbaloon = obj;
        if (field.type == 'radio' || field.type == 'checkbox') {
          for (var i = 0, e; e = field.form[field.name][i]; i++)
            addEvent(e, 'focus', function() { obj.close(); });
          }
      } else {
        var offset = Validator.position.offset(field);
        var top    = offset.y - 40;
        var left   = offset.x - 5;

        field._validbaloon.box.style.top  = top  + 'px';
        field._validbaloon.box.style.left = left + 'px';
      }
      field._validbaloon.show(msg);
    },

    element: function() {
      this.initialize.apply(this, arguments);
    }
  };

  Validator.baloon.element.prototype = {
    initialize: function(field) {
      this.parent = Validator.baloon;
      this.field = field;
    },

    create: function() {
      var field     = this.field;
      var box       = document.createElement('div');
      box.className = 'baloon';

      var offset = Validator.position.offset(field);
      var top    = offset.y - 40;
      var left   = offset.x - 5;
      box.style.top  = top + 'px';
      box.style.left = left + 'px';

      var self = this;
      Validator.addEvent(box, 'click', function() { self.toTop(); });

      var bindClose = function() { self.close(); };
      var msg = document.createElement('span');
      var div = document.createElement('div');
      
      div.appendChild(msg);
      box.appendChild(div);
      document.body.appendChild(box);

      this.box = box;
      this.msg = msg;
    },

    show: function(msg) {

      msg = '<table style="border-width: 0pt; border-style: none; padding: 0pt; border-collapse: collapse;"><tr><td class="msg">' + msg + '<\/td><td class="box_right"><\/td><\/tr><\/table>';

      var field              = this.field;
      this.msg.innerHTML     = msg;

      
      this.box.style.display = '';
      this.toTop();

    },

    close: function() {
      this.box.style.display = 'none';
    },

    visible: function() {
      return (this.box.style.display == '');
    },

    toTop: function() {
      this.box.style.zIndex = ++ this.parent.index;
    }
  };

  Validator.addEvent = (window.addEventListener) ?
    (function(elm, type, event) {
      elm.addEventListener(type, event, false);
    }) : (window.attachEvent) ?
    (function(elm, type, event) {
      elm.attachEvent('on' + type, event);
    }) :
    (function(elm, type, event) {
      elm['on'+type] = event;
    });


  Validator.position = {
    extraY: 20,
    offset: function(elm) {
      var pos = {};
      pos.x = this.getOffset('Left', elm);
      //ブラウザによってY軸情報の解釈が異なるので、見た目が同じになるように調整
      var userAgent = navigator.userAgent.toLowerCase();
      var addY = 0;

      //AppleWebKit version 530~ addY
      var awkv;
      var awk = false;
      if ((awkv = navigator.userAgent.match(/AppleWebKit\/(\d+(\.\d+)?)/)) && awkv[1] > 530) {
        awk = true;
      }
      pos.y = this.getOffset('Top', elm) + addY;
      return pos;
   },

   getOffset: function(prop, el) {
      if(!el.offsetParent || el.offsetParent.tagName.toLowerCase() == "body")
         return el['offset' + prop];
      else

         return el['offset' + prop] + this.getOffset(prop, el.offsetParent);
      }
  };


  /**
   * Main
   */
  try {
    // For IE
    document.execCommand("BackgroundImageCache", false, true);
  } catch(e) {}

  var efo = Efo();
  window.efo = efo;

})();
