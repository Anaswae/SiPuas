<?php
class MKuisioner extends CI_Model{

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function getNomerResponden(){
		$query = $this->db->get('tbl_kuisioner');
		return "RSP-".str_pad($query->num_rows() + 1, 4, 0, STR_PAD_LEFT);
	}
	
	public function setDataResponden(){
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		
		if($jenkel == "0")
			$jenkel = "Laki-Laki";
		else
			$jenkel = "Perempuan";
		
		$data = array('umur' => $umur, 'jenkel' => $jenkel,
				'pendidikan' => $pendidikan, 'pekerjaan' => $pekerjaan
		);
		
		$this->session->set_flashdata($data);
	}
	
	public function setDataKuisioner(){
		$nomer = $this->getNomerResponden();
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$prosedur = $this->input->post('prosedur');
		$persyaratan = $this->input->post('persyaratan');
		$kejelasan = $this->input->post('kejelasan');
		$kedisiplinan = $this->input->post('kedisiplinan');
		$tanggungjawab = $this->input->post('tanggungjawab');
		$kemampuan = $this->input->post('kemampuan');
		$kecepatan = $this->input->post('kecepatan');
		$keadilan = $this->input->post('keadilan');
		$kesopanan = $this->input->post('kesopanan');
		$kewajaranBiaya = $this->input->post('kewajaranBiaya');
		$kepastianBiaya = $this->input->post('kepastianBiaya');
		$kepastianJadwal = $this->input->post('kepastianJadwal');
		$kenyamanan = $this->input->post('kenyamanan');
		$keamanan = $this->input->post('keamanan');
		$waktu_pengisian = date("Y-m-d H:i:s");
		
		$data = array('nomer' => $nomer, 'umur' => $umur, 'jenkel' => $jenkel, 'pendidikan' => $pendidikan,
				'pekerjaan' => $pekerjaan, 'prosedur' => $prosedur, 'persyaratan' => $persyaratan,
				'kejelasan' => $kejelasan, 'kedisiplinan' => $kedisiplinan, 'tanggungjawab' => $tanggungjawab,
				'kemampuan' => $kemampuan, 'kecepatan' => $kecepatan, 'keadilan' => $keadilan, 'kesopanan' => $kesopanan,
				'kewajaranBiaya' => $kewajaranBiaya, 'kepastianBiaya' => $kepastianBiaya, 'kepastianJadwal' => $kepastianJadwal,
				'kenyamanan' => $kenyamanan, 'keamanan' => $keamanan, 'waktu_pengisian' => $waktu_pengisian
		);
		
		$this->db->insert('tbl_kuisioner', $data);
		
		if($this->db->affected_rows() != 0){
			return null;
		} else{
			return "Data gagal ditambahkan : ".$this->db->error;
		}
	}
}