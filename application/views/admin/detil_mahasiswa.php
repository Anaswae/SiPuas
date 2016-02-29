<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Detil Mahasiswa</h1>

			<div class="row">
				<div class="col-lg-12">
					<div style="padding: 0px 0px 10px;">
						<a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/all');?>" class="btn btn-primary">&laquo; Kembali ke daftar lengkap</a>
					<?php 
					if ($referer == "unconfirmed"){
					?>
						<a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/unconfirmed');?>" class="btn btn-primary">&laquo; Kembali ke daftar belum terkonfirmasi</a> 
					<?php 
					}elseif ($referer == "confirmed"){
					?>
						<a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/confirmed');?>" class="btn btn-primary">&laquo; Kembali ke daftar sudah terkonfirmasi</a>
					<?php 
					}elseif ($referer == "registered" && $this->session->sessionType == 1){
					?>
						<a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/registered')?>;" class="btn btn-primary">&laquo; Kembali ke daftar sudah terdaftar</a>
					<?php 
					}
					?>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Aksi: </h3>
						</div>
						<div class="panel-body">
						<?php if ($mahasiswa['konfirmasi'] == 0){?>
							<a href="#" class = "btn btn-success" onclick="konfirmasi_mahasiswa('<?php echo $mahasiswa['nim'];?>')">Konfirm</a>
						<?php }elseif ($mahasiswa['konfirmasi'] == 1 && $this->session->sessionType == 1){?>
							<a href="#" class = "btn btn-success" onclick="daftarkan_mahasiswa('<?php echo $mahasiswa['nim'];?>')">Daftarkan</a>
						<?php } else if($mahasiswa['konfirmasi'] == 1){?>
							<div class="alert alert-success" role="alert">Mahasiswa Sudah Dikonfirmasi</div>
						<?php } else {?>
							<div class="alert alert-success" role="alert">Mahasiswa Sudah Terdaftar</div>
						<?php }?>
						</div>
						<div class="panel-heading">
							<h3 class="panel-title">Informasi Mahasiswa: </h3>
						</div>
						<table class="table">
							<tr>
							   <td>NIM</td>
							   <td>:</td>
							   <td><?php echo $mahasiswa['nim']; ?></td>
							</tr>
							<tr>
							   <td>Nama</td>
							   <td>:</td>
							   <td><?php echo $mahasiswa['nama']; ?></td>
							</tr >
							  <tr>
							   <td>Email</td>
							   <td>:</td>
							   <td><?php echo $mahasiswa['email']; ?></td>
							</tr>
							<tr>
							   <td>KTM</td>
							   <td>:</td>
							   <td><div class="col-xs-6"><a href="<?php echo base_url($mahasiswa['linkKtm']); ?>" target='_blank' class = 'thumbnail'>
												  <img src="<?php echo base_url($mahasiswa['linkKtm']); ?>" class='img-responsive' alt='Kartu Tanda Mahasiswa' /></a></div>
							   </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
