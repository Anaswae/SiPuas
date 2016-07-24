/**
 * 
 */
$(document).ready(function(){
	
	$.ajax({
		url: Globals.site_url + "ajax/grafik_kuisioner",
		method: "post",
		dataType: 'json',
		success: function(response){
			ctx = $("#respondenChart").get(0).getContext("2d");
			myBarChart = new Chart(ctx, {
				type: 'bar',
			    data: response,
			    options: {
			    	scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                },
			                scaleLabel: {
			                	display: true,
			                	labelString: "IKM"
			                }
			            }]
			        } 
			    }
			});
		}
	});
	
});