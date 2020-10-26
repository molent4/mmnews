<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class DashboardController extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email')){
				redirect('login');
			}
		}

		public function index(){
			$data['title'] = 'Dashboard';
			$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
			// echo "Selamat Datang " . $data['user']['name'];

			$data['berita_artikel']= $this->db->get('artikel');
			$data['berita_slide']= $this->db->get('berita_slider');
			$data['berita_video']= $this->db->get('bertia_video');
			$data['pegawai'] = $this->db->get_where('user',['role_id' => 2]);
			$this->template->load('template','dashboard',$data);

		}
	}