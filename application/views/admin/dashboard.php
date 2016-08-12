<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Beranda</h1>
			
			<h4 align="left">Selamat Datang <?php echo $this->session->adminName." (".$this->session->sessionEmail.")";?></h4>
			<div class="row placeholders">
				<?php if(!empty($simpulan)){?>
				<div class="col-lg-6 placeholder"><h3 align="left">Grafik Kualitas Pelayanan</h3></div>
				<div class="col-lg-6 placeholder" style="padding-top: 20px"><input id="range" name="range"></div>
					
				<div class="col-xs-12 col-sm-12 placeholder" id="chartContainer">
					<canvas id="respondenChart" width="400" height="150"></canvas>
				</div>
				<?php } else{?>
				<h3 align="left">Belum ada responden</h3>
				<?php }?>
				
				<div class="col-xs-6 col-sm-6 placeholder" id="simpulanContainer">
					<div class="panel panel-primary" id="simpulan">
						<div class="panel-heading">
						    <h3 class="panel-title">Simpulan Kuisioner dari <?php echo $jumlahResponden;?> Responden</h3>
						</div>
						<div class="panel-body">
						    Kualitas Pelayanan <?php if(!empty($simpulan)) echo $simpulan['kinerja']; else echo "-";?><br>
						    Dengan Nilai <?php if(!empty($simpulan)) echo $simpulan['konversi']." (".$simpulan['mutu'].")"; else echo "-"?>
						</div>
					</div>
				</div>
				<?php if(!empty($simpulan)){?>
				<div class="col-xs-6 col-sm-6 placeholder">
					<div class="panel panel-danger">
						<div class="panel-heading">
						    <h3 class="panel-title">Hapus Semua Kuisioner</h3>
						</div>
						<div class="panel-body">
						    <button type="button" class="btn btn-danger col-xs-12 col-sm-12 btn-lg" onclick="return hapus_kuisioner();">
							  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
							</button>
						</div>
					</div>
				</div>
				<?php }?>
			</div>	
		</div>
	</div>
</div>
