<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('profile') != "1") {
            redirect(site_url('panel'));
        }       
    }

    public function index()
    {
        if (trim($this->session->userdata('logueado')) != false) {
            $this->load->model('supplier_model');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $data['list_supplier'] = $this->supplier_model->all();
            $this->load->view('includes/header', $data);
            $this->load->view('supplier/list_supplier_view', $data);
            $this->load->view('includes/footer');
        } else {
            $data['token'] = $this->token();
            $data['titulo'] = "Seguridad del Sistema";        
            $this->load->view('login_view', $data);
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