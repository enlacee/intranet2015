<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buyer_Model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('b.id, b.name, c.name AS country, b.telephone, b.ruc');
        $this->db->from('buyer AS b');
        $this->db->join('country AS c', 'c.id = b.country', 'inner'); 
        $this->db->order_by('b.id', 'desc');    
        $listbuyer = $this->db->get();
        if ($listbuyer->num_rows() > 0) {
            return $listbuyer->result();
        }   
    }

    public function create()
    {
        $data = array(          
            'name' => $this->input->post('namebuyer'),                        
            'ruc' => $this->input->post('ruc'),
            'address' => $this->input->post('address'),
            'web' => $this->input->post('web'),
            'fax' => $this->input->post('fax'),
            'country' => $this->input->post('country'),
            'telephone' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'description' => $this->input->post('description')
            );
        $this->db->insert('buyer', $data);
        return $this->db->insert_id();
    }    

    public function edit($id)
    {
        $this->db->select('id, name, ruc, address, web, fax, country, telephone, email, description');
        $this->db->where('id', $id);
        $buyer = $this->db->get('buyer');
        if ($buyer->num_rows() > 0) {
            return $buyer->row();
        }
    }

    public function create_credit($id)
    {
        $data = array(          
            'id_buyer' => $id,
            'cred_lin1' => (double)str_replace(',', '', $this->input->post('cred_1')),
            'id_supplier1' => $this->input->post('supplier1'),                                                    
            'cred_lin2' => (double)str_replace(',', '', $this->input->post('cred_2')),
            'id_supplier2' => $this->input->post('supplier2')            
            );
        $this->db->insert('credit', $data);   
    }

    public function edit_credit_line($id)
    {
        $this->db->select('id, cred_lin1, id_supplier1, cred_lin2, id_supplier2');
        $this->db->where('id_buyer', $id);
        $credit = $this->db->get('credit');
        if ($credit->num_rows() > 0) {
            return $credit->row();
        }
    }

    public function update_credit_line($id)
    {
        $data = array(                      
            'cred_lin1' => (double)str_replace(',', '', $this->input->post('cred_1')),
            'id_supplier1' => $this->input->post('supplier1'),                                                    
            'cred_lin2' => (double)str_replace(',', '', $this->input->post('cred_2')),
            'id_supplier2' => $this->input->post('supplier2')            
            );
        $this->db->where('id_buyer', $id);
        $this->db->update('credit', $data);
    }

    public function update($id)
    {
        $data = array(          
            'name' => $this->input->post('namebuyer'),                        
            'ruc' => $this->input->post('ruc'),
            'address' => $this->input->post('address'),
            'web' => $this->input->post('web'),
            'fax' => $this->input->post('fax'),
            'country' => $this->input->post('country'),
            'telephone' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'description' => $this->input->post('description')
        );
        $this->db->where('id', $id);
        $this->db->update('buyer', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buyer');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('delete', 1);
        }        
    }
}