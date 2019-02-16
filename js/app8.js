
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/datagraphOT.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var departmentName = [];
			var AVGot = [];


			for(var i in data) {
				departmentName.push(data[i].departmentName);
				AVGot.push(data[i].AVGot);

			}

			var chartdata = {
				labels: departmentName,
				datasets : [
					{
						label: 'Average OT Time',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: AVGot
					}
				]
			};

			var ctx = $("#mycanvas20");

			var barGraph = new Chart(ctx, {
	 	 type: 'horizontalBar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
