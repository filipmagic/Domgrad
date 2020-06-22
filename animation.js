				 $(window).scroll(function () {
			    var scrollTop = $(window).scrollTop();
			if ( $(window).width() > 600) {     
			    if (scrollTop > 200) {
			        $('nav').addClass('resize');
			        $('nav ul li').css({
			        	'height': '70px',
			        	'transition' : '0.5s'
			        });
			        $('nav ul li a').css({
			        	'line-height': '70px',
			        	'transition' : '0.5s'
			        });
			        $('.logo').css({
					   'background-size' : '200px 50px',
					   'width' : '200px',
					   'transition' : '0.5s',
					   'height' : '50px'
					});
					  $('.drop-down-items li').css({
            'height': 'auto'
          });
			     $('.drop-down-items li a').css({
            'line-height': '30px'
          });
			     
			    }else{
			        
			        $('nav').removeClass('resize').css('transition','0.5s');
			        $('nav ul li').css('height', '90px');
			        $('nav ul li a').css('line-height', '90px');
			        $('.logo').css({
					   'background-size' : '250px 55px',
					   'width' : '250px',
					   'height' : '55px'
					});
					$('.drop-down-items li').css({
		            'height': 'auto'
		                 });
					$('.drop-down-items li a').css({
		            'line-height': '30px'
		          });

			     
			    }
			 }

			});