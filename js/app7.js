
$(document).ready(function(){
	$.ajax({
		url: location.protocol + '//' + location.host +	"/cpe231project/followersdata6.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var incomeName = [];
			var 	Amount = [];


			for(var i in data) {
				incomeName.push(data[i].incomeName);
				Amount.push(data[i].Amount);

			}

			var chartdata = {
				labels: incomeName,
				datasets : [
					{
						fill: false,
						lineTension: 0.1,
						label: 'Average work hours',
						backgroundColor: 'rgba(255,104,129, 1)',
						borderColor: 'rgba(255,205,0, 1)',
						hoverBackgroundColor: 'rgba(255,205,0, 1)',
						hoverBorderColor: 'rgba(255,104,129, 1)',
						data: Amount
					}
				]
			};

//แก้รูปแบบกราฟเป็นแบบ line
						var ctx = $("#mycanvas19");

					       var LineGraph = new Chart(ctx, {
					         type: 'line',
					         data: chartdata
					       });
					     },
					     error : function(data) {

					     }
					   });
					 });
