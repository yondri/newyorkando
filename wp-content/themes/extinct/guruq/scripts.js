//<![CDATA[
var $ = jQuery.noConflict();
jQuery(document).ready(function(){
	$(function() {
		$("#accordion1").accordion({ 
			header: 'h3', 
			autoHeight: false, 
			collapsible: true, 
			active: false 
		});
		
		$("#accordion2").accordion({ 
			header: 'h3', 
			autoHeight: false, 
			collapsible: true, 
			active: false 
		});
	});

var q_default = 'Ask your question';
var d_default = 'More details...';

	$("#ask-submit").click(function() { 
		$('form#new_post .error').remove();
		var hasError = false;

		$('.required1').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).next('label').text();
				$(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).next('label').text();
					$(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					hasError = true;
				}
			}
			if(jQuery.trim($(this).val()) == q_default) {
				var labelText = $(this).next('label').text();
				$(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				hasError = true;
			}
		});

		if( !hasError ) {
			var dataString = $("#new_post").serialize();
			//alert (dataString);return false;

			$('#guruq-ask').fadeOut('fast');
			$('#postbox h2').fadeOut('fast');

			$.ajax({
				type: "POST",
				url: "?action=post",
				data: dataString,
				success: function( data, status ) {
					var guruq_key = data;
					$("#guruq_key").val(data);

					$('#ask-message').fadeIn('fast');
					$('#ask-message').append( 'Your question has been submitted: ' + $('#question').val() );
					$('#ask-message').fadeTo('slow', 1).animate({opacity: 1.0}, 3000).fadeTo('slow', 0);  
					$('#ask-message').fadeOut('fast');
					$('#ask-message').val('');

					$('#guruq-ask').fadeIn('fast');
					$('#question').val(q_default);
					$('#postbox h2').fadeIn('fast');
				}
			  });

			return false;
		} else {
			return false;
		}
	});

});
//]]>
