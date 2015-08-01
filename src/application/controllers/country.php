<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('profile') != "1") {
            redirect(site_url('panel'));
        }       
    }

    public function delete()
    {
        if ($_POST) {
            $this->load->model('country_model');
            if ($this->country_model->delete($this->input->post('id')) > 0) {
                echo '1';
            } else {
                echo '0';
            }         
        }
    }

    public function create()
    {
        if ($_POST) {
            $this->load->model('country_model');
            echo $this->country_model->create();            
        } else {
            $this->load->model('country_model');
            $data['listcountry'] = $this->country_model->all();
            $this->load->view('country/country_create_view', $data);
        }            
    } 
    
}