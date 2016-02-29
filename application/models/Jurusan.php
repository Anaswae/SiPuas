<?php
/**
 * Kelas untuk model Jurusan
 * @author Soliloquy
 *
 */
class jurusan extends CI_Model{
	
	private $id, $namaJurusan, $nimJurusan;
	
	/**
	 * Fungsi untuk menambahkan jurusan
	 * @return string
	 */
	public function tambahJurusan(){
		$this->id = $this->input->post('id');
		$this->namaJurusan = $this->db->escape($this->input->post('namaJurusan'));
		$this->nimJurusan = $this->db->escape(substr($this->input->post('nimJurusan'), 3, 4));
		
		$this->db->insert('tbl_jurusan', array('id'=>$this->id, 'namaJurusan'=>$this->namaJurusan, 'nimJurusan'=>$this->nimJurusan));
		
		if($this->db->affected_rows() != 0){
			return "ok";
		}else return $this->db->error;
	}
	
	/**
	 * Fungsi untuk mendapatkan semua data jurusan
	 * @return multitype:Jurusan Array dari semua record Jurusan 
	 */
	public function getJurusan(){
		$result = $this->db->get('tbl_jurusan');

		$index = 0;
		$query_result = array();
		
		foreach ($result->result_array() as $row){
			$query_result[$index] = $row;
			$index++;
		}
		
		return $query_result;
	}
	
	/**
	 * Fungsi untuk mendapatkan Jurusan berdasarkan nama jurusannya
	 * @param string $namaJurusan
	 * @return array:Jurusan 
	 */
	public function getJurusanbyName($namaJurusan){
		
		$result = $this->db->get_where('tbl_jurusan', array('namaJurusan'=>$namaJurusan), 1);
		return $result->row_array();
	}
	
	/**
	 * Fungsi untuk mendapatkan Jurusan berdasarkan id jurusan
	 * @param int $id
	 * @return array:Jurusan
	 */
	public function getJurusanbyId($id){
		$result = $this->db->get_where('tbl_jurusan', array('id'=>$id), 1);
		return $result->row_array();
	}
}
?>