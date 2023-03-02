/**
 * Main JS
 */

jQuery(document).ready( function($) {
	/** Disabling Zoom-in **/
	document.addEventListener('gesturestart', function (e) {
	    e.preventDefault();
	});

	/** Hamburger Menu **/
	var $hamburger = $(".hamburger");
	$hamburger.on("click", function(e) {
	    $hamburger.toggleClass("is-active");
	});
});