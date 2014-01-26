(function($){
	var	borderFluc = function(obj){
			alert("YO BABY");
			for(var i=0;i<5;i++){
				$(obj).animate({padding:"0px"},10);
				$(obj).animate({padding:"8px"},10);
				}
		};

	var flipIt = function(obj,obj2){
			var little = {height:"0px", width:"0px", padding:"0px"};
			var big = {height:"128px", width: "128px", padding:"5px"};
			
			obj.animate(little);
			obj2.animate(big,50);
			obj.animate(big);
			obj2.animate(little,50);
		};
		
	var flipUp = function(obj){
			obj.slideUp(50);
			obj.slideDown(400);
		};

	var jiggle = function(obj){
			for(i=0;i<7;i++){
				obj.animate({height:'121px'},5);
				obj.animate({height:'129px'},5);
				obj.animate({width:'121px'},5);
				obj.animate({width:'129px'},5);
			}
		};

$.fn.flippinTile = (function(options){
	var billyBob = "I am billyBob";
	var defaults = {
		overName: "flippinTileOver"
		};
	var options = $.extend({},defaults,options);
	var topObject = $(this);
	var bottomObject = $("."+options.overName);
	
	//alert (topObject.attr('class'));
	topObject = "$('." + topObject.attr('class') +"')";
	bottomObject = "$('." + bottomObject.attr('class') +"')";
	//alert (bottomObject.attr('class'));

	var interChange = function(obj){	
			if(obj.hasClass("top")){
				topObject.hide();
				topObject.removeClass("visible");
				bottomObject.show();
				}
			else {
				topObject.addClass("visible");
				topObject.show();
				bottomObject.hide();
				}
			};
					
		$("."+options.overName).click(function(){
			jiggle($(this));
			alert(bottomObject);
			//flipIt($(this),bottomObject);
			flipIt($(this),$(".FlippinTileOver"));
			flipUp($(this));
			//flipIt($(this),bottomObject);
			flipIt($(this),$(".FlippinTileOver"));
			flipUp($(this));
			interChange($(this));
			borderFluc($(this));
			});
			
		$(this).click(function(){
			if(topObject == $(this)){
				alert("YUP! They Equal!");
				}
			else {
				alert("NOT SO MUCH!");
				}
			jiggle($(this));
			flipIt($(this));
			flipUp($(this));
			flipIt($(this));
			flipUp($(this));
			$(this).addClass("visible");
			interChange($(this));
			});
			
		});
//////////////////////////////////////
$.fn.flippinTile1 = (function(options){
	var billyBob = "I am billyBob";
	var defaults = {
		overName: "flippinTileOver"
		};
	var options = $.extend({},defaults,options);
	var topObject = $(this);
	var bottomObject = $(options.overName);

	//	$("."+options.overName).click(function(){
		//$(bottomObject).click(funtion(){
	//		alert("GREEN");
	//		jiggle($(this));
	//		flipUp($(this));
	//		flipIt($(this));
	//		borderFluc($(this));
	//		flipUp($(this));
	//		});
			
		$(this).click(function(){
			alert("NOT GREEN");
			jiggle($(this));
			flipUp($(this));
			flipIt($(this));
			flipUp($(this));
			flipIt($(this));
			flipUp($(this));
			});
			
		});
//////////////////////////////////////
})(jQuery);

	
//		$("."+options.overName).click(function(){
			//flipUp($(this));
			//flipIt($(this));
			//borderFluc($(this));
//			interChange($(this));
			//alert("click");
//			});
			
//		$(this).click(function(){
//			alert(billyBob);
			//flipUp($(this));
			//flipIt($(this));
			//borderFluc($(this));
//			$(this).addClass("visible");
//			interChange($(this));
			//alert("click");
//			});
		

