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
	
	public function grafik_kuisioner(){
		if (!$this->_check_session()) exit;
		
		$labels = array();
		$data = array();
		$this->load->model('mkuisioner');
		$daftarPelayanan = $this->mkuisioner->getGraphData();
		
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
			if($elemen < 2.0){
				array_push($fillColor, "rgba(235, 56, 20,0.5)");
				array_push($highlightFill, "rgba(170, 39, 14, 0.75)");
				array_push($highlightStroke, "rgba(170, 39, 14, 1)");
				array_push($strokeColor, "rgba(235, 56, 20,0.8)");
			}else {
				array_push($fillColor, "rgba(54, 162, 235, 0.2)");
				array_push($highlightFill, "rgba(14, 89, 139,0.75)");
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
	}
}