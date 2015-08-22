<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner_Model extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'partner';
    }

    public function all()
    {
        $this->db->select('partner, nombre');
        $this->db->from($this->table);
        $this->db->order_by('partner', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result();
        } 
    }

    public function create()
    {
        $data = array(          
            'nombre' => $this->input->post('name'),
            'estado' => 'A'
            );
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('partner', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}