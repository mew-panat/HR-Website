
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata3.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Department = [];
			var Female = [];
			var Male = [];

			for(var i in data) {
				Department.push(data[i].departmentName);
				Female.push(data[i].Female);
				Male.push(data[i].Male);
			}

			var chartdata = {
				labels: Department,
				datasets : [
					{
						label: 'Female',
						backgroundColor: 'rgba(195,132, 221, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(195,132, 221, 1)',
						data: 	Female
					},
					{
						label: 'Male',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,255,172, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: 	Male
					}
				]
			};

			var ctx = $("#mycanvas3");

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
