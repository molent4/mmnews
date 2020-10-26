<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class search extends CI_Model
    {
        public function get_all(){
			return $this->db->get('search')->result();
		}
		public function get_title_keyword($keyword){
			$dataArtikel = $this->db->select('*')
							  ->from('artikel a')
							  ->join('kategoriberita k', 'a.id_kategor=k.id_kategor', 'inner')
							  ->like('a.judul_artikel',$keyword)
							  ->or_like('k.nama_kategori',$keyword)
							  ->limit('5', '0')
							  ->get();
			$data = $dataArtikel->result();
			for($i=0; $i<sizeOf($data); $i++){
				$string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
				$data[$i]->isi_artikel = HuffmanCoding::decode($string);
			return $data;
			}
		}
    }

?>