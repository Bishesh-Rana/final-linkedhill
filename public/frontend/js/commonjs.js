$(document).ready(function(){
	$('a.visibility.input-group-text').click(function(e) {
		if (i === 0) {
			$(this).find('span').html('visibility');
			$(this).parent().find('input').attr('type', 'text');
			i = 1;
		} else {
			$(this).find('span').html('visibility_off');
			$(this).parent().find('input').attr('type', 'password');
			i = 0;
		}

	})

	$('[data-fancybox]').fancybox({
		toolbar  : false,
		smallBtn : true,
	});

	var i =0;

	if($(window).width() > 1080){
		$('.dropdown, .dropleft').hover(function(){
			$(this).find('.dropdown-menu').addClass('show');
		},
		function(){
			$(this).find('.dropdown-menu').removeClass('show');
		});
	}
	else{
		$('.dropdown-toggle').dropdown()
	}

	$('header .hamburger').click(function(e){
		if(!($('.secondary-nav').hasClass('active'))){
			$('.secondary-nav').addClass('active')
			$(this).addClass('active');
			// $(this).find('span').text('close')
			$()
		}
		// else{
		// 	$('.secondary-nav').removeClass('active')
		// 	$(this).find('span').text('menu')
		// }
	});

	$('.secondary-nav  .hamburger').click(function(e){
		$('.secondary-nav').removeClass('active');
		$('header .hamburger').removeClass('active');
	})

	var secNav =$('.secondary-nav');
	const left  = -380;
	const right  = 380;
	let startScroll;
	let lastScroll;


	if($(window).width() < 450){
		$(window).scroll(function(e){
			if($(window).scrollTop() > 600 ){
				$('header').addClass('active')
			}
			else{
				$('header').removeClass('active')
			}
		})
	}

	// $('.save').click(function(e){
	// 	e.preventDefault();
	// 	$(this).toggleClass('active');
	// })





});

