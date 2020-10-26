<?php
class BeritaVideo extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertData($filename, $id)
    {
        $data = array(
            'nama_berita' => $this->input->post('nama_berita'),
            'nama_video' => $filename,
            'konten_video' => $this->input->post('konten_berita'),
            'tangggal_video' => date('Y-m-d'),
            'id_kategori' => $this->input->post('id_kategor'),
            'id_user' => $id
        );

        $this->db->insert('bertia_video', $data);
    }

    public function getAllData()
    {

        $data = $this->db->select('*')
            ->from('bertia_video b')
            ->join('kategoriberita k', 'b.id_kategori=k.id_kategor', 'left')
            ->join('user u', 'b.id_user=u.id_user', 'left')
            ->get();
        return $data->result();
    }

    public function delete($id_berita)
    {
        $this->db->where('id_video', $id_berita);
        $result = $this->db->delete('bertia_video');
        return $result;
    }

    public function getDataById($id){
        $this->db->where('id_video',$id);
        $result = $this->db->get('bertia_video')->row_array();
        return $result;
    }

    public function updateData($id_berita,$filename){
        $data = array(
            'nama_berita' => $this->input->post('judul'),
            'nama_video' => $filename,
            'konten_video' => $this->input->post('konten_berita'),
            'id_kategori' => $this->input->post('id_kategor')
        );
        $this->db->where('id_video',$id_berita);
        $result = $this->db->update('bertia_video',$data);
        return $result;
    }
}
