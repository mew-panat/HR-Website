
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata5.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Department = [];
			var 	AVGworkHour = [];


			for(var i in data) {
				Department.push(data[i].departmentName);
				AVGworkHour.push(data[i].AVGworkHour);

			}

			var chartdata = {
				labels: Department,
				datasets : [
					{
						label: 'Average work hours',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: AVGworkHour
					}
				]
			};

			var ctx = $("#mycanvas5");

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
