<div class= "container">
	<form class="form-responden form-horizontal" method="POST" action="<?php echo base_url("kuisioner");?>" role="form">
		<h3>Data Masyarakat (Responden)</h3><br>
		<div class="form-group">
			<label class="control-label col-sm-3" for="umur">Umur Responden*</label>
			<div class="col-sm-9">
				<input type="text" name="umur" value="<?php echo set_value('umur')?>" class="form-control" placeholder="Isikan umur responden" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Jenis Kelamin*</label>
			<div class="col-sm-9">
				<div class="radio">
					<label><input style="margin-top: 4px;" type="radio" name="jenkel" value="0" <?php echo set_radio('jenkel', '0', TRUE); ?> required> Laki-Laki</label>
					<label><input style="margin-top: 4px;" type="radio" name="jenkel" value="1" <?php echo set_radio('jenkel', '1'); ?> required> Perempuan</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pendidikan">Pendidikan Terakhir*</label>
			<div class="col-sm-9">
				<select name="pendidikan" class="form-control">
					<option value="" selected>-- Pilih Pendidikan --</option>
					<option value="SD Kebawah" <?php echo set_select('pendidikan', 'SD Kebawah', FALSE)?>>SD Kebawah</option>
					<option value="SMP" <?php echo set_select('pendidikan', 'SMP', FALSE)?>>SMP</option>
					<option value="SMA" <?php echo set_select('pendidikan', 'SMA', FALSE)?>>SMA</option>
					<option value="Diploma" <?php echo set_select('pendidikan', 'Diploma', FALSE)?>>D1-D3-D4</option>
					<option value="S1" <?php echo set_select('pendidikan', 'S1', FALSE)?>>S1</option>
					<option value="S2 Keatas" <?php echo set_select('pendidikan', 'S2 Keatas', FALSE)?>>S2 Keatas</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pekerjaan">Pekerjaan Utama*</label>
			<div class="col-sm-9">
				<select name="pekerjaan" class="form-control">
					<option value="" selected>-- Pilih Pekerjaan --</option>
					<option value="PNS/TNI/Polri" <?php echo set_select('pekerjaan', 'PNS/TNI/Polri', FALSE)?>>PNS/TNI/Polri</option>
					<option value="Pegawai Swasta" <?php echo set_select('pekerjaan', 'Pegawai Swasta', FALSE)?>>Pegawai Swasta</option>
					<option value="Wiraswasta" <?php echo set_select('pekerjaan', 'Wiraswasta', FALSE)?>>Wiraswasta</option>
					<option value="Pelajar/Mahasiswa" <?php echo set_select('pekerjaan', 'Pelajar/Mahasiswa', FALSE)?>>Pelajar/Mahasiswa</option>
					<option value="Lainnya" <?php echo set_select('pekerjaan', 'Lainnya', FALSE)?>>Lainnya</option>
				</select>
			</div>
		</div>
		<div>Keterangan : * = Harus diisi</div> 
		<button class="btn btn-lg btn-primary btn-block" type="submit">Lanjutkan</button><br>
		<?php
		$validasi = validation_errors();
		if (!empty($validasi)) {
			echo "<div class= \"alert alert-danger\"><ol type='1'>";
				if(!empty($validasi) ) echo validation_errors("<li>", "</li>");
			echo "</ol></div>";
		}
		?>
	</form>
</div>