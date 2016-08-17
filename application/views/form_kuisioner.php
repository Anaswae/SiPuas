<div class="container">
	<div class="container-page">
		<div class="row form-kuisioner">
			<h2>Formulir Kuisioner Responden Tentang Pelayanan Publik</h2>
			<hr>
			<form method="POST" action="<?php echo base_url("form");?>" role="form">
				<div class="col-lg-12 page active">	
					<input type="hidden" name="umur" value="<?php echo (!empty($responden['umur']))?$responden['umur']:set_value('umur') ?>">
					<input type="hidden" name="jenkel" value="<?php echo (!empty($responden['jenkel']))?$responden['jenkel']:set_value('jenkel') ?>">
					<input type="hidden" name="pendidikan" value="<?php echo (!empty($responden['pendidikan']))?$responden['pendidikan']:set_value('pendidikan') ?>">
					<input type="hidden" name="pekerjaan" value="<?php echo (!empty($responden['pekerjaan']))?$responden['pekerjaan']:set_value('pekerjaan') ?>">
					
					<label for="prosedur">1. Bagaimana pemahaman Anda tentang kemudahan prosedur pelayanan di unit ini*</label> 
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="prosedur" value="1" <?php echo set_radio('prosedur', '1'); ?> required> Tidak Mudah</label></td>
								<td><label><input type="radio" name="prosedur" value="2" <?php echo set_radio('prosedur', '2'); ?> required> Kurang Mudah</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="prosedur" value="3" <?php echo set_radio('prosedur', '3'); ?> required> Mudah</label></td>
								<td><label><input type="radio" name="prosedur" value="4" <?php echo set_radio('prosedur', '4'); ?> required> Sangat Mudah</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="persyaratan">2. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="persyaratan" value="1" <?php echo set_radio('persyaratan', '1'); ?> required> Tidak Sesuai</label></td>
								<td><label><input type="radio" name="persyaratan" value="2" <?php echo set_radio('persyaratan', '2'); ?> required> Kurang Sesuai</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="persyaratan" value="3" <?php echo set_radio('persyaratan', '3'); ?> required> Sesuai</label></td>
								<td><label><input type="radio" name="persyaratan" value="4" <?php echo set_radio('persyaratan', '4'); ?> required> Sangat Sesuai</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kejelasan">3. Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas yang melayani*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kejelasan" value="1" <?php echo set_radio('kejelasan', '1'); ?> required> Tidak Jelas</label></td>
								<td><label><input type="radio" name="kejelasan" value="2" <?php echo set_radio('kejelasan', '2'); ?> required> Kurang Jelas</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kejelasan" value="3" <?php echo set_radio('kejelasan', '3'); ?> required> Jelas</label></td>
								<td><label><input type="radio" name="kejelasan" value="4" <?php echo set_radio('kejelasan', '4'); ?> required> Sangat Jelas</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kedisiplinan">4. Bagaimana pendapat Saudara tentang kedisiplinan petugas dalam memberikan pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kedisiplinan" value="1" <?php echo set_radio('kedisiplinan', '1'); ?> required> Tidak Disiplin</label></td>
								<td><label><input type="radio" name="kedisiplinan" value="2" <?php echo set_radio('kedisiplinan', '2'); ?> required> Kurang Disiplin</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kedisiplinan" value="3" <?php echo set_radio('kedisiplinan', '3'); ?> required> Disiplin</label></td>
								<td><label><input type="radio" name="kedisiplinan" value="4" <?php echo set_radio('kedisiplinan', '4'); ?> required> Sangat Disiplin</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="tanggungjawab">5. Bagaimana pendapat Saudara tentang tanggung jawab petugas dalam memberikan pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="tanggungjawab" value="1" <?php echo set_radio('tanggungjawab', '1'); ?> required> Tidak Bertanggung Jawab</label></td>
								<td><label><input type="radio" name="tanggungjawab" value="2" <?php echo set_radio('tanggungjawab', '2'); ?> required> Kurang Bertanggung Jawab</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="tanggungjawab" value="3" <?php echo set_radio('tanggungjawab', '3'); ?> required> Bertanggung Jawab</label></td>
								<td><label><input type="radio" name="tanggungjawab" value="4" <?php echo set_radio('tanggungjawab', '4'); ?> required> Sangat Bertanggung Jawab</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kemampuan">6. Bagaimana pendapat Saudara tentang kemampuan petugas dalam memberikan pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kemampuan" value="1" <?php echo set_radio('kemampuan', '1'); ?> required> Tidak Mampu</label></td>
								<td><label><input type="radio" name="kemampuan" value="2" <?php echo set_radio('kemampuan', '2'); ?> required> Kurang Mampu</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kemampuan" value="3" <?php echo set_radio('kemampuan', '3'); ?> required> Mampu</label></td>
								<td><label><input type="radio" name="kemampuan" value="4" <?php echo set_radio('kemampuan', '4'); ?> required> Sangat Mampu</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kecepatan">7. Bagaimana pendapat Saudara tentang kecepatan pelayanan di unit ini*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kecepatan" value="1" <?php echo set_radio('kecepatan', '1'); ?> required> Tidak Cepat</label></td>
								<td><label><input type="radio" name="kecepatan" value="2" <?php echo set_radio('kecepatan', '2'); ?> required> Kurang Cepat</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kecepatan" value="3" <?php echo set_radio('kecepatan', '3'); ?> required> Cepat</label></td>
								<td><label><input type="radio" name="kecepatan" value="4" <?php echo set_radio('kecepatan', '4'); ?> required> Sangat Cepat</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="keadilan">8. Bagaimana pendapat Saudara tentang keadilan untuk mendapatkan pelayanan di unit ini*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="keadilan" value="1" <?php echo set_radio('keadilan', '1'); ?> required> Tidak Adil</label></td>
								<td><label><input type="radio" name="keadilan" value="2" <?php echo set_radio('keadilan', '2'); ?> required> Kurang Adil</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="keadilan" value="3" <?php echo set_radio('keadilan', '3'); ?> required> Adil</label></td>
								<td><label><input type="radio" name="keadilan" value="4" <?php echo set_radio('keadilan', '4'); ?> required> Sangat Adil</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kesopanan">9. Bagaimana pendapat Saudara tentang kesopanan dan keramahan petugas dalam memberikan pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kesopanan" value="1" <?php echo set_radio('kesopanan', '1'); ?> required> Tidak Sopan dan Ramah</label></td>
								<td><label><input type="radio" name="kesopanan" value="2" <?php echo set_radio('kesopanan', '2'); ?> required> Kurang Sopan dan Ramah</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kesopanan" value="3" <?php echo set_radio('kesopanan', '3'); ?> required> Sopan dan Ramah</label></td>
								<td><label><input type="radio" name="kesopanan" value="4" <?php echo set_radio('kesopanan', '4'); ?> required> Sangat Sopan dan Ramah</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kewajaranBiaya">10. Bagaimana pendapat Saudara tentang kewajaran biaya untuk mendapatkan pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kewajaranBiaya" value="1" <?php echo set_radio('kewajaranBiaya', '1'); ?> required> Tidak Wajar</label></td>
								<td><label><input type="radio" name="kewajaranBiaya" value="2" <?php echo set_radio('kewajaranBiaya', '2'); ?> required> Kurang Wajar</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kewajaranBiaya" value="3" <?php echo set_radio('kewajaranBiaya', '3'); ?> required> Wajar</label></td>
								<td><label><input type="radio" name="kewajaranBiaya" value="4" <?php echo set_radio('kewajaranBiaya', '4'); ?> required> Sangat Wajar</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kepastianBiaya">11. Bagaimana pendapat Saudara tentang kesesuaian antara biaya yang dibayarkan dengan biaya yang telah ditetapkan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kepastianBiaya" value="1" <?php echo set_radio('kepastianBiaya', '1'); ?> required> Selalu Tidak Sesuai</label></td>
								<td><label><input type="radio" name="kepastianBiaya" value="2" <?php echo set_radio('kepastianBiaya', '2'); ?> required> Kadang-Kadang Sesuai</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kepastianBiaya" value="3" <?php echo set_radio('kepastianBiaya', '3'); ?> required> Banyak Sesuainya</label></td>
								<td><label><input type="radio" name="kepastianBiaya" value="4" <?php echo set_radio('kepastianBiaya', '4'); ?> required> Selalu Sesuai</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kepastianJadwal">12. Bagaimana pendapat Saudara tentang ketepatan pelaksanaan terhadap jadwal waktu pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kepastianJadwal" value="1" <?php echo set_radio('kepastianJadwal', '1'); ?> required> Selalu Tidak Tepat</label></td>
								<td><label><input type="radio" name="kepastianJadwal" value="2" <?php echo set_radio('kepastianJadwal', '2'); ?> required> Kadang-Kadang Tepat</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kepastianJadwal" value="3" <?php echo set_radio('kepastianJadwal', '3'); ?> required> Banyak Tepatnya</label></td>
								<td><label><input type="radio" name="kepastianJadwal" value="4" <?php echo set_radio('kepastianJadwal', '4'); ?> required> Selalu Tepat</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="kenyamanan">13. Bagaimana pendapat Saudara tentang kenyamanan di lingkungan unit pelayanan*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="kenyamanan" value="1" <?php echo set_radio('kenyamanan', '1'); ?> required> Tidak Nyaman</label></td>
								<td><label><input type="radio" name="kenyamanan" value="2" <?php echo set_radio('kenyamanan', '2'); ?> required> Kurang Nyaman</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="kenyamanan" value="3" <?php echo set_radio('kenyamanan', '3'); ?> required> Nyaman</label></td>
								<td><label><input type="radio" name="kenyamanan" value="4" <?php echo set_radio('kenyamanan', '4'); ?> required> Sangat Nyaman</label></td>
							</tr>
						</table>
				</div>
				<div class="col-lg-12 page">
					<label for="keamanan">14. Bagaimana pendapat Saudara tentang keamanan pelayanan di unit ini*</label>
						<table class="table-kuisioner" border="0">
							<tr>
								<td><label><input type="radio" name="keamanan" value="1" <?php echo set_radio('keamanan', '1'); ?> required> Tidak Aman</label></td>
								<td><label><input type="radio" name="keamanan" value="2" <?php echo set_radio('keamanan', '2'); ?> required> Kurang Aman</label></td>
							</tr>
							<tr>
								<td><label><input type="radio" name="keamanan" value="3" <?php echo set_radio('keamanan', '3'); ?> required> Aman</label></td>
								<td><label><input type="radio" name="keamanan" value="4" <?php echo set_radio('keamanan', '4'); ?> required> Sangat Aman</label></td>
							</tr>
						</table>
				</div>
				<br <br>
				<div>
					<button class="btn btn-lg btn-warning btn-block btn-custom" type="submit"
							id="submit" name="submit" style="width: 120px;">Kirimkan</button><br>
				</div>
				<?php
					if (validation_errors() == true || ! empty( $error)) {
						echo "<div class= \"alert alert-danger\"><ul>";
							if(validation_errors() == true) echo validation_errors('<li>', '</li>');
							if(! empty( $error)) echo $error;
						echo "</ul></div>";
					}
				?>
			</form>
			
			<div>
				<button class="btn btn-default" id="prev"><< Pertanyaan Sebelumnya</button>
				<button class="btn btn-default" id="next">Pertanyaan Selanjutnya >></button>
			</div>
			<br>
			<div id="terlewat" class="alert alert-danger" role="alert">
			</div>
			&copy;SIMIKM Powered By <a href="mailto:saptanto.sindu@gmail.com?Subject=SiPuas" target="_top">Ketampanan</a>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	$("#prev").hide();
	$("#terlewat").hide();
	$("#submit").hide();
});
var soal = 1;
var checking = function(){
	var choices = $('input[type="radio"]:not(:checked)');
	var count = 1;
	var unchecked = [];
	
	for(var i = 0; i < choices.length-1; i++){
		if(choices[i].name == choices[i+1].name){
			count = count+1;
			if(count == 4){
				unchecked.push(choices[i].name);
			}
		}else{
			count = 1;	
		}
	}
	
	var konversi = [];
	konversi['prosedur'] = 1;
	konversi['persyaratan'] = 2;
	konversi['kejelasan'] = 3;
	konversi['kedisiplinan'] = 4;
	konversi['tanggungjawab'] = 5;
	konversi['kemampuan'] = 6;
	konversi['kecepatan'] = 7;
	konversi['keadilan'] = 8;
	konversi['kesopanan'] = 9;
	konversi['kewajaranBiaya'] = 10;
	konversi['kepastianBiaya'] = 11;
	konversi['kepastianJadwal'] = 12;
	konversi['kenyamanan'] = 13;
	konversi['keamanan'] = 14;
	var out = '<p>Pertanyaan yang belum dijawab : ';
    for (var i in unchecked) {
        out += "Pertanyaan ke-" + konversi[unchecked[i]] + " ";
    }
    out += "</p>";
    $("#terlewat").html(out);
    $("#terlewat").show();
};
var submitVar = function submitBut(){
	if($('input[type="radio"]:checked').length < $(".page").length)
		$("#submit").hide();
    if($('input[type="radio"]:checked').length == $(".page").length)
		$("#submit").show();
};
var sebelumnya = function(){
	if($(".page.active").index()-1 == 0)
		$("#prev").hide();	
    if($(".page.active").index() > 0){
    	$(".page.active").removeClass("active").prev().addClass("active");
    	$("#next").show();
    }
    soal--;
    $("#terlewat").hide();
    submitVar();
};
var setelahnya = function(){
	if($(".page.active").index()+1 == $(".page").length-1){
		$("#next").hide();
	}
    if($(".page.active").index() < $(".page").length-1){
    	$(".page.active").removeClass("active").next().addClass("active");
    	$("#prev").show();
    }
    soal++;
    if(soal == 14 && $('input[name=keamanan]:checked').length == 1){
    	checking();
    }
    submitVar();
};

$("input[name=keamanan]:radio").change(checking);

$("#prev").click(sebelumnya);
$("#next").click(setelahnya);
$('input:radio').change(submitVar);
</script>