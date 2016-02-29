<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
		'Kuisioner/index' => array(
				array(
						'field' => 'nama',
						'label' => 'Nama',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'umur',
						'label' => 'Umur',
						'rules' => 'trim|required|numeric',
						'errors' => array('required' => "Tolong isikan %s Anda.",
								'numeric' => "Umur hanya boleh berisi angka."
						)
				),
				array(
						'field' => 'pendidikan',
						'label' => 'Pendidikan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				),
				array(
						'field' => 'pekerjaan',
						'label' => 'Pekerjaan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				)
		),
		'Kuisioner/index' => array(
				
		),
		'control_pendaftaran/pendataan' => array(
				array(
						'field' => 'nim',
						'label' => 'NIM',
						'rules' => 'trim|required|exact_length[14]|is_unique[tbl_mahasiswa.nim]|is_natural',
						'errors' => array(
								'required' => "Tolong isikan %s anda.",
								'exact_length' => "%s harus berisi %s karakter.",
								'is_unique' => "Maaf, %s Sudah terdaftar.",
								'is_natural' => "%s hanya boleh berisi angka"
						)
				),
				array(
						'field' => 'name',
						'label' => 'Nama',
						'rules' => 'trim|required|alpha_numeric_spaces',
						'errors' => array(
								'required' => "Tolong isikan %s anda.",
								'alpha_numeric_spaces' => "%s hanya diizinkan berupa alphanumerik."
						)
				),
				array(
						'field' => 'phone',
						'label' => 'Nomer Telpon',
						'rules' => 'trim|required|numeric',
						'errors' => array(
								'required' => "Tolong isikan %s anda.",
								'numeric' => "%s hanya diizinkan berupa angka."
						)
				),
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'trim|valid_email',
						'errors' => array(
								'valid_email' => "%s Anda tidak valid."
						)
				),
				array(
						'field' => 'nobri',
						'label' => 'No. BRI',
						'rules' => 'trim|exact_length[16]|is_natural',
						'errors' => array(
								'exact_length' => "Panjang %s harus 16 karakter.",
								'is_natural' => "%s hanya boleh berisi angka."
						)
				)
		),
		'control_autentikasi/login' => array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		),
		'control_autentikasi/ubah_password' => array(
				array(
						'field' => 'oldPassword',
						'label' => 'Password Lama',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'newPassword',
						'label' => 'Password Baru',
						'rules' => 'required|matches[newPasswordConf]',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'matches' => "%s dan Konfirmasi Password harus sesuai."
						)
				),
				array(
						'field' => 'newPasswordConf',
						'label' => 'Konfirmasi Password Baru',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		),
		'control_autentikasi/ubah_email' => array(
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'newEmail',
						'label' => 'Email Baru',
						'rules' => 'trim|required|matches[newEmailConf]|valid_email|is_unique[tbl_admin.email]',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'matches' => "%s dan Konfirmasi Email harus sesuai.",
								'is_unique' => "Maaf, %s Sudah terdaftar.",
								'valid_email' => "%s Anda tidak valid."
						)
				),
				array(
						'field' => 'newEmailConf',
						'label' => 'Konfirmasi Email Baru',
						'rules' => 'trim|required|valid_email',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'valid_email' => "%s Anda tidak valid."
						)
				)
		),
		'control_autentikasi/reset_password' => array(			
				array(
						'field' => 'newPassword',
						'label' => 'Password Baru',
						'rules' => 'trim|required|matches[newPasswordConf]',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'matches' => "%s dan Konfirmasi Password harus sesuai."
						)
				),
				array(
						'field' => 'newPasswordConf',
						'label' => 'Konfirmasi Password Baru',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		),
		'control_autentikasi/request_lupa_password' => array(
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'trim|required|valid_email',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'valid_email' => "%s Anda tidak  valid."
						)
				)
		),
		'control_autentikasi/lupa_password' => array(
				array(
						'field' => 'newPassword',
						'label' => 'Password Baru',
						'rules' => 'trim|required|matches[newPasswordConf]',
						'errors' => array(
								'required' => "Tolong isikan %s Anda.",
								'matches' => "%s dan Konfirmasi Password harus sesuai."
						)
				),
				array(
						'field' => 'newPasswordConf',
						'label' => 'Konfirmasi Password Baru',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		)
);