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
            && ($this->logueadoData->id_perfil == MY_ControllerAdmin::PERFIL_1
                || $this->logueadoData->id_perfil == MY_ControllerAdmin::PERFIL_2
                || $this->logueadoData->id_perfil == MY_ControllerAdmin::PERFIL_3
                || $this->logueadoData->id_perfil == MY_ControllerAdmin::PERFIL_4)
        ) {
            $this->load->model('supplier_model');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $data['list_supplier'] = $this->supplier_model->all();
            // =============== code
            $data['anio'] = !empty($this->input->get('anio'))
                    ? $this->input->get('anio', true) : date('Y');
            $data['accion'] = $this->input->get('accion');
            $data['usuario'] = $this->input->get('usuario');
            $data['usuario2'] = $this->input->get('usuario2');
            
    

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
        if ($_POST) {
            $this->load->model('supplier_model');
            $this->supplier_model->create();
            redirect(site_url('supplier'));
        } else {                    
            $this->load->model('country_model');            
            $data['list_country'] = $this->country_model->all();
            $data['action_form'] = site_url('supplier/create');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $this->load->view('includes/header', $data);            
            $this->load->view('supplier/supplier_create_view', $data);
            $this->load->view('includes/footer');
        }           
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
}