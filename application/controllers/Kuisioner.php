<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends CI_Controller{
	
	public function index(){
		if(!$this->load->cek_sesi()) exit;
		
		$data['pageTitle'] = "SIMIKM | Responden Kuisioner Kepuasan Masyarakat";
		$data['useSimple'] = true;
		if ($this->form_validation->run() == FALSE){
			
		}else{
			$this->load->model('mkuisioner');
			$this->mkuisioner->setDataResponden();
			header("Location:".base_url("kuisioner/form"));
		}
		
		$this->load->template("form_awal", $data);
	}
	
	public function form() {
		if(!$this->load->cek_sesi()) exit;
		
		$responden = $this->session->flashdata();
		if(empty($responden) && !isset($_POST['submit'])){
			header("Location:".base_url("kuisioner"));
		}else{
			$data['responden'] = $responden;
			$data['pageTitle'] = "SIMIKM | Kuisioner Kepuasan Masyarakat";
			$data['useSimple'] = true;
			if ($this->form_validation->run() == FALSE){
				
			}else{
				$this->load->model('mkuisioner');
				$data['error'] = $this->mkuisioner->setDataKuisioner();
				if(empty($data['error']))
					header("Location:".base_url("kuisioner/sukses_page"));
			}
			
			$this->load->template("form_kuisioner", $data);
		}
	}
	
	public function sukses_page(){
		if(!$this->load->cek_sesi()) exit;
		
		$data['pageTitle'] = "SIMIKM | Kuisioner Kepuasan Masyarakat";
		$this->load->template("notif_sukses", $data);
	}
}