if(typeof($add)=="undefined")var $add={version:{},auto:{disabled:false}};(function($){
  $add.version.Input = "1.1.1";
  $add.Input = function(selector, settings){
    var objs = $(selector).map(function(i, el){
      var $el = $(el);
      var S = $.extend({}, $el.data(), settings);
      if($el.attr("name"))
        S.name = $el.attr("name");
      if($el.attr("id"))
        S.id = $el.attr("id");
      if($el.attr("placeholder"))
        S.placeholder = $el.attr("placeholder");
      if($el.attr("type"))
        S.type = $el.attr("type");
      if($el.val().trim().length)
        S.value = $el.val();
      var obj = new $add.Input.obj(S.id, S.name, S.type, S.placeholder, S.value);
      obj.render($el, "replace");
      return obj;
    });
    return (objs.length==0)?null:(objs.length==1)?objs[0]:objs;
  };
  $add.Input.obj = Obj.create(function(id, name, type, placeholder, value){
    this.defMember("id");
    this.defMember("name");
    this.defMember("type", "text");
    this.defMember("placeholder", "");
    this.defMember("value", "");

    this.renderer = function(){
      var self = this;
      var $container = $("<div class='addui-input-container'></div>");
      var $input = $("<input type='"+this.type+"' name='"+this.name+"' id='"+(this.id || this.guid)+"' class='addui-input-input' />").on("change", function(e){
        self.value = $input.val();
      }).appendTo($container);
      $("<div for='"+(this.id || this.guid)+"' class='addui-input-placeholder'>"+this.placeholder+"</div>").appendTo($container);
      if(this.value.trim().length > 0){
        $container.addClass("addui-input-hasValue");
        $input.val(this.value);
      }
      return $container;
    };
    this.refresher = function($container, changed){
      if(changed == "placeholder"){
        $container.find(".addui-input-placeholder").html(this.placeholder);
      } else if(changed == "type"){
        $container.find(".addui-input-input").attr("type", this.type);
      } else if(changed == "value"){
        if(this.value.trim().length > 0)
          $container.addClass("addui-input-hasValue");
        else
          $container.removeClass("addui-input-hasValue");
      }
    };

    this.init = function(id, name, type, placeholder, value){
      if(id)
        this.id = id;
      if(name)
        this.name = name;
      if(type)
        this.type = type;
      if(placeholder)
        this.placeholder = placeholder;
      if(value)
        this.value = value;
    };
    this.init.apply(this, arguments);
  });
  $.fn.addInput = function(settings){
    $add.Input(this, settings);
  };
  $add.auto.Input = function(){
    if(!$add.auto.disabled){
      $("[data-addui=input]").addInput();
    }
  }
})(jQuery);
$(function(){for(var k in $add.auto){if(typeof($add.auto[k])=="function"){$add.auto[k]();}}});