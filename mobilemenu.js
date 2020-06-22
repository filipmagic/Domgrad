$(document).ready(function(){
		  $('.show-menu').on('click', function() {

		  if($(".nav-mobile").is(":hidden")){
			  	 $('.show-menu').addClass('change');
			  	 var vHeight = $(window).height(),
					    vWidth = $(window).width(),
					    cover = $('.nav-mobile');

					 cover.css({"height":vHeight,"width":vWidth});
			     $(".nav-mobile").slideDown().css("display", "block");
			    }
			  else{
			  	   $('.show-menu').removeClass('change');
			  	   $('.nav-mobile').slideUp();
			  }
					  });

		                });
  