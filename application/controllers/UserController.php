<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UserController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->library('form_validation');
		if ($this->session->role_id != 1) {
			redirect('landingpage');
		}
	}
	public function index() { 
		$data['title']="Manajemen User";
        $data['dataUser'] = $this->User->getListUser();
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
  		$this->template->load('template','user/index',$data);
		}
	public function create(){
		$data['title']="Manajemen User";
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
  		$this->template->load('template','user/create',$data);
	}
	public function store(){
		$dataLogin['title'] = "Manajemen User";
		$dataLogin['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'Nama harus diisi!'
		]);

		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'required' => 'Email harus diisi!',
			'valid_email' => 'Email tidak valid!',
			'is_unique' => 'Email sudah digunakan!'
		]);

		$this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim|numeric',[
			'required' => 'Nomor Telepon harus diisi!',
			'numeric' => 'Nomor Telepon harus semua angka!'
		]);

		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|trim',[
			'required' => 'Jenis Kelamin harus diisi!'
		]);

		$this->form_validation->set_rules('alamat','Alamat','required|trim',[
			'required' => 'Alamat harus diisi!'
		]);

		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]',[
			'required' => 'Password harus diisi!',
			'min_length' => 'Password minimal diisi dengan 6 character!'
		]);

		if($this->form_validation->run() == false){
			$this->template->load('template','user/create',$dataLogin);
		}
		else{
			$role = 1;
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
			<p>User berhasil ditambahkan!</p>
		  </div>');
		  redirect('user');
		}
	}
	public function delete(){
		$result = $this->User->delete($this->input->post('id_user'));
		echo json_encode($result);
	}	  
	public function edit($id_user){
		$data['title']="Manajemen User";
		$data['dataKaryawan'] = $this->User->getDataUser($id_user);
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
  		$this->template->load('template','user/edit',$data);
	}
	public function update($id_User){
		$data['title'] = 'Manajemen User';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['dataKaryawan'] = $this->User->getDataUser($id_User);
		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'Nama tidak boleh kosong!'
		]);

		if($this->form_validation->run() == false){
			$this->template->load('template','user/edit',$data);
		}
		else{
			$this->User->update($id_User);
			$this->session->set_flashdata('message','<div class="callout callout-success" style="margin:0 8px;">
			<h4>Selamat!</h4>
			<p>Data berhasil disimpan!</p>
		  </div>');
			redirect('user/' . $id_User);
		}
		// $result = $this->User->update($id_user);
		// echo json_encode($result);
	}
}
?>