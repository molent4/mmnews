<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class SlideController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('BeritaSlide');
		if ($this->session->role_id != 1) {
            redirect('landingpage');
        }
	}

	public function index()
	{
		$data['title'] = "Berita Slide";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->template->load('template', 'berita_slide/index', $data);
	}

	public function create()
	{
		$data['title'] = "Berita Slide";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->BeritaSlide->getCategory();
		$this->template->load('template', 'berita_slide/create', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim', [
			'required' => '*Judul berita harus diisi!'
		]);

		$this->form_validation->set_rules('file', 'Gambar Berita', 'required|trim', [
			'required' => '*Gambar berita harus diisi!'
		]);

		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|trim', [
			'required' => '*Isi berita harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Berita Slide";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['kategori'] = $this->BeritaSlide->getCategory();
			$this->template->load('template', 'berita_slide/create', $data);
		} else {
			echo "Data terisi semua";
		}
	}

	public function uploadImage($filename)
	{
		$config['upload_path'] = './assets/public/imageupload/slider';
		$config['allowed_types'] = 'jpg|png';
		$config['file_name'] = $filename;
		$config['overwrite'] = true;
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', '<div class="callout callout-danger" style="margin:0 8px;">
			<h4>Perhatian!</h4>
			<p>' . $error['error'] . '</p>
		  </div>');
			redirect('berita_slide/create');
		}
		else{

			echo "sukses";
		}
		
	}
}
