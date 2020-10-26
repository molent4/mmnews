<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class LandingPageController extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('LandingPage');
			$this->load->model('Artikel');
			$this->md_landingPage = $this->LandingPage;
		}
		public function navbar(){
			$cek = $this->uri->segment('3');
			switch ($cek) {
				case 'home':
					$data['artikel'] = $this->md_landingPage->list_artikel();
					$data['video'] = $this->md_landingPage->list_video();	
					$this->load->view('landing_page/index', $data);
					break;
				case 'GayaHidup':
					$data['gayahidup'] = $this->md_landingPage->list_dewataNews();
					$data['gayahidupVideo'] = $this->md_landingPage->video_dewataNews();
					$this->load->view('landing_page/gayahidup',$data);
					break;
				case 'Olahraga':
					$data['olahraga'] = $this->md_landingPage->list_dewataSport();
					$data['olahragaVideo'] = $this->md_landingPage->video_dewataSport();
					$this->load->view('landing_page/olahraga',$data);
					break;
				case 'Politik':
					$data['politik'] = $this->md_landingPage->list_dewataFood();
					$data['politikVideo'] = $this->md_landingPage->video_dewataFood();	
					$this->load->view('landing_page/politik',$data);
					break;
				case 'Teknologi':
					$data['teknologi'] = $this->md_landingPage->list_dewataHealth();
					$data['teknologiVideo'] = $this->md_landingPage->video_dewataHealth();
					$this->load->view('landing_page/teknologi',$data);
					break;

				case 'Login':
					redirect('login');
						break;
				default:
					redirect( base_url() );
					break;
			}
		}

		public function sliderPage(){
			$this->load->view('landing_page/sliderPage');
		}

		public function showDetailArtikel($id_artikel){
			$data['detailArtikel'] = $this->md_landingPage->viewArtikelByID($id_artikel);
			$this->load->view('landing_page/singlePage', $data);
			//print_r($data['detailArtikel']);
		}

		public function showDetailVideo($id_video){
			$data['detailVideo'] = $this->md_landingPage->viewVideoByID($id_video);
			$this->load->view('landing_page/videoPage', $data);
			//print_r($data['detailArtikel']);
		}
		public function index()
		{
			$data['artikel'] = $this->md_landingPage->list_artikel();
			$data['video'] = $this->md_landingPage->list_video();	
			$this->load->view('landing_page/index',$data);
		}
	}
 ?>