
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata2.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Department = [];
			var AVGincome = [];

			for(var i in data) {
				Department.push(data[i].departmentName);
				AVGincome.push(data[i].AVGincome);
			}

			var chartdata = {
				labels: Department,
				datasets : [
					{
						label: 'Average income of each Department',
						backgroundColor: 'rgba(198,116,255, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(198,116,255, 1)',
						data: AVGincome
					}
				]
			};

			var ctx = $("#mycanvas");

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
