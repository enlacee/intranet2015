<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buyer extends CI_Controller {

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
            $this->load->model('buyer_model');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $data['listbuyer'] = $this->buyer_model->all();
            $this->load->view('includes/header', $data);
            $this->load->view('buyer/list_buyer_view', $data);
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
            $this->load->model('buyer_model');
            $id_buyer = $this->buyer_model->create();
            if (strlen(trim($this->input->post('supplier1'))) > 0) {
                $this->buyer_model->create_credit($id_buyer);
            }
            redirect(site_url('buyer'));
        } else {                    
            $this->load->model('country_model');            
            $data['list_country'] = $this->country_model->all();
            $this->load->model('supplier_model');
            $data['listcredit'] = $this->supplier_model->all_credit();
            $data['action_form'] = site_url('buyer/create');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $this->load->view('includes/header', $data);            
            $this->load->view('buyer/buyer_create_view', $data);
            $this->load->view('includes/footer');
        }           
    }

    public function edit()
    {
        if ($_POST) {            
            $this->load->model('buyer_model');
            $this->buyer_model->update($this->input->post('id'));
            if ($this->input->post('update') > 0) {
                $this->buyer_model->update_credit_line($this->input->post('id'));
            } else {                
                $this->buyer_model->create_credit($this->input->post('id'));
            }
            
            redirect(site_url('buyer'));
        } else {
            $this->load->model('buyer_model');
            $data['buyer'] = $this->buyer_model->edit($this->input->get('id'));
            $data['creditline'] = $this->buyer_model->edit_credit_line($this->input->get('id'));
            $this->load->model('country_model');            
            $data['list_country'] = $this->country_model->all();
            $this->load->model('supplier_model');
            $data['supplier_credit'] = $this->supplier_model->all_credit();
            $this->load->view('buyer/edit_buyer_view', $data);
        }           
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('buyer_model');
        $this->buyer_model->delete($id);
        redirect(site_url('buyer'));
    }

    public function country_create()
    {
        if ($_POST) {
            $this->load->model('country_model');
            echo $this->country_model->create();            
        } else {
            $this->load->view('supplier/country_create_view');
        }            
    } 
}