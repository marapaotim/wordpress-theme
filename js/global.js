var img_home = '.slider-home .sa_hover_container';
var contact_submit = '.wpcf7-submit';
$(function(){

	$('.fancybox').fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
				}
	}); 
 
 	//$(img_home).css({'filter' : 'grayscale(100%)'})
 	$(contact_submit).addClass('btn btn-primary'); 
});



// $(img_home).hover(function() {
//      $(this).css({'filter' : 'grayscale(0)', 'cursor' : 'pointer'})
//   }, function() {
//     $( this ).css({'filter' : 'grayscale(100%)'})
// });