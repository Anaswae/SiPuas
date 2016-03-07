<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header">Lihat Respon</h3>
			
			<div class="row">
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
                        <?php
							foreach($listRespon as $item)
							{
								echo '<tr>
										<td>'.$item['nomer'].'</td>
										<td>'.$item['umur'].'</td>
										<td>'.$item['jenkel'].'</td>
										<td>'.$item['pendidikan'].'</td>
										<td>'.$item['pekerjaan'].'</td>
										<td>'.$item['prosedur'].'</td>
										<td>'.$item['persyaratan'].'</td>
										<td>'.$item['kejelasan'].'</td>
										<td>'.$item['kedisiplinan'].'</td>
										<td>'.$item['tanggungjawab'].'</td>
										<td>'.$item['kemampuan'].'</td>
										<td>'.$item['kecepatan'].'</td>
										<td>'.$item['keadilan'].'</td>
										<td>'.$item['kesopanan'].'</td>
										<td>'.$item['kewajaranBiaya'].'</td>
										<td>'.$item['kepastianBiaya'].'</td>
										<td>'.$item['kepastianJadwal'].'</td>
										<td>'.$item['kenyamanan'].'</td>
										<td>'.$item['keamanan'].'</td>
								</tr>';
							}
						?>
                    </tbody>
                </table>
			</div>	
		</div>
	</div>
</div>