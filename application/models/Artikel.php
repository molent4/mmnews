<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model
{
    private $_table = "artikel";

    public $id_artikel;
    public $id_user;
    public $judul_artikel;
    public $isi_artikel;
    public $image = "default.jpg";
    public $date_created;

    function __construct()
    {
        parent::__construct();
        $this->load->library('HuffmanCoding');
        $this->load->helper('file');

    }
    public function rules()
{
    return [
        ['field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required'],
        
        ['field' => 'editor1',
        'label' => 'Isi Berita',
        'rules' => 'required']
    ];
}


    public function getAll()
    {
        $this->db->join('user','user.id_user = artikel.id_user');
        $this->db->join('kategoriberita','kategoriberita.id_kategor = artikel.id_kategor');
        $this->db->select('
            artikel.id_artikel,
            artikel.judul_artikel, 
            artikel.isi_artikel, 
            artikel.image,
            artikel.date_created,
            kategoriberita.nama_kategori, 
            user.nama');
        $data = $this->db->get($this->_table)->result();
        for($i=0; $i<sizeOf($data); $i++){
            $string = read_file('./assets/public/huffman/'. $data[$i]->isi_artikel);
            $data[$i]->isi_artikel = HuffmanCoding::decode($string);
        }
        return $data;
    }

     public function getById($id)
    {
        $data = $this->db->get_where($this->_table, ["id_artikel" => $id])->row();
        $data->nama = $data->isi_artikel;
        $string = read_file('./assets/public/huffman/'. $data->isi_artikel);
        $data->isi_artikel = HuffmanCoding::decode($string);
        
        return $data;
    }
    
    public function save($user)
    {
        $image="dafault.jpg";
        if(!empty($_FILES["compressImage"]["name"])){
            $filename = $_FILES['compressImage']['name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $image = date("mdY") . "_" . time() . "." . $file_ext;
        }
        
        $post = $this->input->post();

        $encoding = HuffmanCoding::createCodeTree ($post['editor1']);
        $encoded = HuffmanCoding::encode ($post['editor1'], $encoding);

        $tanggal = date("mdY") . "_" . time() . ".txt";
        $this->load->helper('file');

            if ( ! write_file('./assets/public/huffman/'. $tanggal, $encoded))
            {
                    echo 'Unable to write the file';
            }

        $this->id_user = $user['id_user'];
        $this->judul_artikel = $post["judul"];
        $this->isi_artikel= $tanggal;
        $this->id_kategor = $post["id_kategor"];
        $this->image=$this->_uploadImage($image);
        $this->date_created = date("Y-m-d H:i:s");
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $data = array(
            'id_artikel' => $post['id'],
            'judul_artikel' => $post['judul'],
            'id_kategor' => $post['id_kategor'],
            'isi_artikel' => $post['editors']
        );
        $idartikel=$post['id'];
        $alamat = $post['editors'];
        $encoding = HuffmanCoding::createCodeTree ($post['editor1']);
        $encoded = HuffmanCoding::encode ($post['editor1'], $encoding);

            if ( ! write_file('./assets/public/huffman/'. $alamat, $encoded))
            {
                    echo 'Unable to write the file';
            }

        if(!empty($_FILES["image"]["name"])){
            //$this->_deleteImage($idartikel);
            $filename = $_FILES['image']['name'];
            $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
            $image = date("mdY") . "_" . time() . "." . $file_ext;
            $data['image'] = $this->_uploadImage($image);
        }
        // $this->id_artikel = $post["id"];
        // $this->judul_artikel = $post["judul"];
        // $this->isi_artikel = $post["editor1"];

        // $this->db->update($this->_table, $this, array('id_artikel' => $post['id']));

        $this->db->where('id_artikel',$post['id']);
        $this->db->update('artikel',$data);

    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        $this->_Txtdelete($id);
        return $this->db->delete($this->_table, array("id_artikel" => $id));
    }

    private function _deleteImage($id)
    {
        $artikel = $this->getById($id);
        if ($artikel->image != "default.jpg") {
            $filename = explode(".", $artikel->image)[0];
            return array_map('unlink', glob(FCPATH."assets/public/imageupload/$filename.*"));
        }
    }

    private function _Txtdelete($id)
    {
        $artikel = $this->getById($id);
            $filename = explode(".", $artikel->nama)[0];
            return array_map('unlink', glob(FCPATH."assets/public/huffman/$filename.*"));
    
    }

    private function _uploadImage($image)
    {
        $config['upload_path']          = './assets/public/imageupload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $image;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('compressImage')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }


}