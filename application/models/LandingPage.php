<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Model{
	private $_table = "artikel";


	function __construct()
    {
		parent::__construct();
        $this->load->library('HuffmanCoding');
        $this->load->helper('file');

    }
	public function list_artikel(){		
		$dataArtikel = $this->db->select('*')
							  ->from('artikel a')
							  ->join('kategoriberita k', 'a.id_kategor=k.id_kategor', 'left')
							  ->limit('5', '0')
							  ->order_by('date_created', 'DESC')
							  ->get();
		$data = $dataArtikel->result();
		for($i=0; $i<sizeOf($data); $i++){
			$string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
			$data[$i]->isi_artikel = HuffmanCoding::decode($string);
			
		}
        return $data;	 
	}
	
	public function viewArtikelByID($id_artikel){
		$dataArtikel = $this->db->select('*, a.image, a.date_created, u.image as image2')
							->from('artikel a')
							->join('user u', 'a.id_user=u.id_user', 'inner')
					     	->where('a.id_artikel',$id_artikel)
					     	->get();
		$data = $dataArtikel->row_array();
            $string = read_file('./assets/public/huffman/'. $data['isi_artikel']);
            $data['isi_artikel'] = HuffmanCoding::decode($string);
        return $data;
	}

	public function viewVideoByID($id_video){
		$dataVideo = $this->db->select('*')
							->from('bertia_video b')
							->join('user u', 'b.id_user=u.id_user', 'inner')
					     	->where('b.id_video',$id_video)
					     	->get();
		return $dataVideo->row_array();
	}

	public function list_dewataNews(){
		$dataNews = $this->db->select('*')
						   ->from('artikel a')
						   ->limit('8', '0')
						   ->order_by('a.date_created', 'DESC')
						   ->where('a.id_kategor', 1)
						   ->get();
		$data = $dataNews->result();
		for($i=0; $i<sizeOf($data); $i++){
            $string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
            $data[$i]->isi_artikel = HuffmanCoding::decode($string);
        }
        return $data;
	}

	public function list_dewataHealth(){
		$dataHealth = $this->db->select('*')
						   ->from('artikel a')
						   ->limit('8', '0')
						   ->order_by('a.date_created', 'DESC')
						   ->where('a.id_kategor', 4)
						   ->get();
		$data = $dataHealth->result();
		for($i=0; $i<sizeOf($data); $i++){
            $string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
            $data[$i]->isi_artikel = HuffmanCoding::decode($string);
        }
        return $data;
	}

	public function list_dewataSport(){
		$dataSport = $this->db->select('*')
						   ->from('artikel a')
						   ->limit('8', '0')
						   ->order_by('a.date_created', 'DESC')
						   ->where('a.id_kategor', 2)
						   ->get();
		$data = $dataSport->result();
		for($i=0; $i<sizeOf($data); $i++){
            $string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
            $data[$i]->isi_artikel = HuffmanCoding::decode($string);
        }
        return $data;
	}

	public function list_dewataFood(){
		$dataFood = $this->db->select('*')
						   ->from('artikel a')
						   ->limit('8', '0')
						   ->order_by('a.date_created', 'DESC')
						   ->where('a.id_kategor', 3)
						   ->get();
		$data = $dataFood->result();
		for($i=0; $i<sizeOf($data); $i++){
            $string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
            $data[$i]->isi_artikel = HuffmanCoding::decode($string);
        }
        return $data;
	}


	public function list_video(){
		$video = $this->db->select('*')
						   ->from('bertia_video bv')
						   ->limit('6', '0')
						   ->order_by('bv.tangggal_video', 'DESC')
						   ->get();
		return $video->result();
	}

	public function video_dewataFood(){
		$dataFood = $this->db->select('*')
						   ->from('bertia_video bv')
						   ->limit('8', '0')
						   ->order_by('bv.tangggal_video', 'DESC')
						   ->where('bv.id_kategori', 3)
						   ->get();
		return $dataFood->result();
	}

	public function video_dewataNews(){
		$dataNews = $this->db->select('*')
						   ->from('bertia_video bv')
						   ->limit('8', '0')
						   ->order_by('bv.tangggal_video', 'DESC')
						   ->where('bv.id_kategori', 1)
						   ->get();
		return $dataNews->result();
	}

	public function video_dewataSport(){
		$dataSport = $this->db->select('*')
						   ->from('bertia_video bv')
						   ->limit('8', '0')
						   ->order_by('bv.tangggal_video', 'DESC')
						   ->where('bv.id_kategori', 2)
						   ->get();
		return $dataSport->result();
	}

	public function video_dewataHealth(){
		$dataHealth = $this->db->select('*')
						   ->from('bertia_video bv')
						   ->limit('8', '0')
						   ->order_by('bv.tangggal_video', 'DESC')
						   ->where('bv.id_kategori', 4)
						   ->get();
		return $dataHealth->result();
	}

}