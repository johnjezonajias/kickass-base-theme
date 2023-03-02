// Custom Scripts
jQuery(document).ready(function($) {
	/** Sticky Header **/
	$(window).scroll(function() {
		if($(this).scrollTop() > 50){  
			$('body').addClass('gsticky');
		} else {
			$('body').removeClass('gsticky');
		}
	});

	/** Disable Superfish @ 1024px **/
	var sf, body;
	var breakpoint = 1030;
	jQuery(document).ready(function($) {
	    body = $('body');
	    sf = $('ul.sf-menu');
	    if(body.width() >= breakpoint) {
			jQuery('ul.sf-menu').superfish({
				animation: {
					height:'show'
				},
				delay: 1200,
			});
	    }
	    $(window).resize(function() {
	        if(body.width() >= breakpoint && !sf.hasClass('sf-js-enabled')) {
	            jQuery('ul.sf-menu').superfish({
					animation: {
						height:'show'
					},
					delay: 1200,
				});
	        } else if(body.width() < breakpoint) {
	            sf.superfish('destroy');
	        }
	    });
	});

	/** Mobile Navigation **/
	$('.hamburger').click(function() {
		$('#top-sidebar-wrap').toggleClass('open');
		$('body').toggleClass('actv-mob');
	});

	/** Mobile Menu Caret **/
	jQuery('#mobile-navigation .menu-item-has-children').each(function(index, el) {
		jQuery(this).prepend('<span class="caret"></span>');
	});

	jQuery('#mobile-navigation .caret').on('click', function(event) {
		event.preventDefault();
		if( jQuery(this).hasClass('active') ) {
			jQuery(this).parent().removeClass('par-active');
			jQuery(this).removeClass('active');
			jQuery(this).siblings('.sub-menu').slideUp();
		} else {
			jQuery(this).parent().addClass('par-active');
			jQuery(this).addClass('active');
			jQuery(this).siblings('.sub-menu').slideDown();
		}
	});

	/** Back to Top Button **/
	if ($('#back-top').length) {
	    var scrollTrigger = 300,
	    backToTop = function () {
	        var scrollTop = $(window).scrollTop();
	        if(scrollTop > scrollTrigger) {
	            $('#back-top').addClass('show');
	        } else {
	            $('#back-top').removeClass('show');
	        }
	    };

	    backToTop();

	    $(window).on('scroll', function () {
	        backToTop();
	    });

	    $('#back-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}

	/** Initialize Slidebars **/
    $.slidebars({disableOver: 2000});
});