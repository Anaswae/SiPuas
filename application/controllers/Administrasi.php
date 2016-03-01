<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller{
	public function index(){
		if(!$this->load->cek_sesi()) exit;
	
		$this->dashboard();
	}
	
	public function dashboard(){
		if(!$this->load->cek_sesi()) exit;
	
		$data['pageTitle'] = "Dashboard Administrator";
		$data['activePage'] = "dashboard";
		
		$this->load->model('mkuisioner');
		$data['simpulan'] = $this->mkuisioner->simpulanIKM();
		$data['jumlahResponden'] = $this->mkuisioner->getJumlahResponden();
		$this->load->template_admin("dashboard", $data, true);
	}
}