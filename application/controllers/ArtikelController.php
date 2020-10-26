<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArtikelController extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Artikel');
		$this->load->model('KategoriBerita');
		$this->load->library('form_validation');
		
		if ($this->session->role_id != 1) {
				redirect('landingpage');
			}

	}
	public function index()
	{

		$data['artikel'] = $this->Artikel->getAll();
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$data['title'] = "Berita Artikel";
		$this->template->load('template','berita_artikel/index',$data);
	}

	public function create()
	{

		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['kategoriBerita'] = $this->KategoriBerita->getAll();
		$data['title'] = "Berita Artikel";
		$this->template->load('template','berita_artikel/create',$data);
	}

	public function edit($id=null)
	{

		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "Berita Artikel";
		if (!isset($id)) redirect('berita/artikel');
       
        $artikel = $this->Artikel;
        

        $data["artikel"] = $artikel->getById($id);
        $data['kategoriBerita'] = $this->KategoriBerita->getAll();
        if (!$data["artikel"]) show_404();
        
        $this->template->load('template','berita_artikel/edit', $data);
	}

	public function add(){

		$artikel = $this->Artikel;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $data = $this->session->userdata();

			$this->Artikel->save($data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		
		redirect(base_url('berita/artikel'));
		// $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		// $this->template->load('template','berita_artikel/index',$data);

	}

	public function update(){
		$artikel = $this->Artikel;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
			$this->Artikel->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		
		
		redirect(base_url('berita/artikel'));
	}

	

	public function delete($id=null)
	{
	    if (!isset($id)) show_404();
	        
	    if ($this->Artikel->delete($id)) {
	        
		redirect(base_url('berita/artikel')); 
	    }
	}
}