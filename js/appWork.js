
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/datagraphworkhis.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var fName= [];
			var countyear = [];

			for(var i in data) {
				fName.push(data[i].fName);
				countyear.push(data[i].countyear);
			}

			var chartdata = {
				labels: fName,
				datasets : [
					{
						label: 'Count years',
						backgroundColor: 'rgba(195,132, 221, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(195,132, 221, 1)',
						data: countyear
					}
				]
			};
			var ctx = $('#mycanvas');

			var barGraph = new Chart(ctx, {
	 type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
