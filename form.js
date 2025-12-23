jQuery(document).ready(function ($) {

	$('#ajax-form').on('submit', function (e) {
		e.preventDefault();

		let name  = $('#name').val();
		let email = $('#email').val();

		if (name === '' || email === '') {
			alert('Please fill all fields');
			return;
		}

		$.ajax({
			url: ajaxData.ajax_url,
			type: 'POST',
			data: {
				action: 'submit_form',
				name: name,
				email: email,
				nonce: ajaxData.nonce
			},
			success: function (response) {
				if (response.success) {
					alert(response.data.message);
					$('#ajax-form')[0].reset();
				} else {
					alert(response.data);
				}
			}
		});
	});
});
