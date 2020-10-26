<?php
class BeritaSlide extends CI_Model {
    private $image_table = 'foto_slider';
    private $table ='berita_slider';

    public function __construct(){
        parent::__construct();
    }

    public function getCategory(){
        return $this->db->get('kategoriberita')->result();
    }

    
    
    
}
?>