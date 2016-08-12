/**
 * 
 */
function hapus_kuisioner() {
	var ctn = confirm("Anda Yakin Akan Menghapus Semua Kuisioner?");
	if (!ctn) return false;
	$.post(Globals.site_url+"ajax/delete_kuisioner",
		{
			
		},
		function(data,status){
			if(data === "ok"){
				alert("Kuisioner berhasil dihapus.");
				location.reload(true);
			}else{
				alert(data);
			}
		});
	return false;
}

$(document).ready(function(){
	
	$.ajax({
		url: Globals.site_url + "ajax/grafik_kuisioner/",
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
			                	max: 4,
			                    beginAtZero:true
			                },
			                scaleLabel: {
			                	display: true,
			                	labelString: "IKM"
			                }
			            }]
			        },
			        legend: {
			            display: false
			        }
			    }
			});
		}
	});
	
});