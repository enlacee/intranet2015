<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Distribuciones (Colocaciones.php)
 */
class Empleado_Model extends CI_Model {

    private $table;
    private $tablePartner;

    public function __construct() {
        parent::__construct();
        $this->table = 'empleados';

    }
    
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
    

}
