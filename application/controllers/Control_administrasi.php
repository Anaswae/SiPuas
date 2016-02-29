<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_administrasi extends CI_Controller{
	
	public function index(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->dashboard();
	}
	
	public function dashboard(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->model("mahasiswa");
		$data['jumlahMahasiswa'] = $this->mahasiswa->countMahasiswa();
		$data['totalMahasiswa'] = $this->mahasiswa->countMahasiswa(true);
		$data['totalMahasiswaDapat'] = $this->mahasiswa->countMahasiswabyStatus("confirmed");
		$data['totalMahasiswaBlmDapat'] = $this->mahasiswa->countMahasiswabyStatus("unconfirmed");
		$data['pageTitle'] = "Dashboard Administrator";
		$data['activePage'] = "dashboard";
		$this->load->template_admin("dashboard", $data, true);
	}
	
	public function lihat_mahasiswa($status = "all"){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->model('mahasiswa');
		$data['listMahasiswa'] = $this->mahasiswa->getListDataMahasiswa($status);
		if($status == "all"){
			$data['pageTitle'] = "Daftar Mahasiswa";
			$data['activePage'] = "all";
		}else if($status == "unconfirmed"){
			$data['pageTitle'] = "Daftar Mahasiswa Belum Dikonfirmasi";
			$data['activePage'] = "unconf";
		}else if($status == "confirmed"){
			$data['pageTitle'] = "Daftar Mahasiswa Sudah Dikonfirmasi";
			$data['activePage'] = "conf";
		}else{
			$data['pageTitle'] = "Halaman tidak ditemukan";
			$this->load->template_admin("tidak_ditemukan", $data, true);
		}
		$this->load->template_admin("lihat_mahasiswa", $data, true);
	}
	
	
	public function ekspor($queryFilter = 'all'){
		if(!$this->load->cek_sesi()) exit;
		$this->load->helper('export_xlsx');
		$this->load->model('mahasiswa');
		
		if($queryFilter == 'all'){
			$data = $this->mahasiswa->getDataExcelMahasiswa('all');
			do_export_xlsx($data);
		}
	}
	
	public function konfirmasi_mahasiswa(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->model('mahasiswa');
		$return = $this->mahasiswa->konfirmasiMahasiswa();
		echo $return;
	}
	
	public function daftarkan_mahasiswa(){
		if(!$this->load->cek_sesi()) exit;
		if($this->session->sessionType != 1) exit;
		
		$this->load->model('mahasiswa');
		$return = $this->mahasiswa->daftarkanMahasiswa();
		echo $return;
	}
	
	public function cetak_email($nim){
		$this->load->helper('download');
		force_download(FCPATH.'/assets/resources/email.txt',NULL);
	}
	
	public function hapus_mahasiswa(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->model('mahasiswa');
		$return = $this->mahasiswa->deleteMahasiswa();
		echo $return;
	}
}