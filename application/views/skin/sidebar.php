<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li id="dashboard"><a href="<?php echo site_url('control_administrasi/dashboard');?>">Beranda</a></li>
		<li id="all"><a href="<?php echo site_url('control_administrasi/lihat_mahasiswa');?>">Lihat Semua Mahasiswa</a></li>
		<ul class="nav nav-sidebar">
			<li id="unconf"><a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/unconfirmed');?>">Lihat Mahasiswa Belum Mendapat Kartu</a></li>
			<li id="conf"><a href="<?php echo site_url('control_administrasi/lihat_mahasiswa/confirmed');?>">Lihat Mahasiswa Sudah Mendapat Kartu</a></li>
		</ul>
	</ul>
</div>