<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

	public function index(){
		if(!$this->load->cek_sesi()) exit;
		
		$data['pageTitle'] = "SIMIKM | Sistem Informasi Manajemen Indeks Kepuasan Masyarakat";
		$data['useSimple'] = true;

		$this->load->template("welcome", $data);
	}	
}