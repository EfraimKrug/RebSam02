(function($){
	var billyBob = "I am billyBob";
	
	$.fn.flippinTile = function(options){
		var defaults = {
			overName: "flippinTileOver"
			};
		var options = $.extend({},defaults,options);
		var topObject = $(this);
		var bottomObject = $(options.overName);
		
		var borderFluc = function(obj){
			for(var i=0;i<5;i++){
				$(obj).animate({padding:"0px"},10);
				$(obj).animate({padding:"8px"},10);
				}
			};

		var flipIt = function(obj){
			var little = {height:"0px", width:"0px", padding:"0px"};
			var big = {height:"128px", width: "128px", padding:"5px"};
			
			obj.animate(little);
			$("."+options.overName).animate(big,50);
			obj.animate(big);
			$("."+options.overName).animate(little,50);
		};
		
		var flipUp = function(obj){
			obj.slideUp(50);
			obj.slideDown(400);
			}

		var jiggle = function(obj){
			for(i=0;i<7;i++){
				obj.animate({height:'121px'},5);
				obj.animate({height:'129px'},5);
				obj.animate({width:'121px'},5);
				obj.animate({width:'129px'},5);
				}
			}
					
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
			}
			
				
		$(this).mouseover(function(){
			jiggle($(this));
			});
			
		$("."+options.overName).click(function(){
			//flipUp($(this));
			//flipIt($(this));
			//borderFluc($(this));
			interChange($(this));
			//alert("click");
			});
			
		$(this).click(function(){
			alert(billyBob);
			//flipUp($(this));
			//flipIt($(this));
			//borderFluc($(this));
			$(this).addClass("visible");
			interChange($(this));
			//alert("click");
			});
		

	}
})(jQuery);
