jQuery(document).ready(function ($) {
	new WOW({ mobile:false }).init();
	$(window).on('scroll load', function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 61) {//>=, not <=
			$(".site-header").addClass("fix");
//			$(".top_head").css("display","none");
		}else{
			$(".site-header").removeClass("fix");
//			$(".top_head").css("display","block");
		}
	});
/*
	if ($('.tel2_1').is(':empty')){
	  $(".block_tel2_1").hide();
	}


	$('.img_product').hover(function(){
		$('.img_product').toggleClass('hide');
		$('.gif_product').toggleClass('show');
	});
*/
	
	$('.scroll_search').click(function(){
		$('.bottom_head').toggleClass('active');
	});
	$('.show_btn .d_btn').click(function(){
		$('.show_content').toggleClass('show');
	});
	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
	
	$('.txt_requisit').click(function(){
		$('.txt_requisit').css("display", "none");
		$('.numb_requisit').css("display", "inline");
	});
	$('.numb_requisit').click(function(){
		$('.numb_requisit').css("display", "none");
		$('.txt_requisit').css("display", "inline");
	});


	$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
		var counter = $('.wish-counter');
		$.ajax({
			url: yith_wcwl_l10n.ajax_url,
			data: {
				action: 'yith_wcwl_update_wishlist_count'
			},
			dataType: 'json',
			success: function( data ){
				counter.html( data.count );
			},
			beforeSend: function(){
				counter.block();
			},
			complete: function(){
				counter.unblock();
			}
		})
	})
	
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  var id = event.detail.contactFormId;
	  if ( id == 5 ) {
		  jQuery.fancybox('<div class="response_ok text-center"><div class="f-zag">Спасибо!</div><div class="popup-subtitle">Ваше сообщение отправлено</div></div>');
	  }
	});
	
	$('.products + .lmp_load_more_button.br_lmp_button_settings').prependTo('.woo_nav');
});

if (jQuery('.h_slider__wrapper').length){
	jQuery('.h_slider__wrapper').not('.slick-initialized').slick({
		dots: true,
		autoplay:false,
		autoplaySpeed:4500,
		arrows: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: false,
//		appendArrows: jQuery('.for_fs_nav'),
		prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M136.97 380.485l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273H436c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12H60.113l83.928-83.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-116.485 116c-4.686 4.686-4.686 12.284 0 16.971l116.485 116c4.686 4.686 12.284 4.686 16.97-.001z" fill="#fff"/></svg></i>',
		nextArrow: '<i class="next-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z" fill="#fff"/></svg></i>',
	});
}

if (jQuery('.service_slider').length){
	jQuery('.service_slider').not('.slick-initialized').slick({
		dots: true,
		autoplay:true,
		autoplaySpeed:4500,
		arrows: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: false,
//		appendArrows: jQuery('.for_fs_nav'),
		prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M136.97 380.485l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273H436c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12H60.113l83.928-83.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-116.485 116c-4.686 4.686-4.686 12.284 0 16.971l116.485 116c4.686 4.686 12.284 4.686 16.97-.001z" fill="#fff"/></svg></i>',
		nextArrow: '<i class="next-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z" fill="#fff"/></svg></i>',
	});
}


if (jQuery('.news_slider').length){
	jQuery('.news_slider').not('.slick-initialized').slick({
		dots: false,
		autoplay:false,
		autoplaySpeed:6500,
		arrows: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		adaptiveHeight: false,
		appendArrows: jQuery('.slider_slick_news'),
		prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34"><path d="M13.3249 7.67529L14.8394 9.18983L8.10003 15.9292H38V18.0711H8.10003L14.8394 24.8105L13.3249 26.325L4 17.0001L13.3249 7.67529Z" fill="#38547C"/></svg></i>',
		nextArrow: '<i class="next-slick"><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.6751 7.67529L23.1606 9.18983L29.9 15.9292H0V18.0711H29.9L23.1606 24.8105L24.6751 26.325L34 17.0001L24.6751 7.67529Z" fill="#38547C"/></svg></i>',
			responsive: [
							{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},{
					breakpoint: 576,
					settings: {
						centerMode: true,
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
	});

}

	if (jQuery('.slider_photo_gallery').length){
		jQuery('.slider_photo_gallery').not('.slick-initialized').slick({
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: false,
			appendArrows: jQuery('.slider_arrow_gallery'),
			prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" width="34"><path d="M13.3249 7.67529L14.8394 9.18983L8.10003 15.9292H38V18.0711H8.10003L14.8394 24.8105L13.3249 26.325L4 17.0001L13.3249 7.67529Z" fill="#38547C"/></svg></i>',
			nextArrow: '<i class="next-slick"><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.6751 7.67529L23.1606 9.18983L29.9 15.9292H0V18.0711H29.9L23.1606 24.8105L24.6751 26.325L34 17.0001L24.6751 7.67529Z" fill="#38547C"/></svg></i>',
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
			
		});
}
