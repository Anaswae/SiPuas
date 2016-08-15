/**
 * 
 */
$(document).ready(function(){
    $("#range").daterangepicker({
        datepickerOptions : {
            numberOfMonths : 2,
            dayNamesMin : ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"]
        },
        initialText: 'Pilih Range Tanggal...',
        presetRanges: [{
            text: 'Seminggu ini',
            dateStart: function() { return moment().startOf('week') },
            dateEnd: function() { return moment().endOf('week') }
        }, {
            text: 'Bulan ini',
            dateStart: function() { return moment().startOf('month') },
            dateEnd: function() { return moment().endOf('month') }
        }, {
            text: 'Bulan lalu',
            dateStart: function() { return moment().startOf('month').subtract(1, 'months') },
            dateEnd: function() { return moment().startOf('month').subtract(1, 'days') }
        }, {
            text: 'Semester I',
            dateStart: function() { return moment().startOf('year') },
            dateEnd: function() { return moment().startOf('year').add(30, "days").add(5, 'months') }
        },
        {
            text: 'Semester II',
            dateStart: function() { return moment().startOf('year').add(6, 'months') },
            dateEnd: function() { return moment().endOf('year') }
        },
        {
            text: 'Setahun ini',
            dateStart: function() { return moment().startOf('year') },
            dateEnd: function() { return moment().endOf('year') }
        },
        {
            text: 'Setahun lalu',
            dateStart: function() { return moment().startOf('year').subtract(1, 'year') },
            dateEnd: function() { return moment().startOf('year').subtract(1, 'days') }
        }],
        dateFormat: 'dd-mm-yy',
        altFormat: 'yy-mm-dd',
        applyButtonText: 'Terapkan',
        clearButtonText: 'Hapus',
        cancelButtonText: 'Batalkan',
        change: function(event, data) { 
        	var date = $("#range").daterangepicker("getRange");
        	
        	var dateString=date['start'];
        	dateString=new Date(dateString);
        	var month = dateString.getMonth() + 1;
        	var startDate = dateString.getFullYear() + "-" + month + "-" + dateString.getDate();
        	
        	dateString=date['end'];
        	dateString=new Date(dateString);
        	month = dateString.getMonth() + 1;
        	var endDate = dateString.getFullYear() + "-" + month + "-" + dateString.getDate();
        	
        	var dateRange = startDate + "_" + endDate;
        	
        	$.ajax({
        		url: Globals.site_url + "ajax/grafik_kuisioner/" + dateRange,
        		method: "post",
        		dataType: 'json',
        		success: function(response){
        			
        			if(response != "kosong"){
        				
        				$('#respondenChart').remove(); // this is my <canvas> element
        				$('#chartContainer').append('<canvas id="respondenChart" width="400" height="150"></canvas>');
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
        			}else {
        				$('#respondenChart').remove(); // this is my <canvas> element
        			}
        		}
        	});
        	
        	$.ajax({
        		url: Globals.site_url + "ajax/update_simpulan/" + dateRange,
        		method: "post",
        		dataType: 'json',
        		success: function(response){
        			// Update simpulan
        			$('#simpulan').remove();
        			$('#simpulanContainer').append('<div class="panel panel-primary" id="simpulan"></div>')
        			$('#simpulan').append('<div class="panel-heading" id="head"></div>');
        			$('#head').html(response['jumlah']);
        			$('#simpulan').append('<div class="panel-body" id="body"></div>');
        			$('#body').html(response['simpulan']);
        		}
        	});
        },
        clear: function(event, data) {  
        	$.ajax({
        		url: Globals.site_url + "ajax/grafik_kuisioner/",
        		method: "post",
        		dataType: 'json',
        		success: function(response){
        			$('#respondenChart').remove(); // this is my <canvas> element
        			$('#chartContainer').append('<canvas id="respondenChart" width="400" height="150"></canvas>');
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
        	$.ajax({
        		url: Globals.site_url + "ajax/update_simpulan/",
        		method: "post",
        		dataType: 'json',
        		success: function(response){
        			// Update simpulan
        			$('#simpulan').remove();
        			$('#simpulanContainer').append('<div class="panel panel-primary" id="simpulan"></div>')
        			$('#simpulan').append('<div class="panel-heading" id="head"></div>');
        			$('#head').html(response['jumlah']);
        			$('#simpulan').append('<div class="panel-body" id="body"></div>');
        			$('#body').html(response['simpulan']);
        		}
        	});
        }
    });
	
	$("#rangeDataKuisioner").daterangepicker({
        datepickerOptions : {
            numberOfMonths : 2,
            dayNamesMin : ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"]
        },
        initialText: 'Pilih Range Tanggal...',
        presetRanges: [{
            text: 'Seminggu ini',
            dateStart: function() { return moment().startOf('week') },
            dateEnd: function() { return moment().endOf('week') }
        }, {
            text: 'Bulan ini',
            dateStart: function() { return moment().startOf('month') },
            dateEnd: function() { return moment().endOf('month') }
        }, {
            text: 'Bulan lalu',
            dateStart: function() { return moment().startOf('month').subtract(1, 'months') },
            dateEnd: function() { return moment().startOf('month').subtract(1, 'days') }
        }, {
            text: 'Semester I',
            dateStart: function() { return moment().startOf('year') },
            dateEnd: function() { return moment().startOf('year').add(30, "days").add(5, 'months') }
        },
        {
            text: 'Semester II',
            dateStart: function() { return moment().startOf('year').add(6, 'months') },
            dateEnd: function() { return moment().endOf('year') }
        },
        {
            text: 'Setahun ini',
            dateStart: function() { return moment().startOf('year') },
            dateEnd: function() { return moment().endOf('year') }
        },
        {
            text: 'Setahun lalu',
            dateStart: function() { return moment().startOf('year').subtract(1, 'year') },
            dateEnd: function() { return moment().startOf('year').subtract(1, 'days') }
        }],
        dateFormat: 'dd-mm-yy',
        altFormat: 'yy-mm-dd',
        applyButtonText: 'Terapkan',
        clearButtonText: 'Hapus',
        cancelButtonText: 'Batalkan',
        change: function(event, data) 
		{ 
			
        	var date = $("#rangeDataKuisioner").daterangepicker("getRange");
        	
        	var dateString=date['start'];
        	dateString=new Date(dateString);
        	var month = dateString.getMonth() + 1;
        	var startDate = dateString.getFullYear() + "-" + month + "-" + dateString.getDate();
        	
        	dateString=date['end'];
        	dateString=new Date(dateString);
        	month = dateString.getMonth() + 1;
        	var endDate = dateString.getFullYear() + "-" + month + "-" + dateString.getDate();
        	
        	var dateRange = startDate + "_" + endDate;
        	$("#btn_export").attr("href",Globals.site_url + "administrasi/export_respon/" + dateRange);
        	$.ajax({
        		url: Globals.site_url + "ajax/dataKuisioner/" + dateRange,
        		method: "post",
        		dataType: 'json',
        		success: function(response){
						updateTabel(response);
        		}
        	});
        },
    });
});