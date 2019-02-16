$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata8.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var departmentName = [];
			var absent = [];


			for(var i in data) {
				departmentName.push(data[i].departmentName);
				absent.push(data[i].absent);

			}

			var chartdata = {
				labels: departmentName,
				datasets : [
					{
						label: 'Number of absent',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: absent
					}
				]
			};

			var ctx = $("#mycanvas8");

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
