$(document).ready(function(){
	$.ajax({
		url:  location.protocol + '//' + location.host +	"/cpe231project/followersdata9.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var positionName = [];
			var AVGtime = [];


			for(var i in data) {
				positionName.push(data[i].positionName);
				AVGtime.push(data[i].AVGtime);

			}

			var chartdata = {
				labels: 	positionName,
				datasets : [
					{
						label: 'Average time of position',
						backgroundColor: 'rgba(87,202,255, 1)',
						borderColor: 'rgba(87,202,255, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(87,202,255, 1)',
						data: AVGtime
					}
				]
			};

			var ctx = $("#mycanvas9");

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
