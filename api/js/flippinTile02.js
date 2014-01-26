(function($){
$.fn.flippinCounter = (function(options){
	var defaults = {
		usage: "new"
		};
	var options = $.extend({},defaults,options);

	//this function only runs at definition!
	//Closure: myCounter
	alert("inside");
	var myCounter = (function(){
		var v_counter = 5;
		return {
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
	
	// begin user function
	var f = function(){
		if(options.usage == "new"){
			alert('inside f-function (new)');
			}
		else {
			alert('inside f-function (not new)');
			}
		//var mc = myCounter;
		//alert(mc.getCounter());
		//mc.incCounter();
		//alert(mc.getCounter());
		}
			
	// call user function
	f();
	});
})(jQuery);

