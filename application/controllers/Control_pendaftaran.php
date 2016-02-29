<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class control_pendaftaran extends CI_Controller{
	
	public function index(){
		$data['pageTitle'] = "Form Pendataan Kartu Absen BRI FSM Undip";
		$this->load->template("form_pendaftaran", $data);		
	}
	
	/**
	 * Controller pendataan mahasiswa
	 */
	public function pendataan(){
		if (isset($_POST['submit'])){
			$nim =  $this->input->post('nim');
			$data = array();
			if (substr($nim, 0, 2) != "24")
				$data['nimError'] = "NIM pendaftar harus berasal dari FSM.";
			
			if($this->form_validation->run() == FALSE || isset($data['nimError'])){
				$data['pageTitle'] = "Form Pendataan Kartu Absen BRI FSM Undip";
				$this->load->template("form_pendaftaran", $data);
			}else{
					
				$this->load->model("mahasiswa");
				$this->mahasiswa->daftarMahasiswa();
				$data['pageTitle'] = "Form Pendataan Kartu Absen BRI FSM Undip";
				$data['submitSukses'] = "Data Anda sudah berhasil terdata.<br>Terima Kasih.";
				$this->load->template("form_pendaftaran", $data);
			}
		}else{
			$data['pageTitle'] = "Form Pendataan Kartu Absen BRI FSM Undip";
			$this->load->template("form_pendaftaran", $data);
		}	
	}
	
	
}