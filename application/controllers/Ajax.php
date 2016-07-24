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
				array_push($fillColor, "rgba(239,98,69,0.5)");
				array_push($highlightFill, "rgb(99, 0, 0, 0.75)");
				array_push($highlightStroke, "rgba(88, 0, 0,1)");
				array_push($strokeColor, "rgba(88, 0, 0,0.8)");
			}else {
				array_push($fillColor, "rgba(220,220,220,0.5)");
				array_push($highlightFill, "rgba(151,187,205,0.75)");
				array_push($highlightStroke, "rgba(151,187,205,1)");
				array_push($strokeColor, "rgba(151,187,205,0.8)");
			}
		}
		$konten["backgroundColor"] = $fillColor;
		$konten["borderColor"] = $strokeColor;
		$konten["data"] = $data;
		
		echo json_encode(array(
				'labels' => $labels,
				'datasets' => array(
						$konten
				)
		));
	}
}