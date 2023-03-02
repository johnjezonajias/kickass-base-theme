// Boxslider inits
(function($){
	$('body').addClass('wbxslider');
  
	const configs = [
	  { width: 550,  slides: 1, margin: 0 },
	  { width: 568,  slides: 2, margin: 5 },
	  { width: 883,  slides: 2, margin: 5 },
	  { width: 975,  slides: 3, margin: 5 },
	  { width: 1260, slides: 4, margin: 5 },
	  { width: 1366, slides: 4, margin: 10 },
	  { width: 1600, slides: 4, margin: 15 },
	  { width: Infinity, slides: 4, margin: 25 }
	];
  
	$(document).ready(function(){
	  const initialConfig = findConfig();
	  const slider = $('.bxslider').bxSlider(initialConfig);
	  $(window).resize(function() {
		const newConfig = findConfig();
		slider.reloadSlider(newConfig);
	  });
	});
  
	function findConfig() {
	  const width = $(window).width();
	  for (const config of configs) {
		if (width <= config.width) {
		  return {
			slideWidth: 405,
			minSlides: config.slides,
			maxSlides: config.slides,
			startSlide: 0,
			slideMargin: config.margin,
			pager: false,
			auto: false,
			speed: 1000,
			pause: 4000,
			touchEnabled: false,
			preloadImages: 'all'
		  };
		}
	  }
	}
  }(jQuery));