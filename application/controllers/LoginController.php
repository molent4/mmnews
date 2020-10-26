<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class LoginController extends CI_Controller
	{

		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
		}
		
		public function index(){
			if ($this->session->role_id != NULL) {
				$temp = $this->session->role_id;
				if($temp == 1){
					redirect('admin');
				}
				else{
					redirect('landingpage');
				}
			} else {
				$this->load->view('login');
			}
		}

		public function login(){

			$this->form_validation->set_rules('email','Email','required|trim|valid_email');
			$this->form_validation->set_rules('password','Password','required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('login');
			}
			else{
				$this->_login();
			}
		}

		private function _login(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user',['email' => $email])->row_array();

			if ($user) {
				if (md5($password) == $user['password']) {
					$this->session->set_userdata($user);

					if($user['role_id'] == 1){
						redirect('admin');
					}
					else{
						redirect('landingpage');
					}
					
				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('login/auth');
				}
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
				redirect('login/auth');
			}
		}

		public function logout(){
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');
			redirect('LandingPageController/index');
		}
	}
 ?>