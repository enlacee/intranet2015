<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('p.id, p.name, c.name as category');
        $this->db->from('product AS p');
        $this->db->join('category AS c', 'c.id = p.id_category', 'inner'); 
        $this->db->order_by('p.id', 'desc');    
        $listproducts = $this->db->get();
        if ($listproducts->num_rows() > 0) {
            return $listproducts->result();
        }   
    }

    public function create($dataPost = array())
    {
        if (count($dataPost)>0){
            $data = $dataPost;
        } else {
            $data = array(          
                'id_category' => $this->input->post('id_category'),                        
                'id_supplier' => $this->input->post('id_supplier'),
                'name' => $this->input->post('nameproduct'),                        
                'description' => $this->input->post('description')
                );
        }

        $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    public function edit($id)
    {        
        $this->db->where('id', $id);
        $product = $this->db->get('product');
        if ($product->num_rows() > 0) {
            return $product->row();
        }
    }

    public function update($id)
    {
        $data = array(          
            'id_category' => $this->input->post('id_category'),                        
            'id_supplier' => $this->input->post('id_supplier'),
            'name' => $this->input->post('nameproduct'),                        
            'description' => $this->input->post('description')
            );
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('delete', 1);
        }        
    }
    
}