<?php
class Mkuisioner extends CI_Model{

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function hapusDataKuisioner($id = null){
		if($id == null){
			if($this->db->empty_table('tbl_kuisioner'))
				return "ok";
		} else {
			$this->db->delete('tbl_kuisioner', array('nomer'=>$id));
			if($this->db->affected_rows() != 0){
				return "ok";
			}else return $this->db->error;
		}
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
	
	public function getDataKuisioner($dateRange = null){
		if($dateRange == null)
			$query = $this->db->get('tbl_kuisioner');
		else{
			$start = substr($dateRange, 0, strpos($dateRange, '_')+1);
			$end = substr($dateRange, strpos($dateRange, '_')+1);
			$query = $this->db->query("SELECT * FROM `tbl_kuisioner` WHERE waktu_pengisian between '$start' and '$end'");
		} 
			
		$indeks = 0;
		$result = array();
		
		foreach ($query->result_array() as $row){
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	
	public function getDataTable($dateRange = null){
		if($dateRange == null)
			$query = $this->db->get('tbl_kuisioner');
		else{
			$start = substr($dateRange, 0, strpos($dateRange, '_')+1);
			$end = substr($dateRange, strpos($dateRange, '_')+1);
			$query = $this->db->query("SELECT * FROM `tbl_kuisioner` WHERE waktu_pengisian between '$start' and '$end'");
		} 
			
		$indeks = 0;
		$result = array();
		
		foreach ($query->result_array() as $row){
			$row['aksi'] = "<a href='#' onclick=\"return hapus_kuisioner('".$row['nomer']."');\"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Hapus</button></a>";
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	
	public function getJumlahResponden($dateRange = null){
		$listKuisioner = $this->getDataKuisioner($dateRange);
		
		return $jumlahResponden = count($listKuisioner);
	}
	
	public function hitungNilaiUnsurPelayanan($dateRange = null){
		$listKuisioner = $this->getDataKuisioner($dateRange);
		
		if(!empty($listKuisioner)){
			$hasil = array(
					'prosedur' => 0,
					'persyaratan' => 0,
					'kejelasan' => 0,
					'kedisiplinan' => 0,
					'tanggungjawab' => 0,
					'kemampuan' => 0,
					'kecepatan' => 0,
					'keadilan' => 0,
					'kesopanan' => 0,
					'kewajaranBiaya' => 0,
					'kepastianBiaya' => 0,
					'kepastianJadwal' => 0,
					'kenyamanan' => 0,
					'keamanan' => 0
			);
			
			$jumlahResponden = count($listKuisioner);
			
			foreach ($listKuisioner as $kuisioner){
				foreach ($kuisioner as $pelayanan => $nilai){
					if(array_key_exists($pelayanan, $hasil)){
						$hasil[$pelayanan] += $nilai;
					}
				}
			}
			
			foreach ($hasil as $unitPelayanan => $nilai){
				$hasil[$unitPelayanan] = $nilai/$jumlahResponden;
			}
			
			return $hasil;
		}
	}
	
	public function hitungNilaiIKM($dateRange = null) {
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan($dateRange);
		
		if(!empty($nilaiUnsurPelayanan)){
			$result = 0;
			
			foreach ($nilaiUnsurPelayanan as $unsurPelayanan){
				$result += $unsurPelayanan*0.071;
			}
			
			return $result;
		}
	}
	
	public function simpulanIKM($dateRange = null){
		$nilaiIKM = $this->hitungNilaiIKM($dateRange);
		if(!empty($nilaiIKM)){
			$nilaiIKM = $nilaiIKM * 25;
			
			if($nilaiIKM >= 25 && $nilaiIKM <= 43.75){
				$result['mutu'] = 'D';
				$result['kinerja'] = 'Tidak Baik';
			}else if($nilaiIKM > 43.75 && $nilaiIKM <= 62.5){
				$result['mutu'] = 'C';
				$result['kinerja'] = 'Kurang Baik';
			}else if($nilaiIKM > 62.5 && $nilaiIKM <= 81.25){
				$result['mutu'] = 'B';
				$result['kinerja'] = 'Baik';
			}else if($nilaiIKM > 81.25 && $nilaiIKM <= 100){
				$result['mutu'] = 'A';
				$result['kinerja'] = 'Sangat Baik';
			}
			$result['konversi'] = $nilaiIKM;
			
			return $result;
		}
	}
	
	public function getGraphData($dateRange = null){
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan($dateRange);
		$result = array();
		
		if (!empty($nilaiUnsurPelayanan)){
			$konversi = array(
					'prosedur' => 'Prosedur Pelayanan',
					'persyaratan' => 'Persyaratan Pelayanan',
					'kejelasan' => 'Kejelasan Petugas Pelayanan',
					'kedisiplinan' => 'Kedisiplinan Petugas Pelayanan',
					'tanggungjawab' => 'Tanggung Jawab Petugas Pelayanan',
					'kemampuan' => 'Kemampuan Petugas Pelayanan',
					'kecepatan' => 'Kecepatan Pelayanan',
					'keadilan' => 'Keadilan Mendapatkan Pelayanan',
					'kesopanan' => 'Kesopanan dan Keramahan Petugas',
					'kewajaranBiaya' => 'Kewajaran Biaya Pelayanan',
					'kepastianBiaya' => 'Kepastian Biaya Pelayanan',
					'kepastianJadwal' => 'Kepastian Jadwal Pelayanan',
					'kenyamanan' => 'Kenyamanan Lingkungan',
					'keamanan' => 'Keamanan Pelayanan'
			);
			
			foreach ($nilaiUnsurPelayanan as $unsurPelayanan => $nilai){
				$result[$konversi[$unsurPelayanan]] = $nilai;
			}
		}
		
		return $result;
	}
}