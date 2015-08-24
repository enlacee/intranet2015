<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Model extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'payment';
    }

/**
 * Get data only active
 * @param type $estado
 * @return type
 */
    public function all()
    {
        $this->db->select('id_payment, payment, dias');
        $this->db->from($this->table);
        $this->db->order_by('id_payment', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result_array();
        } 
    }

    public function create()
    {
        $data = array(
            'payment' => $this->input->post('name'),
            'dias' => $this->input->post('dias')
            );
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id_payment', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}