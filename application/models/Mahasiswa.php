<?php

/**
 * Kelas untuk model Mahasiswa
 * @author Saptanto Sindu K U
 *
 */
class Mahasiswa extends CI_Model{

	private $nim, $nama, $email, $phone, $status, $nobri, $linkKtm, $konfirmasi, $keterangan;
	
	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	

	/**
	 * Fungsi untuk mendapatkan data mahasiswa
	 * @return multitype:Mahasiswa array dari semua record Mahasiswa 
	 */
	public function getDataMahasiswa(){
		$this->load->model('jurusan');
		
		$this->db->where('gelombang',1);
		$result = $this->db->get('tbl_mahasiswa');
	
		$index = 0;
		$query_result = array();
		
		foreach ($result->result_array() as $row){
			$query_result[$index] = $row;
			$index++;
		}
	
		return $query_result;
	}
	
	/**
	 * Fungsi untuk mendapatkan array of object mahasiswa berdasarkan statusnya
	 * @param string $queryFilter
	 * @return multitype:Mahasiswa array dari semua record Mahasiswa
	 */
	public function getDataMahasiswabyStatus($queryFilter = null) {
		$this->db->where('gelombang',1);
		
		if ($queryFilter == "confirmed") {
			$this->db->where('status',1);
		} else {
			$this->db->where('status', 0);
		} 
		
		$result = $this->db->get('tbl_mahasiswa');
	
		$index = 0;
		$query_result = array();
	
		foreach ($result->result_array() as $row){
			$query_result[$index] = $row;
			$index++;
		}
		return $query_result;
	}
	
	function getDataExcelMahasiswa($queryFilter = "all"){
		$result = array();
		$index = 0;
		
		if($queryFilter == "all"){
			$result['list_data']['data'] = $this->getDataMahasiswa();
			foreach ($result['list_data']['data'] as $item)
			$result['list_data']['total'] = $this->countMahasiswa(true);
			$result['list_data']['sudah'] = $this->countMahasiswabyStatus("confirmed");
			$result['list_data']['belum'] = $this->countMahasiswabyStatus("unconfirmed");
		}else{
			$result['list_data']['data'] = $this->getDataMahasiswabyStatus($queryFilter);
			$result['list_data']['total'] = count($result['list_data']['data']);
		}
	}
	
	function getListDataMahasiswa($queryFilter = "all"){
		$result = array();
		$index = 0;
		
		if($queryFilter == "all"){
			$listMahasiswa = $this->getDataMahasiswa();
		}else{
			$listMahasiswa = $this->getDataMahasiswabyStatus($queryFilter);
		}
		
		foreach ($listMahasiswa as $itemMahasiswa){
			if ($itemMahasiswa['status'] == 0)
				$mahasiswaStatus = "<span class='glyphicon glyphicon-remove-circle'></span> Belum Terdaftar";
			else
				$mahasiswaStatus = "<span class='glyphicon glyphicon-ok-circle'></span> Sudah Terdaftar";
			
			if ($itemMahasiswa['email'] == null)
				$itemMahasiswa['email'] = '-';
			
			if ($itemMahasiswa['nobri'] == null)
				$itemMahasiswa['nobri'] = '-';
			
			$actionList = "<a href='#' onclick=\"return hapus_mahasiswa(".$itemMahasiswa['nim'].");\"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Hapus</button></a>";
			
			$result[$index] = "<tr>\n";
			$result[$index] .= "	<td>".$itemMahasiswa['nim']."</td>\n";
			$result[$index] .= "	<td>".$itemMahasiswa['nama']."</td>\n";
			$result[$index] .= "	<td>".$itemMahasiswa['nohp']."</td>\n";
			$result[$index] .= "	<td>".$mahasiswaStatus."</td>\n";
			$result[$index] .= "	<td>".$itemMahasiswa['nobri']."</td>\n";
			$result[$index] .= "	<td>".$itemMahasiswa['email']."</td>\n";
			$result[$index] .= "	<td>".$actionList."</td>\n";
			$result[$index] .= "</tr>\n";
			$index++;
		}
		
		return $result;
	}
	
