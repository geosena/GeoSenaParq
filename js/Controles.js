// JavaScript Document
//menu fijo
$(document).ready(function() {
    var altura = $('.menu').offset().top;
	
	$(window).on('scroll', function(){
	
	if($(window).scrollTop()>altura){
		$('.menu').addClass('menu-fixed');
	}else{
		$('.menu').removeClass('menu-fixed');
		
		}
	});
	
		
});
//Boton ir arriba
$(document).ready(function(){
 
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});
 
});