<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller{
	public function index(){
		if($this->load->cek_sesi(false)){
			$this->output->set_header("Location: ".site_url("/administrasi"));
			return;
		}
		if($this->input->get('url') !== null)
			$data['location'] = htmlspecialchars($this->input->get('url'));
		$data['useSimple'] = true;
		$data['pageTitle'] = "SiPuas | Halaman Login SiPuas";
		$this->load->template_admin("form_login", $data);
	}
	
	public function login(){
		$data['pageTitle'] = "SiPuas | Halaman Login SiPuas";
		$data['useSimple'] = true;
		if($this->input->post('location') !== null)
			$data['location'] = $this->input->post('location');
	
		if ($this->form_validation->run() == FALSE){
				
		}else{
			$this->load->model("admin");
			$data['errors'] = $this->admin->adminLogin();
			if (empty($data['errors']) && $this->input->post('location') == "")
				header("Location:".site_url("administrasi/dashboard"));
			if (empty($data['errors']) && $this->input->post('location') != "")
				header("Location:".base_url($this->input->post('location')));
		}
		$this->load->template_admin("form_login", $data);
	}
	
}