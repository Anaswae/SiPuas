<?php
class Ajax extends CI_Controller{
	private $strUnAuthorized = "Akses tidak diperbolehkan.";

	private function _generate_json_error($message) {
		return json_encode(array(
				"status" => "error",
				"message" => "Not authenticated."
		));
	}

	private function _check_session() {
		if(!$this->load->cek_sesi(false)) {
			echo $this->_generate_json_error($strUnAuthorized);
			return false;
		}
		return true;
	}
	
	public function index(){
		echo $this->_generate_json_error("Unrecognized action.");
	}
	
	public function delete_kuisioner(){
		if (!$this->_check_session()) exit;
		
		$this->load->model('mkuisioner');
		echo $this->mkuisioner->hapusDataKuisioner();
	}
	
	public function update_simpulan($dateRange = null){
		if (!$this->_check_session()) exit;
		
		$this->load->model('mkuisioner');
		$simpulan = $this->mkuisioner->simpulanIKM($dateRange);
		$jumlahResponden = $this->mkuisioner->getJumlahResponden($dateRange);
		
		$teksSimpulan = "Kualitas Pelayanan ";
		
		if(!empty($simpulan)) 
			$teksSimpulan .= $simpulan['kinerja']; 
		else 
			$teksSimpulan .= "-";
		
		$teksSimpulan .= "<br>Dengan Nilai ";
		
		if(!empty($simpulan))
			$teksSimpulan .= $simpulan['konversi']." (".$simpulan['mutu'].")";
		else 
			$teksSimpulan .= "-";
		
		echo json_encode(array(
				'jumlah' => "<h3 class='panel-title'>Simpulan Kuisioner dari $jumlahResponden Responden</h3>",
				'simpulan' => $teksSimpulan
		));
	}
	
	public function grafik_kuisioner($dateRange = null){
		if (!$this->_check_session()) exit;
		
		$labels = array();
		$data = array();
		$this->load->model('mkuisioner');
		$daftarPelayanan = $this->mkuisioner->getGraphData($dateRange);
		
		if (!empty($daftarPelayanan)){
			foreach ($daftarPelayanan as $namaPelayanan => $nilai){
				array_push($labels, $namaPelayanan);
				array_push($data, $nilai);
			}
			
			$konten = array();
			$konten["label"] = "Data Kuisioner";
			$fillColor = array();
			$highlightFill = array();
			$highlightStroke = array();
			$strokeColor = array();
			
			foreach ($data as $elemen){
				if($elemen <= 2.0){
					array_push($fillColor, "rgba(235, 56, 20,0.8)");
					array_push($highlightFill, "rgba(170, 39, 14, 0.8)");
					array_push($highlightStroke, "rgba(170, 39, 14, 1)");
					array_push($strokeColor, "rgba(235, 56, 20,0.8)");
				}else {
					array_push($fillColor, "rgba(75, 181, 30, 0.8)");
					array_push($highlightFill, "rgba(0, 153, 51,0.8)");
					array_push($highlightStroke, "rgba(14, 89, 139,1)");
					array_push($strokeColor, "rgba(54, 162, 235, 1)");
				}
			}
			
			$konten["backgroundColor"] = $fillColor;
			$konten["hoverBackgroundColor"] = $highlightFill;
			$konten["borderColor"] = $strokeColor;
			$konten["hoverBorderColor"] = $highlightStroke;
			$konten["data"] = $data;
			
			echo json_encode(array(
					'labels' => $labels,
					'datasets' => array(
							$konten
					)
			));
		} else 
			echo json_encode("kosong");
	}
	
	public function dataKuisioner($dateRange = null){
		if (!$this->_check_session()) exit;
		
		$labels = array();
		$data = array();
		$index = 0;
		$this->load->model('mkuisioner');
		$daftarKuisioner = $this->mkuisioner->getDataKuisioner($dateRange);
		
		if (!empty($daftarKuisioner)){
			foreach ($daftarKuisioner as $namaPelayanan => $nilai){
				$data[$index] = array();
				$data[$index][0] = $nilai['nomer'];
				$data[$index][1] = $nilai['umur'];
				$data[$index][2] = $nilai['jenkel'];
				$data[$index][3] = $nilai['pendidikan'];
				$data[$index][4] = $nilai['pekerjaan'];
				$data[$index][5] = $nilai['prosedur'];
				$data[$index][6] = $nilai['persyaratan'];
				$data[$index][7] = $nilai['kejelasan'];
				$data[$index][8] = $nilai['kedisiplinan'];
				$data[$index][9] = $nilai['tanggungjawab'];
				$data[$index][10] = $nilai['kemampuan'];
				$data[$index][11] = $nilai['kecepatan'];
				$data[$index][12] = $nilai['keadilan'];
				$data[$index][13] = $nilai['kesopanan'];
				$data[$index][14] = $nilai['kewajaranBiaya'];
				$data[$index][15] = $nilai['kepastianBiaya'];
				$data[$index][16] = $nilai['kepastianJadwal'];
				$data[$index][17] = $nilai['kenyamanan'];
				$data[$index][18] = $nilai['keamanan'];
				
				$index = $index + 1;
			}

			echo json_encode(array('data' => $data));
		} else{
			echo json_encode(array('data' => array()));}
	}
}