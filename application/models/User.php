<?php
class User extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListUser(){
        return $this->db->get('user')->result();
    }
    public function insert($data){
        $result = $this->db->insert('user',$data);
        return $result;
    }
    public function delete($id_user){
        $this->db->where('id_user',$id_user);
        $result = $this->db->delete('user');
        return $result;
    }
    public function getDataUser($id_user){
        $this->db->where('id_user',$id_user);
        return $this->db->get('user')->row_array();
    }
    public function update($id_user){ 
        $data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp')
		);
        $this->db->where('id_user',$id_user);
        $result = $this->db->update('user',$data);
        return $result;
    }

    public function updateProfile($id_user,$image){
        $data = array(
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'no_tlp' => $this->input->post('phone'),
            'image' => $image
        );
        $this->db->where('id_user',$id_user);
        $result = $this->db->update('user',$data);
        return $result;
    }

    public function changePassword($id_user,$newPassword){
        $data = array(
            'password' => md5($newPassword)
        );
        $this->db->where('id_user',$id_user);
        $result = $this->db->update('user',$data);
        return $result;
    }
}
?>