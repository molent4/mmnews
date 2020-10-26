<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		// is_logged_in();
	}


	public function index()
	{
		$data['title'] = "My Profile";
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->template->load('template','profile/index',$data);
	}

	public function edit(){
		$data['title'] = "My Profile";
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->template->load('template','profile/edit',$data);
	}

	public function update(){

		$dataLogin['title'] = 'My Profile';
		$dataLogin['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		// $this->form_validation->set_rules('nama','Nama','required|trim',[
		// 	'required' => 'Nama harus diisi!'
		// ]);

		// if($this->form_validation->run() == false){
		// 	$this->template->load('template','profile/edit',$dataLogin);
		// }
		// else{
			if(empty($_FILES['compressImage']['name'])){
				$image = $dataLogin['user']['image'];
				$this->User->updateProfile($dataLogin['user']['id_user'],$image);
				$this->session->set_flashdata('message','<div class="callout callout-success" style="margin:0 0 8px;;">
			<h4>Selamat!</h4>
			<p>Data berhasil disimpan!</p>
		  </div>');
				redirect('profile/edit');
			}
			else{
				$filename = $_FILES['compressImage']['name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$image = date("mdY") . "_" . time() . "." . $file_ext;
				$this->data_upload($dataLogin['user']['id_user'],$image);
			}
		// }
	}

	public function password(){
		$data['title'] = "My Profile";
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->template->load('template','profile/change_password',$data);
	}

	public function data_upload($id_user,$image){

		$config['upload_path'] = './assets/public/imageupload/user';
		$config['allowed_types'] = 'jpg|png';
		$config['file_name'] = $image;
		$config['overwrite'] = true;
		$config['max_size'] = 2048;

		$this->load->library('upload',$config);
		if(! $this->upload->do_upload('compressImage')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','<div class="callout callout-danger" style="margin:0 8px;">
			<h4>Perhatian!</h4>
			<p>'. $error['error'] .'</p>
		  </div>');
		  redirect('profile/edit');

		}
		else{
			$this->User->updateProfile($id_user,$image);
			$this->session->set_flashdata('message','<div class="callout callout-success" style="margin:0 0 8px;">
			<h4>Selamat!</h4>
			<p>Data berhasil disimpan!</p>
		  </div>');
		  redirect('profile/edit');
		}


	}

	public function setPassword(){
		$dataLogin['title'] = 'My Profile';
		$dataLogin['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('oldPassword','Password Lama','required|trim',[
			'required' => 'Password lama harus diisi!'
		]);

		$this->form_validation->set_rules('newPassword','Password Baru','required|trim|min_length[6]',[
			'required' => 'Password baru harus diisi!',
			'min_length' => 'Password minimal terdiri dari 6 character!'
		]);

		if($this->form_validation->run() == false){
			$this->template->load('template','profile/change_password',$dataLogin);
		}
		else{
			$oldPassword = $this->input->post('oldPassword');
			$newPassword = $this->input->post('newPassword');

			if(md5($oldPassword) != $dataLogin['user']['password']){
				$this->session->set_flashdata('message','<div class="callout callout-danger" style="margin:0 0 8px;">
			<h4>Perhatian!</h4>
			<p>Password lama anda salah!</p>
		  </div>');
				redirect('profile/password');
			}
			else{
				$this->User->changePassword($dataLogin['user']['id_user'],$newPassword);
				$this->session->set_flashdata('message','<div class="callout callout-success" style="margin:0 0 8px;">
			<h4>Selamat!</h4>
			<p>Password anda berhasil diperbaharui!</p>
		  </div>');
				redirect('profile/password');
			}
		}

	}
}

