
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata0.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Department = [];
			var countStaff = [];

			for(var i in data) {
				Department.push(data[i].departmentName);
				countStaff.push(data[i].countStaff);
			}

			var chartdata = {
				labels: Department,
				datasets : [
					{
						label: 'Employees Count of each Department',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: countStaff
					}
				]
			};

			var ctx = $("#mycanvas2");

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
