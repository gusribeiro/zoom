$(function() {
	if ($("#social-buttons").length > 0) {
		var social_buttons = $("#social-buttons");
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 220) {
				social_buttons.attr("style", "position:fixed;top:15px");
			} else {
				social_buttons.removeAttr("style");
			}
		});
	}
});