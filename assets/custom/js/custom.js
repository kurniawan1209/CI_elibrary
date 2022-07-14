$(document).read(function () {

    const month_list = ['January', 'February', 'March', 'April', 'May', 'June', 
                        'July', 'August', 'September', 'November', 'December']

	/**
	 * Start User Activity Graphics
	 */

	var arra_chat_canvas = $('#areaChart').get(0).getContext('2d')
    var area_chart_datas = Array();

    $.ajax({
        type: "POST",
        url: base_url + "dashboard/get-user-activity",
        dataType: "json",
        success: function (response) {
            area_chart_datas.push(response);
        }
    });

	console.log(area_chart_datas);

	var area_chart_config = {
		labels: month_list,
		datasets: [{
			label: 'User Activity',
			backgroundColor: 'rgba(60,141,188,0.9)',
			borderColor: 'rgba(60,141,188,0.8)',
			pointRadius: false,
			pointColor: '#3b8bba',
			pointStrokeColor: 'rgba(60,141,188,1)',
			pointHighlightFill: '#fff',
			pointHighlightStroke: 'rgba(60,141,188,1)',
			data: area_chart_datas
		}, ]
	}

	var area_chart_options = {
		maintainAspectRatio: false,
		responsive: true,
		legend: {
			display: false
		},
		scales: {
			xAxes: [{
				gridLines: {
					display: false,
				}
			}],
			yAxes: [{
				gridLines: {
					display: false,
				}
			}]
		}
	}

	// This will get the first returned node in the jQuery collection.
	new Chart(arra_chat_canvas, {
		type: 'line',
		data: area_chart_config,
		options: area_chart_options
	})


	/**
	 * 
	 */

})
