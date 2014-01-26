/***************************************
 * html: 
 * id=menu01
 *    id=menu01s01
 *		id=menu01s01s01 etc
 ****************************************/

(function($){
$.fn.menuManipulater = (function(options){
	var defaults = {
		usage: 		"new",
		top: 		7,			// these numbers are absolute on outside level
		left: 		7,
		height: 	39,
		width: 		697,
		buttonCount: 3
		};
	var options = $.extend({},defaults,options);
	// following is treated like a stack - last in, first out... code accordingly
	//var menuColumn1 = {i1:"Item3", i2:"Item 2", a1:{a11:"Item 1.3", a12:"Item 1.2", a13:"Item 1.1", a14:"Button 1.1"},i3:"First Button"};
	var menuColumn1 = {i1:"menu01", i2:{a10:"menu01Button",a11:"menu01s01",a12:{b10:"menu01s01Button", b11:"menu01s01s01", b12:"menu01s01s02", b13:"menu01s01s03"},a13:"menu01s02",a14:"menu01s03"}};
	var menuColumn2 = {i1:"menu02", i2:"menu02Button", i13:{a10:"menu01s01Button",a11:"menu01s01s01",a12:"menu01s01s02",a13:"menu01s01s03"},i14:"menu01s02",i15:"menu01s03"};

	//this function only runs at definition!
	//Closure: menuManip
		
	var menuManip = (function(){
		var menuLevel1 = {};						
		var buttonWidth = 0;
		var buttonHeight = 0;
		return {
			getTop: function(){
				return menuLevel1.top;
				},
				
			getLeft: function(){
				return menuLevel1.left;
				},

			getHeight: function(){
				return menuLevel1.height;
				},
				
			getWidth: function(){
				return menuLevel1.width;
				},

			setMenu01: function(options){
				opts = options;
				menuLevel1 = {	top: 		options.top+"px", 
								left: 		options.left+"px", 
								height: 	options.height+"px", 
								width: 		options.width+"px"};
				alert("menuLevel1 assigned");			
				buttonWidth = menuLevel1.width / options.buttonCount;
				if(buttonWidth > 205) buttonWidth = 179;
				buttonHeight = menuLevel1.height * 2 / 3;
				},
			
			setHTMLMenu: function(){
				//alert(this.getHeight());
				$('#menu').css('height', this.getHeight());
				$('#menu').css('width', this.getWidth());
				$('#menu').css('left', this.getLeft());
				$('#menu').css('top', this.getTop());
				},

			objectCount: function (xObject){
				var iCount = 0;
				for(e in xObject){
					iCount++;
					}
				return iCount;
				},

			setMenuColumn1: function(xObject){
				//alert("Starting over");
				var i = this.objectCount(xObject);
				if(i < 1){
					//alert('empty object');
					return;
					}
				for(e in xObject){
					if(xObject[e] instanceof Object){
						//alert("recurse: " + e);
						this.setMenuColumn1(xObject[e]);
						continue;
						}
					//else {
						//alert(e + " is not an object");
					//	}
					alert("e:" + e + ": =>" + xObject[e]);
					}
				 //alert('over');
				},
			
			// in case I change back to arrays...
			_setMenuColumn1: function(x){
					alert("in function");
					if(x instanceof Object){
						alert('object');
						if(x.length < 1){
							return;
							}
						alert('about to pop');
						var y = x.pop();
						alert(y);
						this.setMenuColumn1(y);
						this.setMenuColumn1(x);
						return;
						}
					alert("x" + x);
			},

			_setMenuColumn1: function(x){
					if(x instanceof Array){
						if(x.length < 1){
							return;
							}
						var y = x.pop();
						this.setMenuColumn1(y);
						this.setMenuColumn1(x);
						return;
						}
					alert("x" + x);
			},

			
		setCounter: function(val){
			v_counter = val;
			},
		getCounter: function(){
			return v_counter;
			},
		incCounter: function(){
			v_counter++;
			},
		decCounter: function(){
			v_counter--;
			}
		};
	})();
	// end of the closure
	
	// set up options in closure
	mc = menuManip;
	mc.setMenu01(options);
	
	// begin user function
	var f = function(){
		//alert(mc.getTop());
		//alert(mc.getLeft());
		//g();
		//mc.setMenuLevel1();
		mc.setHTMLMenu();
		mc.setMenuColumn1(menuColumn1);
		mc.setMenuColumn1(menuColumn2);
			//alert(buttonHeight);
			//alert(buttonWidth);
		}
		
	var g = function(){
		alert("in g-function");
		}
		//var mc = myCounter;
		//alert(mc.getCounter());
		//mc.incCounter();
		//alert(mc.getCounter());
		
			
	// call user function
	f();
	});
})(jQuery);

