jQuery(document).ready(function($){
	$('.mt_admin_vc_iconpicker span').live('click', function(e) {
		e.preventDefault();

		var fontName = $(this).attr('data-name');

		if($(this).hasClass('active')) {
			$(this).parent().find('.active').removeClass('active');

			$(this).parent().parent().find('input').attr('value', '');
			$(this).parent().parent().find('i').removeClass();
		} else {
			$(this).parent().find('.active').removeClass('active');
			$(this).addClass('active');

			$(this).parent().parent().find('input').attr('value', fontName);
			$(this).parent().parent().find('i').removeClass();
			$(this).parent().parent().find('i').addClass(fontName);
		}
	});
});