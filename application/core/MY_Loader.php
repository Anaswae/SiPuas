<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Loader extends CI_Loader {
	
	public function template($template_name, $vars, $return = FALSE){
		$this->view('skin/header', $vars, $return);
		$this->view($template_name, $vars, $return);
		$this->view('skin/footer', $vars, $return);
	}
	
	public function cek_sesi($enableRedirect = true){	
		if(isset($_SESSION['id'])){
			return true;
		}else{
			$url = explode("/daftarbri", $_SERVER['REQUEST_URI'], 2);
			if ($enableRedirect)
				header("Location:".site_url('control_autentikasi/index/?url='.urlencode($url[1])));
		}
		return false;
	}
}