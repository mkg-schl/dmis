<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reqproduct_model extends CI_Model {

	private $table = "reqproductrecord";
	public function __construct() {
        parent::__construct();

        // create table if it doesn't exist 
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'reqproductId' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'productId' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'reqproductQuantity' => array(
                'type' => 'INT',
                'constraint' => 20,
                ),  
                'reqDateTime' => array(
                'type' => 'DATETIME',
                //'constraint' => 100,
                ),
                'reqproductStatus' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),              
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('reqproductId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }

    //product table
    public function reqproductList()
    {
        $this->db->select('*');
        $query = $this->db->get('reqproductrecord');
        return $query->result();
    }

    public function approveProductReq($data = [])
    {
        return $this->db->select('*')->from($this->table)->where('reqproductId', $data)->get()->row();
    }

    public function updateReqproductRecord($data = [])
    {
        $reqproductss = $this->db->select('*')->from($this->table)->where('reqproductId', $data['reqproductId'])->get()->row();
        $query = $this->db->query('update productrecord set productQuantity = (productQuantity - '.$reqproductss->reqproductQuantity.') where productId = "'.$reqproductss->productId.'"');
        return $this->db->where('reqproductId', $data['reqproductId'])->update($this->table,$data);
    }

    public function createrequest($data = [])
    {
		return $this->db->insert($this->table, $data);
	}

}