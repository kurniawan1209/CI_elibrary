// Start Graphics Chart

var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

var areaChartData = {
	labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
	datasets: [{
		label: 'Digital Goods',
		backgroundColor: 'rgba(60,141,188,0.9)',
		borderColor: 'rgba(60,141,188,0.8)',
		pointRadius: false,
		pointColor: '#3b8bba',
		pointStrokeColor: 'rgba(60,141,188,1)',
		pointHighlightFill: '#fff',
		pointHighlightStroke: 'rgba(60,141,188,1)',
		data: [28, 48, 40, 19, 86, 27, 90]
	}, ]
}

var areaChartOptions = {
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
new Chart(areaChartCanvas, {
	type: 'line',
	data: areaChartData,
	options: areaChartOptions
})

// End Graphics Chart

// Start Donut Chart

var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

var donutData = {
	labels: [
		'Readed',
		'Unreaded',
	],
	datasets: [{
		data: [300, 100],
		backgroundColor: ['#3c8dbc', '#d2d6de'],
	}]
}
var donutOptions = {
	maintainAspectRatio: false,
	responsive: true,
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
new Chart(donutChartCanvas, {
	type: 'doughnut',
	data: donutData,
	options: donutOptions,
	plugins: [{
		id: 'my-plugin',
		afterDraw: function (chart, option) {
			chart.ctx.fillStyle = 'black'
			chart.ctx.textBaseline = 'middle'
			chart.ctx.textAlign = 'center'
			chart.ctx.font = '40px Arial'
			chart.ctx.fillText('50%', chart.canvas.width / 2 + 5, chart.canvas.height / 2 + 20)
		}
	}]
})

// Start Donut Chart

// Start Bar Chart

var barChartCanvas = $('#barChart').get(0).getContext('2d')
var barChartData = $.extend(true, {}, areaChartData)
var temp0 = areaChartData.datasets[0]
var temp1 = areaChartData.datasets[1]
barChartData.datasets[0] = temp1
barChartData.datasets[1] = temp0

var barChartOptions = {
	responsive: true,
	maintainAspectRatio: false,
	datasetFill: false
}

new Chart(barChartCanvas, {
	type: 'bar',
	data: barChartData,
	options: barChartOptions
})

// End Bar Chart