<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_autentikasi extends CI_Controller{
	
	public function index(){
		if($this->load->cek_sesi(false)){
			$this->output->set_header("Location: ".site_url("/control_administrasi"));
			return;
		}
		if($this->input->get('url') !== null)
			$data['location'] = htmlspecialchars($this->input->get('url'));
		$data['useSimple'] = true;
		$data['pageTitle'] = "Halaman Login Daftar BRI FSM Undip";
		$this->load->template_admin("form_login", $data);
	}
	
	public function login(){
		$data['pageTitle'] = "Halaman Login Daftar BRI FSM Undip";
		$data['useSimple'] = true;
		if($this->input->post('location') !== null)
			$data['location'] = $this->input->post('location');
		
		if ($this->form_validation->run() == FALSE){
			
		}else{
			$this->load->model("admin");
			$data['errors'] = $this->admin->adminLogin();
			if (empty($data['errors']) && $this->input->post('location') == "")
				header("Location:".site_url("control_administrasi/dashboard"));
			if (empty($data['errors']) && $this->input->post('location') != "")
				header("Location:".base_url($this->input->post('location')));
		}
		$this->load->template_admin("form_login", $data);
	}
	
	public function ubah_password(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->library('encryption');
		$data['id'] = $this->encryption->encrypt($this->session->id);
		$data['pageTitle'] = "Ubah Password";
		if ($this->form_validation->run() == FALSE){
			
		}else {
			$this->load->model('admin');
			$data['errors'] = $this->admin->changePassword();
			if (empty($data['errors']))
				$data['submitSukses'] = "Password berhasil diubah";
		}
		$this->load->template_admin("ubah_password", $data, true);
	}
	
	public function ubah_email(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->library('encryption');
		$data['id'] = $this->encryption->encrypt($this->session->id);
		$data['pageTitle'] = "Ubah Email";
		if ($this->form_validation->run() == FALSE){

		}else {
			$this->load->model('admin');
			$data['errors'] = $this->admin->changeEmail();
			if (empty($data['errors']))
				$data['submitSukses'] = "Email berhasil diubah";
		}
		$this->load->template_admin("ubah_email", $data, true);
	}
	
	public function reset_password(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->load->model('admin');
		$data['admin'] = $this->admin->getAdminJurusan();
		$data['pageTitle'] = "Reset Password";
		$data['activePage'] = "reset";
		if ($this->form_validation->run() == FALSE){
		
		}else {
			$data['errors'] = $this->admin->resetPassword();
			if (empty($data['errors']))
				$data['submitSukses'] = "Password berhasil diubah";
		}
		$this->load->template_admin("reset_password", $data, true);
	}
	
	public function request_lupa_password(){
		// Genereate link reset password
		$this->load->model('admin');
		$this->load->model('reset_password');
		$data['pageTitle'] = "Reset Password";
		$data['useSimple'] = true;
		
		if(isset($_POST['submit'])){
			$email = $this->admin->cekEmail();
			
			if($email !== 0){
				$dataAdmin = $this->admin->getAdminbyEmail($email);
				$tujuanEmail = $dataAdmin->email;
				$kontenEmail = $this->reset_password->sendRequestKey($tujuanEmail);
					
				// Kirim email
				$this->load->library('email');
					
				$this->email->from('panitia@carakafest.org', 'MSDNAA FSM');
				$this->email->to($tujuanEmail);
					
				$this->email->subject("[MSDNAA FSM] Reset Password");
				$this->email->message($kontenEmail);
					
				$berhasil = $this->email->send();
					
				$reportToLog = "\r\n[".date('j F Y, H:i:s')."]\t: mailto [".$tujuanEmail."]\t: ";
					
				if (!$berhasil) {
					$reportToLog .= "Mailer Error!";
					$data['submitErrors'] = "Maaf, gagal mengirim email";
				} else {
					$reportToLog .= "Message sent...";
					$dateChunk = date("Ymd-His");
					$reportToLog .= "\t[MSDNAA FSM] | [".$dateChunk.".html]";
						
					file_put_contents(APPPATH."/logs/email.log", $reportToLog, FILE_APPEND);
					file_put_contents(APPPATH."/logs/emails/".$dateChunk.".html", $kontenEmail);
						
					$data['submitSukses'] = "Password anda berhasil di-reset. <br>Silahkan periksa email Anda untuk melakukan tahap berikutnya";
				}
			}else{
				$data['submitErrors'] = "Maaf, email anda tidak ditemukan";
			}
		}
		$this->load->template_admin('form_request_lupa', $data);		
	}
	
	public function lupa_password($requestKey = null){
		$data['pageTitle'] = "Reset Password";
		$data['useSimple'] = true;
		
		$now = new DateTime ();
		$sekarang = $now->format ( 'Y-m-d H:i:s' );
		if ($requestKey != null) {
			$this->load->model("reset_password");
			$dataRequest = $this->reset_password->getRequestKey($requestKey);
			if ($dataRequest != null) {
				if (($dataRequest->expiredRequest >= $sekarang) && ($dataRequest->statusRequest == 1)) {
					if (isset($_POST['submit'])) {
						$passBaru1	= ($this->input->post("newPassword"));
						
						if ($this->form_validation->run() == FALSE){
						
						}else {
							$this->load->model("admin");
							$admin = $this->admin->getAdminbyId($dataRequest->idAdmin);	
							$queryResult = $this->admin->set_hashed_password($admin['username'], $passBaru1);
							if ($queryResult == null) {
								$this->reset_password->deactivateKey($requestKey);
								$data['submitSukses'] = "<span class=\"fa fa-check\"></span> Kata sandi berhasil direset.";
								$data['hideForm'] = true;
							} else {
								$data['errors'] = $queryResult;
							}
						}
					} // End if POST
				} else {
					$data['errors'] = "Request sudah tidak berlaku. Silakan request ulang.";
					$data['hideForm'] = true;
				}
			} else {
				$data['errors'] = "Kunci request tidak valid.";
				$data['hideForm'] = true;
			}
		} else {
			$this->output->set_header("Location: ".site_url("/control_autentikasi"));
			return;
		}
		$data['formAction'] = "/control_autentikasi/lupa_password/".$requestKey;
		$this->load->template_admin("reset_lupa_password", $data);
	}

	public function logout(){
		$this->load->model('admin');
		$this->admin->adminLogout();
		$this->output->set_header("Location: ".site_url("/control_autentikasi"));
	}
}