<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Allocation extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->logueado == false) {
            $this->getViewLogin();
        }
    }

    public function index()
    {
        if ($this->logueado 
            && ($this->loginData->id_perfil == MY_ControllerAdmin::PERFIL_1
                || $this->loginData->id_perfil == MY_ControllerAdmin::PERFIL_2
                || $this->loginData->id_perfil == MY_ControllerAdmin::PERFIL_3
                || $this->loginData->id_perfil == MY_ControllerAdmin::PERFIL_4)
        ) {
            $this->load->model('supplier_model');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $data['list_supplier'] = $this->supplier_model->all();
            // =============== code
            $data['anio'] = !empty($this->input->get('anio'))
                    ? $this->input->get('anio', true) 
                    : date('Y');
            $data['accion'] = $this->input->get('accion');
            $data['usuario'] = $this->input->get('usuario');
            $data['id_perfil'] = $this->input->get('id_perfil');
            
            // =============== code
            $this->load->view('includes/header', $data);
            $this->load->view('allocation/list_view', $data);
            $this->load->view('includes/footer');
        } else {
            redirect(site_url('login/sinpermiso'));
        }

    }   

    public function create()
    {
       $data['id_perfil'] = $this->loginData->id_perfil;
        $this->load->model('supplier_model');
        
        if ($this->input->get_post()) {
            $this->supplier_model->create();
            redirect(site_url('supplier'));
        } else {
            $this->load->model('buyer_model');
            $this->load->model('colocacion_model');
           
            $data['titulo'] = PUBLIC_URL;
            $data['clientes'] = $this->buyer_model->getlistcliente();
            $data['products'] = array();
            //$this->colocacion_model->get_list_anio_detalle_colocaciones($id_colocaciones,$myinside);
            $data['partners'] = $this->colocacion_model->get_partner(array(), MY_ControllerAdmin::LIMIT_100);
            $data['empleados'] = $this->supplier_model->getList();
            $data['incoterms'] = $this->colocacion_model->get_incoterms(array(), MY_ControllerAdmin::LIMIT_100);
            $data['payments'] = $this->colocacion_model->get_payment(array(), MY_ControllerAdmin::LIMIT_100);
            
            $data['anio'] = date('Y');
     
            $this->createScript();
            $this->layout->view('allocation/create.php', $data);
        }
    }
    
    private function createScript() {
        $str = <<<EOD
        $(document).ready(function() {
            $("#dates").datepicker({ dateFormat: 'dd-mm-yy' });
            $("#etd").datepicker({ dateFormat: 'dd-mm-yy' });
            $("#eta").datepicker({ dateFormat: 'dd-mm-yy' });
        });
EOD;

        $this->loadStatic(array("jstring" => $str));        
    }

    public function edit()
    {
        if ($_POST) {            
            $this->load->model('supplier_model');
            $this->supplier_model->update($this->input->post('id'));
            redirect(site_url('supplier'));
        } else {
            $this->load->model('supplier_model');
            $data['supplier'] = $this->supplier_model->edit($this->input->get('id'));
            $this->load->model('country_model');            
            $data['list_country'] = $this->country_model->all();
            $this->load->view('supplier/edit_supplier_view', $data);
        }           
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('supplier_model');
        $this->supplier_model->delete($id);
        redirect(site_url('supplier'));
    }

    public function country_create()
    {
        if ($_POST) {
            $this->load->model('country_model');
            echo $this->country_model->create();            
        } else {
            $this->load->model('country_model');
            $data['listcountry'] = $this->country_model->all();
            $this->load->view('supplier/country_create_view', $data);
        }            
    }
    
    /**
     * return JSON
     */
    public function json_producto_por_proveedor()
    {
        $idProveedor = $this->input->get('id_proveedor');
        
        if (!empty($idProveedor)) {
            $this->load->model('supplier_model');
            $data = $this->supplier_model->getProductosByProveedorJson($idProveedor);

            //add the header here
            header('Content-Type: application/json');
            echo json_encode($data);
        }

        
    }
    
}