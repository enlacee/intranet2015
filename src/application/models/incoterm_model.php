<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incoterm_Model extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'incoterms';
    }
    
/**
 * Get data only active
 * @param type $estado
 * @return type
 */
    public function all($estado='a')
    {
        $this->db->select('incoterms, nombre');
        $this->db->from($this->table);
        if (!empty($estado)) {
            $this->db->where('estado', $estado);
        }
        $this->db->order_by('incoterms', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result();
        } 
    }

    public function create()
    {
        $data = array(          
            'nombre' => $this->input->post('name'),
            'estado' => 'a'
            );
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('incoterms', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}