$(document).ready(function () {

	$(".btn-borrow-book").click(function (e) {
		var book_id = $(this).val();

		$.ajax({
			type: "POST",
			url: baseurl + "user/set-borrowed-book",
			data: {book_id: book_id},
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				bs4pop.notice("Success", {
					type: "success",
					position: "topright"
				});
				window.location.reload();
			}
		});
	})

})
