<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBerita extends CI_Model
{
	private $_table = "kategoriberita";
	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}