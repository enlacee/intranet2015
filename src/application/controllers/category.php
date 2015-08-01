<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
            $this->load->model('category_model');
            if ($this->category_model->delete($this->input->post('id')) > 0) {
                echo '1';
            } else {
                echo '0';
            }         
        }
    }

    public function create()
    {
        if ($_POST) {
            $this->load->model('category_model');
            echo $this->category_model->create();            
        } else {
            $this->load->model('category_model');
            $data['listcategory'] = $this->category_model->all_modal();
            $this->load->view('category/category_create_view', $data);
        }            
    } 
}