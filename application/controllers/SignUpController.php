<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class SignUpController extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('User');
			$this->load->library('form_validation');
		}

		public function daftar(){
		$this->form_validation->set_rules('nama','Nama','required|trim');
  		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|trim');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('daftar');
			}
			else{
				$this->simpan();
			}
		}
		public function simpan(){
		if($this->form_validation->run() == false){
			$this->template->load('daftar');
		}
		else{
			$role = 2;
			$data = array(
				'nama' => $this->input->post('nama'),
				'image' => 'default.png',
				'role_id' => $role,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'no_tlp' => $this->input->post('no_tlp')
			);
			$this->User->insert($data);
			$this->session->set_flashdata('message','<div class="callout callout-success" style="margin:0 8px;">
			<h4>Selamat!</h4>
			<p>Berhasil Mendaftarkan Akun!</p>
		  </div>');
		  redirect('login');
		}
	}
	}
 ?>