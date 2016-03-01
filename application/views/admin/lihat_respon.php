<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header">Lihat Respon</h3>
			
			<div class="row placeholders">
				<table class="table table-striped table-bordered table-hover" id="dataTables-list">
                    <thead>
                        <tr>
                            <th class="title-center" style="font-size:1em">No.</th>
                            <th class="title-center" style="font-size:1em">Umur</th>
                            <th class="title-center" style="font-size:1em">Jenis Kelamin</th>
                            <th class="title-center" style="font-size:1em">Pendidikian</th>
                            <th class="title-center" style="font-size:1em">Pekerjaan</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 1</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 2</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 3</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 4</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 5</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 6</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 7</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 8</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 9</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 10</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 11</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 12</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 13</th>
                            <th class="title-center" style="font-size:1em">Kuisioner 14</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
			</div>	
		</div>
	</div>
</div>

<script>
    $(function() {
        $('#dataTables-list').dataTable({
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                var temp = $('td:eq(0)', nRow).text();
                var temp = temp.split('|');
                var numbering = temp[0];
                var id = temp[1];
                
                var price = $('td:eq(2)', nRow).text();
                
                
                
                
                $('td:eq(0)', nRow).html(numbering);
                $('td:eq(2)', nRow).html('<span class="price">'+ price +'</span>');
                $('td:eq(3)', nRow).html(status);
                $('td:eq(4)', nRow).html(string);
                $('td:eq(0),td:eq(3),td:eq(4)', nRow).css('text-align','center');
                $('td:eq(2)', nRow).css('text-align','right');
                $('td:eq(2)', nRow).find('.price').autoNumeric('init', {aSep: '.', aDec: ',',  mDec: '0'});
            },
            "bAutoWidth": true, // Disable the auto width calculation 
            "aoColumns": [
                { "sWidth": "6%" },
                { "sWidth": "6%" },
                { "sWidth": "20%" },
                { "sWidth": "15%" },
                { "sWidth": "7%" }
            ],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": baseurl+"Administrasi/ssp_tm_alkes"
        });
        $('#dataTables-list').each(function(){
            var datatable = $(this);
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.addClass('form-control input-sm');
            
        });
    });
</script>