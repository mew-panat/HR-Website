
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata4.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Department = [];
			var 	Married = [];
			var Disvorced = [];
			var Single = [];
			var 	Widowed = [];

			for(var i in data) {
				Department.push(data[i].departmentName);
				Married.push(data[i].Married);
				Disvorced.push(data[i].Disvorced);
				Single.push(data[i].Single);
				Widowed.push(data[i].Widowed);
			}

			var chartdata = {
				labels: Department,
				datasets : [
					{
						label: '	Married',
						backgroundColor: 'rgba(195,132, 221, 1)',
						borderColor: 'rgba(195,132, 221, 1)',
						hoverBackgroundColor: 'rgba(195,132, 221, 1)',
						hoverBorderColor: 'rgba(195,132, 221, 1)',
						data: 		Married
					},
					{
						label: '	Disvorced',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor:  'rgba(255,104,129, 1)',
						hoverBackgroundColor:  'rgba(255,104,129, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: 		Disvorced
					},

					{
						label: 'Single',
						backgroundColor: 'rgba(255,202,0, 1)',
						borderColor:'rgba(255,202,0, 1)',
						hoverBackgroundColor: 'rgba(255,202,0, 1)',
						hoverBorderColor:'rgba(255,202,0, 1)',
						data: 		Single
					},
					{
						label: '	Widowed',
						backgroundColor: 'rgba(164,255,255, 1)',
						borderColor: 'rgba(164,255,255, 1)',
						hoverBackgroundColor: 'rgba(164,255,255, 1)',
						hoverBorderColor: 'rgba(164,255,255, 1)',
						data: 		Widowed
					}
				]
			};

			var ctx = $("#mycanvas4");

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
