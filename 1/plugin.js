$.fn.myWrap=function(options){
		

		var default_options={
				count:1,
				scroll: "auto"

			};
		options=$.extend(true, default_options, options);


		

	$("#gallery").wrapAll("<div class='wrap'></div>");
	$(".wrap").wrapAll("<div class='gallery'></div>");
	
	// //1
	// var count=options.count;
	// $(".wrap").css({
	// 			'width':count*154+'px'
	// 			});
	// $('#next').css({
	// 		'right':874-count*154+'px'
	// 		})
	

//2 

	// $('span').each(function(){
	// 	//$(this).addClass("on");
	// 	$(this).text($(this).next().find('img').attr("alt"));
		
	// 	})
//3

//4
//кнопками

$('#next').click(function(){
	$('.gallery ul').animate({
		'left':'-=154px'
	},300, function(){
		$('.gallery ul').append($('.gallery li:first').detach());
		$('.gallery ul').css('left',0);
		});
	return false;
});

$('#prev').click(function(){
	if(!$('.gallery').hasClass('active')){
	$('.gallery').addClass('active');
	$('.gallery li:first').before($('.gallery li:last'));
	$('.gallery ul').css('left','-154px');
	$('.gallery ul').animate({
	'left':'0'
	},300, function(){
	$('.gallery').removeClass('active');
		
		});
}
return false;
});
//автоматически

function autoChange () {   
        $('.gallery ul').animate({
		'left':'-=1540px'
	},700, function(){
		$('.gallery ul').append($('.gallery li:first').detach());
		$('.gallery ul').css('left',0);
		});
	return false;
};
var phase = 6E3;

var interval = setInterval(autoChange, phase);



	return this;
	}