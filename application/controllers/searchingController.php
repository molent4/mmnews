<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


	class searchingController extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('search');
		}
        public function index(){
			$data['berita']=$this->get_all();
			$this->load->view('searching',$data);
		}

		public function search(){
			$keyword = $this->input->post('judul');
			$data['berita']=$this->search->get_title_keyword($keyword);
			$this->load->view('searching',$data);
		}
    }
?>