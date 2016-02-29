<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Beranda</h1>
			
			<h4 align="left">Selamat Datang <?php echo $this->session->adminName." (".$this->session->sessionEmail.")";?></h4>
			<div class="row placeholders">
			<h3 align="left">Semua Mahasiswa (<?php echo 'Total = '.$totalMahasiswa[0]['jumlah'];?>)</h3>
			<?php 
			foreach ($jumlahMahasiswa as $itemProdi){?>
				<div class="col-xs-6 col-sm-3 placeholder">
					<div class="panel panel-primary">
						<div class="panel-heading">
						    <h3 class="panel-title"><?php echo $itemProdi['namaJurusan'];?></h3>
						</div>
						<div class="panel-body">
						    <?php echo $itemProdi['jumlah'];?> Mahasiswa
						</div>
					</div>
				</div>
			<?php 	
			}
			?>
			</div>	
			<div class="row placeholders">
			<h3 align="left">Total Mahsiswa Berdasarkan Status</h3>
			
				<div class="col-xs-6 col-sm-3 placeholder">
					<div class="panel panel-primary">
						<div class="panel-heading">
						    <h3 class="panel-title">Sudah Mendapatkan Kartu</h3>
						</div>
						<div class="panel-body">
						    <?php echo $totalMahasiswaDapat[0]['jumlah'];?> Mahasiswa
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-3 placeholder">
					<div class="panel panel-primary">
						<div class="panel-heading">
						    <h3 class="panel-title">Belum Mendapatkan Kartu</h3>
						</div>
						<div class="panel-body">
						    <?php echo $totalMahasiswaBlmDapat[0]['jumlah'];?> Mahasiswa
						</div>
					</div>
				</div>
			
			</div>		
		</div>
	</div>
</div>