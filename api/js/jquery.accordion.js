(function($){
	$.fn.accordion = function(options) {
		// set some defaults
		var defaults = {
			 aBtn: 'btn',
			 aContent: 'content',
			 active: 'open'
		};
		var options = $.extend({}, defaults, options);

		$(document).ready(function() {
			// hide all the content panels
			$('.'+options.aContent).hide();
				
			$('.'+options.aBtn).each(function() {
				if($(this).hasClass(options.active))
				{
					$(this).siblings('.'+options.aContent)
						   .addClass(options.active)
						   .slideDown();
				}						  						  
			});
	   });
		
		// check for clicks
		$('.'+options.aBtn).click(function() {
			// object for the button that has been clicked
			var obj = $(this);			
			
			// check see if we have click the currently active tab
			// as we won't be able to check after closing the tabs!
			var slide = true;		
			if(obj.hasClass('open'))
			{
				slide = false;
			}
			
			// close all the current elements
			$('.'+options.aContent).slideUp().removeClass(options.active);
			$('.'+options.aBtn).removeClass(options.active);
			
			// check if we should still slide
			if(slide)
			{		
				// make the clicked button active and oepn	
				obj.addClass(options.active);
				obj.siblings('.'+options.aContent).addClass(options.active).slideDown();
			}
			   
			return false;					   
	   });
	};
})(jQuery);