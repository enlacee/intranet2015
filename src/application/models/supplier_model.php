<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Empleados
 */
class Supplier_Model extends CI_Model{

    private $table;
    private $tablePartner;

    public function __construct() {
        parent::__construct();
        $this->table = 'supplier'; // empleadors
        $this->tablePartner = 'partner';
        $this->tableProduc = 'product'; // productos

    }

    public function all()
    {
        $this->db->select('s.id, s.nombres, c.name AS pais, s.telefono, s.estado');
        $this->db->from('supplier AS s');
        $this->db->join('country AS c', 'c.id = s.pais', 'inner'); 
        $this->db->order_by('s.id', 'desc');    
        $list = $this->db->get();
        if ($list->num_rows() > 0) {
            return $list->result();
        }   
    }

    public function create()
    {
        $data = array(          
            'nombres' => $this->input->post('nombres'),                        
            'telefono' => $this->input->post('telefono'),
            'celular' => $this->input->post('celular'),
            'direccion' => $this->input->post('direccion'),
            'email' => $this->input->post('email'),
            'observaciones' => $this->input->post('observaciones'),
            'estado' => $this->input->post('estado'),
            'pais' => $this->input->post('pais'),
            'credito' => $this->input->post('credito')
            );
        $this->db->insert('supplier', $data);
    }

    public function edit($id)
    {
        $this->db->select('id, nombres, telefono, celular, direccion, email, observaciones, estado, pais, credito');
        $this->db->where('id', $id);
        $supplier = $this->db->get('supplier');
        if ($supplier->num_rows() > 0) {
            return $supplier->row();
        }
    }

    public function update($id)
    {
        $data = array(          
            'nombres' => $this->input->post('nombres'),                        
            'telefono' => $this->input->post('telefono'),
            'celular' => $this->input->post('celular'),
            'direccion' => $this->input->post('direccion'),
            'email' => $this->input->post('email'),
            'observaciones' => $this->input->post('observaciones'),
            'estado' => $this->input->post('estado'),
            'pais' => $this->input->post('pais'),
            'credito' => $this->input->post('credito')
        );
        $this->db->where('id', $id);
        $this->db->update('supplier', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('supplier');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('delete', 1);
        }        
    }

    public function all_credit()
    {
        $this->db->select('id, nombres');        
        $this->db->where('credito', 1);
        $all_credit = $this->db->get('supplier');
        if ($all_credit->num_rows() > 0) {
            return $all_credit->result();
        }
    }

    public function all_product()
    {
        $this->db->select('id, nombres');                
        $all_credit = $this->db->get('supplier');
        if ($all_credit->num_rows() > 0) {
            return $all_credit->result();
        }
    }
    
    
    // function anibal
    
    /**
     * Get all data empleados (basic)
     * 
     * @param array $dataExtra
     * @param integer $limit
     * @param integer $offset
     * @param boolean $rowStatus fetch all or one
     * @return type
     */
    public function getList($dataExtra = array(), $limit = '', $offset = '', $rowStatus = false){

        $this->db->select();
        $this->db->from($this->table);

        // -------- init
        if (!empty($limit) && !empty ($offset)) {
            $this->db->limit($limit, $offset);
        } elseif (!empty($limit)) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        if ($rowStatus == true) {
            $rs = $query->num_rows();
        } else {
           $rs = $query->result_array(); 
        }
       
        return $rs;        
    }
    
    /**
     * 
     * @param type $dataExtra metadata order, variableone, variabletwo, etc.
     * @param type $limit
     * @param type $offset
     * @param type $rows number of rows
     * @return type
     */
    public function get_partner($dataExtra = array(), $limit = '', $offset = '', $rows = false)
    {
        $this->db->select();
        $this->db->from($this->tablePartner);

        // -------- init
        if (!empty($limit) && !empty ($offset)) {
            $this->db->limit($limit, $offset);
        } elseif (!empty($limit)) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        if ($rows == true) {
            $rs = $query->num_rows();
        } else {
           $rs = $query->result_array(); 
        }
       
        return $rs;
    }
    
    /**
     * return json
     * 
     * @param type $id_proveedor
     * @return type
     */
    public function getProductosByProveedorJson($id_proveedor)
    {           
        $this->db->select();
        $this->db->from($this->tableProduc);
        $this->db->where('id_supplier', $id_proveedor);
        $this->db->order_by('name asc'); 
        
        $query = $this->db->get();
        $rs = $query->result_array(); 
        
        return $rs;
    }
    
    

}