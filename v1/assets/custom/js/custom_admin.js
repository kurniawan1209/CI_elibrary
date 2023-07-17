$(document).ready(function () {

	$("#user_table_all_user").DataTable();
	$("#dashboard_table_top_20_book").DataTable();

	$('.toast').toast('show');

	$(document)
		.on("click", "#sidebarCollapse", function () {
			var validate = $(".cst-sidebar").hasClass("active");
			if (validate) {
				$("#admin_sidebar_icon").removeClass("fa fa-chevron-circle-right");
				$("#admin_sidebar_icon").addClass("fa fa-chevron-circle-left");
			} else {
				$("#admin_sidebar_icon").removeClass("fa fa-chevron-circle-left");
				$("#admin_sidebar_icon").addClass("fa fa-chevron-circle-right");
			}
		})

		.on("click", "#btn-user-role-insert", function () {
			$("#form-user-role-insert").submit();
		})

});
