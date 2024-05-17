//-----------Form Post Function--------------
$(document).ready(function () {

	$(".TypeInt").on("keypress keyup blur change", function (event) {
		$(this).val($(this).val().replace(/[^\d].+/, ""));
		if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$("body").click(function () {
		$('.Inpt').html('');
	});



	/*==============Page Form=========================*/
	$('.actionForm').on('submit', function (event) {
		$(".Inpt").html('');

		var formurl = $(".actionForm").attr('action');

		event.preventDefault();

		$.ajax({
			url: formurl,
			method: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			// other options
			beforeSend: function () {
				$("#loadpost").show();
			},
			success: function (data) {
				if (data.error) {
					$('.' + data.class_name).html('<div class="text-danger">' + data.error + '</div>');
					$("#loadpost").hide();
					$('input[name="' + data.class_name + '"]').focus();

				} else {

					if (data.msg != '' && data.purl == '') {
						var toast = new iqwerty.toast.Toast();
						toast.setText(data.msg).show();
						setTimeout(function () {
							location.reload(true);
						}, 3000);
						$("#loadpost").hide();
						$(".txtfeild").val('');
					} else if (data.msg != '' && data.purl != '') {
						var toast = new iqwerty.toast.Toast();
						toast.setText(data.msg).show();
						setTimeout(function () {
							window.parent.location = data.purl;
						}, 3000);
						$("#loadpost").hide();
						$(".txtfeild").val('');
					} else {
						window.parent.location = data.purl;
					}

				}
			}
		})
	});

	$(".termscheck").click(function () {
		var checked_status = this.checked;
		if (checked_status == true) {
			$(".btnaction").removeAttr("disabled");
		} else {
			$(".btnaction").attr("disabled", "disabled");
		}
	});
});