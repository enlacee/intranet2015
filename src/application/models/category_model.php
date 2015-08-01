<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('id, name');
        $this->db->from('category');
        $this->db->order_by('name', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result();
        } 
    }

    public function all_modal()
    {        
        $this->db->from('category');
        $this->db->order_by('name', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result();
        } 
    }

    public function create()
    {
        $data = array(          
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'status' => $this->input->post('status')
            );
        $this->db->insert('category', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
        return $this->db->affected_rows();
    }
}