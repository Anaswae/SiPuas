<?php
class MKuisioner extends CI_Model{

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function setDataResponden(){
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		
		$data = array('nama' => $nama, 'umur' => $umur, 'jenkel' => $jenkel,
				'pendidikan' => $pendidikan, 'pekerjaan' => $pekerjaan
		);
		
		$this->session->set_flashdata($data);
	}
}