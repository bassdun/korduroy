!function(a){a(function(){a.support.transition=(function(){var b=(function(){var e=document.createElement("bootstrap"),d={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"},c;for(c in d){if(e.style[c]!==undefined){return d[c]}}}());return b&&{end:b}})()})}(window.jQuery);!function(c){var b=function(e,d){this.options=d;this.$element=c(e).delegate('[data-dismiss="modal"]',"click.dismiss.modal",c.proxy(this.hide,this));this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};b.prototype={constructor:b,toggle:function(){return this[!this.isShown?"show":"hide"]()},show:function(){var d=this,f=c.Event("show");this.$element.trigger(f);if(this.isShown||f.isDefaultPrevented()){return}this.isShown=true;this.escape();this.backdrop(function(){var e=c.support.transition&&d.$element.hasClass("fade");if(!d.$element.parent().length){d.$element.appendTo(document.body)}d.$element.show();if(e){d.$element[0].offsetWidth}d.$element.addClass("in").attr("aria-hidden",false);d.enforceFocus();e?d.$element.one(c.support.transition.end,function(){d.$element.focus().trigger("shown")}):d.$element.focus().trigger("shown")})},hide:function(f){f&&f.preventDefault();var d=this;f=c.Event("hide");this.$element.trigger(f);if(!this.isShown||f.isDefaultPrevented()){return}this.isShown=false;this.escape();c(document).off("focusin.modal");this.$element.removeClass("in").attr("aria-hidden",true);c.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var d=this;c(document).on("focusin.modal",function(f){if(d.$element[0]!==f.target&&!d.$element.has(f.target).length){d.$element.focus()}})},escape:function(){var d=this;if(this.isShown&&this.options.keyboard){this.$element.on("keyup.dismiss.modal",function(f){f.which==27&&d.hide()})}else{if(!this.isShown){this.$element.off("keyup.dismiss.modal")}}},hideWithTransition:function(){var d=this,e=setTimeout(function(){d.$element.off(c.support.transition.end);d.hideModal()},500);this.$element.one(c.support.transition.end,function(){clearTimeout(e);d.hideModal()})},hideModal:function(d){this.$element.hide().trigger("hidden");this.backdrop()},removeBackdrop:function(){this.$backdrop.remove();this.$backdrop=null},backdrop:function(g){var f=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var d=c.support.transition&&e;this.$backdrop=c('<div class="modal-backdrop '+e+'" />').appendTo(document.body);this.$backdrop.click(this.options.backdrop=="static"?c.proxy(this.$element[0].focus,this.$element[0]):c.proxy(this.hide,this));if(d){this.$backdrop[0].offsetWidth}this.$backdrop.addClass("in");d?this.$backdrop.one(c.support.transition.end,g):g()}else{if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");c.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(c.support.transition.end,c.proxy(this.removeBackdrop,this)):this.removeBackdrop()}else{if(g){g()}}}}};var a=c.fn.modal;c.fn.modal=function(d){return this.each(function(){var g=c(this),f=g.data("modal"),e=c.extend({},c.fn.modal.defaults,g.data(),typeof d=="object"&&d);if(!f){g.data("modal",(f=new b(this,e)))}if(typeof d=="string"){f[d]()}else{if(e.show){f.show()}}})};c.fn.modal.defaults={backdrop:true,keyboard:true,show:true};c.fn.modal.Constructor=b;c.fn.modal.noConflict=function(){c.fn.modal=a;return this};c(document).on("click.modal.data-api",'[data-toggle="modal"]',function(i){var h=c(this),f=h.attr("href"),d=c(h.attr("data-target")||(f&&f.replace(/.*(?=#[^\s]+$)/,""))),g=d.data("modal")?"toggle":c.extend({remote:!/#/.test(f)&&f},d.data(),h.data());i.preventDefault();d.modal(g).one("hide",function(){h.focus()})})}(window.jQuery);!function(c){var b=function(e,d){this.init("tooltip",e,d)};b.prototype={constructor:b,init:function(g,f,e){var h,d;this.type=g;this.$element=c(f);this.options=this.getOptions(e);this.enabled=true;if(this.options.trigger=="click"){this.$element.on("click."+this.type,this.options.selector,c.proxy(this.toggle,this))}else{if(this.options.trigger!="manual"){h=this.options.trigger=="hover"?"mouseenter":"focus";d=this.options.trigger=="hover"?"mouseleave":"blur";this.$element.on(h+"."+this.type,this.options.selector,c.proxy(this.enter,this));this.$element.on(d+"."+this.type,this.options.selector,c.proxy(this.leave,this))}}this.options.selector?(this._options=c.extend({},this.options,{trigger:"manual",selector:""})):this.fixTitle()},getOptions:function(d){d=c.extend({},c.fn[this.type].defaults,d,this.$element.data());if(d.delay&&typeof d.delay=="number"){d.delay={show:d.delay,hide:d.delay}}return d},enter:function(f){var d=c(f.currentTarget)[this.type](this._options).data(this.type);if(!d.options.delay||!d.options.delay.show){return d.show()}clearTimeout(this.timeout);d.hoverState="in";this.timeout=setTimeout(function(){if(d.hoverState=="in"){d.show()}},d.options.delay.show)},leave:function(f){var d=c(f.currentTarget)[this.type](this._options).data(this.type);if(this.timeout){clearTimeout(this.timeout)}if(!d.options.delay||!d.options.delay.hide){return d.hide()}d.hoverState="out";this.timeout=setTimeout(function(){if(d.hoverState=="out"){d.hide()}},d.options.delay.hide)},show:function(){var h,d,j,f,i,e,g;if(this.hasContent()&&this.enabled){h=this.tip();this.setContent();if(this.options.animation){h.addClass("fade")}e=typeof this.options.placement=="function"?this.options.placement.call(this,h[0],this.$element[0]):this.options.placement;d=/in/.test(e);h.detach().css({top:0,left:0,display:"block"}).insertAfter(this.$element);j=this.getPosition(d);f=h[0].offsetWidth;i=h[0].offsetHeight;switch(d?e.split(" ")[1]:e){case"bottom":g={top:j.top+j.height,left:j.left+j.width/2-f/2};break;case"top":g={top:j.top-i,left:j.left+j.width/2-f/2};break;case"left":g={top:j.top+j.height/2-i/2,left:j.left-f};break;case"right":g={top:j.top+j.height/2-i/2,left:j.left+j.width};break}h.offset(g).addClass(e).addClass("in")}},setContent:function(){var e=this.tip(),d=this.getTitle();e.find(".tooltip-inner")[this.options.html?"html":"text"](d);e.removeClass("fade in top bottom left right")},hide:function(){var d=this,e=this.tip();e.removeClass("in");function f(){var g=setTimeout(function(){e.off(c.support.transition.end).detach()},500);e.one(c.support.transition.end,function(){clearTimeout(g);e.detach()})}c.support.transition&&this.$tip.hasClass("fade")?f():e.detach();return this},fixTitle:function(){var d=this.$element;if(d.attr("title")||typeof(d.attr("data-original-title"))!="string"){d.attr("data-original-title",d.attr("title")||"").removeAttr("title")}},hasContent:function(){return this.getTitle()},getPosition:function(d){return c.extend({},(d?{top:0,left:0}:this.$element.offset()),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight})},getTitle:function(){var f,d=this.$element,e=this.options;f=d.attr("data-original-title")||(typeof e.title=="function"?e.title.call(d[0]):e.title);return f},tip:function(){return this.$tip=this.$tip||c(this.options.template)},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(f){var d=c(f.currentTarget)[this.type](this._options).data(this.type);d[d.tip().hasClass("in")?"hide":"show"]()},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}};var a=c.fn.tooltip;c.fn.tooltip=function(d){return this.each(function(){var g=c(this),f=g.data("tooltip"),e=typeof d=="object"&&d;if(!f){g.data("tooltip",(f=new b(this,e)))}if(typeof d=="string"){f[d]()}})};c.fn.tooltip.Constructor=b;c.fn.tooltip.defaults={animation:true,placement:"top",selector:false,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover",title:"",delay:0,html:false};c.fn.tooltip.noConflict=function(){c.fn.tooltip=a;return this}}(window.jQuery);!function(c){var b=function(e,d){this.init("popover",e,d)};b.prototype=c.extend({},c.fn.tooltip.Constructor.prototype,{constructor:b,setContent:function(){var f=this.tip(),e=this.getTitle(),d=this.getContent();f.find(".popover-title")[this.options.html?"html":"text"](e);f.find(".popover-content")[this.options.html?"html":"text"](d);f.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,d=this.$element,f=this.options;e=d.attr("data-content")||(typeof f.content=="function"?f.content.call(d[0]):f.content);return e},tip:function(){if(!this.$tip){this.$tip=c(this.options.template)}return this.$tip},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}});var a=c.fn.popover;c.fn.popover=function(d){return this.each(function(){var g=c(this),f=g.data("popover"),e=typeof d=="object"&&d;if(!f){g.data("popover",(f=new b(this,e)))}if(typeof d=="string"){f[d]()}})};c.fn.popover.Constructor=b;c.fn.popover.defaults=c.extend({},c.fn.tooltip.defaults,{placement:"right",trigger:"click",content:"",template:'<div class="popover"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"></div></div></div>'});c.fn.popover.noConflict=function(){c.fn.popover=a;return this}}(window.jQuery);