 $(window).scroll(function() {
		   var hT = $('.service').offset().top,
		       hH = $('.service').outerHeight(),
		       wH = $(window).height(),
		       wS = $(this).scrollTop();
		    console.log((hT-wH) , wS);
		   if (wS > (hT+hH-wH)){
		   	$('.service').css({
		   		'opacity':'1'
		   		
		   });
		   }
		});