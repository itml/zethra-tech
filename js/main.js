$(document).click(function(e) {
	var target = $(e.target);
	if (target.is('#projects')) {
		e.preventDefault();
		$('nav ul div').css('display', 'inline-block');
    	$('nav ul ul li').css('display', 'block');
	} else {
		$('nav ul div').css('display', 'none');
		$('nav ul ul li').css('display', 'none');
	}
});