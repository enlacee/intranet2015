<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inside_Model extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'insides';
    }

/**
 * Get data only active
 * @param type $estado
 * @return type
 */
    public function all($estado='a')
    {
        $this->db->select('id_inside, nombre');
        $this->db->from($this->table);
        if (!empty($estado)) {
            $this->db->where('estado', $estado);
        }
        $this->db->order_by('id_inside', 'asc');
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result_array();
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
        $this->db->where('id_inside', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}