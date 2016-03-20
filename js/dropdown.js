var target;
$(document).click(function(e) {
	target = $(e.target);
	console.log(target);
	if (target.is('#menuButton')) {
		e.preventDefault();
		$('#header').css('position', 'absolute');
		$('#header').css('z-index', '99');
		$('#header').css('display', 'block');
		$('#header').addClass('overlay');
	} else if (!target.is('#header')){
		$('#header').css('position', "relative");
		$('#header').css('z-index', '1');
		$('#header').css('display', 'none');
		$('#header').removeClass('overlay');
	}
});