<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    private $table = "category";

    public function getCategoryName(){
        return $this->db->select('*')->from($this->table)->get()->result();
    }  
      

}