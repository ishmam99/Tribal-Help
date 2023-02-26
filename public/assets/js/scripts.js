(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

// $('button.nav-toggle').on('click', function(){
// 	$('#dash-background').toggleClass('no-padding');
// });

    /*------- preloader -------*/
$(window).on('load', function(){
    $('#loader-body').fadeOut(1000);
});

	/*------- preloader -------*/
$('button.nav-toggle').on('click',function(){
	$('#dash-background').toggleClass('no-padding');
});

function checkNavbar() {
	var target = $('.app-sidebar.colored');

	if (target.hasClass('hide-sidebar')) {
		$('#dash-background').addClass('no-padding');
	}
	else {
		$('#dash-background').removeClass('no-padding');
	}
}

jQuery(document).ready(function($) {
	checkNavbar();
	$(window).resize(checkNavbar);

	setTimeout(function(){
		$('#loader-body').remove();
	},40000);


});

















})(window);;