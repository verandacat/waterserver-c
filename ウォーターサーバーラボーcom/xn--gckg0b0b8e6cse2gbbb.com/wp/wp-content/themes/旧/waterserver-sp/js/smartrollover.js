$(function(){
	$('[src*="_off."]').bind('touchstart', function() {
		$(this).attr("src",$(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/,"$1_on$2"));
		}).bind('touchend', function() {
			$(this).attr("src",$(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/,"$1_off$2"));
		}).each(function(init) {
			$("<img>").attr("src",$(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/,"$1_on$2"));
	});
});