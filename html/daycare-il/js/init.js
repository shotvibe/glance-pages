
	// jQuery
		jQuery(function() {
		
			$('.poptrox .button').click(function () {
				
				if ( $(document).width() > 640 ) {
					$('#content').fadeOut("fast");
				}
				
				$(".popup").fadeIn("fast");
				 
			});
			
			$('.closer').click(function () {
			
				$(".popup").fadeOut("fast");
				
				$('#content').fadeIn("fast");
				
			});
		
		});