	/**
	 * Fungsi untuk menghitung jumlah mahasiswa
	 * @param boolean $total Menghitung total mahasiswa atau berdasarkan jurusan
	 * @return array:string,int
	 */
	public function countMahasiswa($total = FALSE){
		
		if(!$total)
			$query = "SELECT tbl_jurusan.namaJurusan, COUNT(`nim`) AS jumlah FROM tbl_mahasiswa, tbl_jurusan WHERE SUBSTR(`nim`,3,4) = tbl_jurusan.nimJurusan AND gelombang = 1 GROUP BY SUBSTR(`nim`,3,4)";
		else 
			$query = "SELECT COUNT(`nim`) AS jumlah FROM tbl_mahasiswa WHERE gelombang = 1";
				
		$result = $this->db->query($query);
	
		$index = 0;
		$query_result = array();
	
		foreach ($result->result_array() as $row){
			$query_result[$index] = $row;
			$index++;
		}
	
		return $query_result;
	}
	
	/**
	 * Fungsi untuk menghitung jumlah mahasiswa berdasarkan status
	 * @param boolean $status Status mahasiswa yang akan dihitung
	 * @return array:string,int
	 */
	public function countMahasiswabyStatus($status = "confirmed"){
	
		if($status == "confirmed")
			$query = "SELECT COUNT(`nim`) AS jumlah FROM tbl_mahasiswa WHERE status = 1 AND gelombang = 1";
		else
			$query = "SELECT COUNT(`nim`) AS jumlah FROM tbl_mahasiswa WHERE status = 0 AND gelombang = 1";
	
		$result = $this->db->query($query);
	
		return $result->result_array();
	}
	
	/**
	 * Fungsi untuk mendapatkan array mahasiswa
	 * @param string $nim
	 * @return Mahasiswa
	 */
	public function getMahasiswabyNim($nim){
	
		$result = $this->db->get_where('tbl_mahasiswa', array('nim'=>$nim), 1);
	
		$row = $result->row_array();
		return $row;
	}
	
	/**
	 * Fungsi untuk menambahkan mahasiswa
	 * @return NULL|string
	 */
	public function daftarMahasiswa() {
		$this->nim = $this->input->post('nim');
		$this->nama = $this->input->post('name');
		$this->phone = $this->input->post('phone');
		$this->status = $this->input->post('status');
		$this->keterangan = $this->input->post('keterangan');
		
		if($this->status == 0){
			$this->email = $this->input->post('email');
			$query = $this->db->insert('tbl_mahasiswa', array('nim'=>$this->nim, 'nama'=>$this->nama, 'nohp'=>$this->phone, 'status'=>$this->status, 'email'=>$this->email, 'keterangan'=>$this->keterangan, 'gelombang'=>'1'));
		}else if($this->status == 1){
			$this->nobri = $this->input->post('nobri');
			$query = $this->db->insert('tbl_mahasiswa', array('nim'=>$this->nim, 'nama'=>$this->nama, 'nohp'=>$this->phone, 'status'=>$this->status, 'nobri'=>$this->nobri, 'keterangan'=>$this->keterangan, 'gelombang'=>'1'));
		}
		
		if($this->db->affected_rows() != 0){
			return null;
		} else{
			return "Data gagal ditambahkan : ".$this->db->error;
		}
	}
	
	
	/**
	 * Fungsi untuk menghapus mahasiswa yang sudah ada
	 * @param string $nim
	 * @return string
	 */
	public function deleteMahasiswa(){
		$nim = $this->input->post('nim');
		$this->db->delete('tbl_mahasiswa', array('nim'=>$nim));
	
		if($this->db->affected_rows() != 0){
			
		}else return $this->db->error;
		return "ok";
	}
}
?>