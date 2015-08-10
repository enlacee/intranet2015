<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Distribuciones (Colocaciones.php)
 */
class Colocacion_Model extends CI_Model {

    private $table;
    private $tablePartner;

    public function __construct() {
        parent::__construct();
        $this->table = 'colocaciones';
        $this->tablePartner = 'partner';
    }

    public function getAnioAllocations($anio, $inside = null) {

        $conn = new Connection();
        if ($inside != "") {
            //echo "<script>alert('true')</script>";
            $str = "SELECT A.dates, B.nombre_empresa, A.po_number, D.nombre, E.nombre, C.qty, C.unidad, F.nombre, C.partner_com, G.nombre, C.inside_comm, C.income, C.amounts, H.nombre, C.payment, C.adv_ptm, C.etd, C.eta, C.envoice, C.due_date, C.estado_due, C.pending, A.id_colocaciones, C.estado ";
            $str .= "FROM colocaciones A, cliente B, detalle_colocaciones C, empleados D, producto E, partner F, inside G, incoterms H ";
            $str .= "WHERE C.id_colocaciones = A.id_colocaciones AND A.id_cli = B.id_cli AND A.anio = '$anio' AND D.codigo = C.codigo AND E.id_producto = C.id_producto AND F.partner = C.partner AND G.inside = C.inside AND H.incoterms = C.incoterms AND C.inside = $inside ";
            //$str .= "ORDER BY A.dates";
            $str .= "ORDER BY A.dates, B.nombre_empresa, A.po_number";
        } else {
            //echo "<script>alert('false')</script>";
            $str = "SELECT A.dates, B.nombre_empresa, A.po_number, D.nombre, E.nombre, C.qty, C.unidad, F.nombre, C.partner_com, G.nombre, C.inside_comm, C.income, C.amounts, H.nombre, C.payment, C.adv_ptm, C.etd, C.eta, C.envoice, C.due_date, C.estado_due, C.pending, A.id_colocaciones, C.estado ";
            $str .= "FROM colocaciones A, cliente B, detalle_colocaciones C, empleados D, producto E, partner F, inside G, incoterms H ";
            $str .= "WHERE C.id_colocaciones = A.id_colocaciones AND A.id_cli = B.id_cli AND A.anio = '$anio' AND D.codigo = C.codigo AND E.id_producto = C.id_producto AND F.partner = C.partner AND G.inside = C.inside AND H.incoterms = C.incoterms ";
            //$str .= "ORDER BY A.dates, B.nombre_empresa, A.po_number";
            $str .= "ORDER BY A.dates, B.nombre_empresa, A.po_number";
        }
        //echo $str; exit();
        return $conn->QueryExec($str);
    }
    
    /**
     * return String () ID TEXT : T0001
     * @return string
     */
    public function SearchMaxdetalle() {
        $this->db->select_max('id_detalle');
        $query = $this->db->get('detalle_colocaciones');
        
        if ($query->num_rows() > 0) {
           $row = $query->row();
           $ultimo = $row->id_detalle;
            if ($ultimo == "") {
                $id_detalle = "T00001";
            } else {
                //sumar 1 al dato
                $uId = substr($ultimo, 1);
                $nId = $uId + 1;
                //longitud de incremento
                $cId = strlen($nId);
                $cadena = substr($ultimo, 0, -$cId);
                $id_detalle = $cadena . $nId;
            }
            
           return $id_detalle;
        }
        
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
