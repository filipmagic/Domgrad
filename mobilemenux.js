$(document).ready(function(){
		  $('.more').click(function() {
		  	  if($(".more-items").is(":hidden")){
               $(".more-items").slideDown().css({
                 'display': 'block'
               });
            }
		  	else{
               $(".more-items").slideUp();
		  	}
			});
		 });