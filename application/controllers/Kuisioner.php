<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends CI_Controller{
	public function index(){
		$data['pageTitle'] = "SiPuas | Responden Kuisioner Kepuasan Masyarakat";
		if ($this->form_validation->run() == FALSE){
		
		}else{
			$this->load->model('MKuisioner');
			$this->MKuisioner->setDataResponden();
			header("Location:".base_url("form"));
		}
		$this->load->template("form_awal", $data);
	}
	
	public function form() {
		$responden = $this->session->flashdata();
		if(empty($responden) && !isset($_POST['submit'])){
			header("Location:".base_url(""));
		}else{
			$data['responden'] = $responden;
			$data['pageTitle'] = "SiPuas | Kuisioner Kepuasan Masyarakat";
			if ($this->form_validation->run() == FALSE){
				
			}else{
				$this->load->model('MKuisioner');
				$data['error'] = $this->MKuisioner->setDataKuisioner();
				if(empty($data['error']))
					header("Location:".base_url(""));
			}
			
			$this->load->template("form_kuisioner", $data);
		}
	}
	
	public function sukses_page(){
		
	}
}