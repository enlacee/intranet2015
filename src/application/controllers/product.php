<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
            $this->load->model('product_model');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $data['listproduct'] = $this->product_model->all();
            $this->load->view('includes/header', $data);
            $this->load->view('product/list_product_view', $data);
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
            $this->load->model('product_model');

            if ($this->input->post('request') == 'json') {
                $dataFormateado = $this->formatatDataPost($this->input->post());
                $insert_id = $this->product_model->create($dataFormateado);
                header('Content-Type: application/json');
                echo json_encode($insert_id);
            } else {
                $insert_id = $this->product_model->create();
                redirect(site_url('product'));
            }
            
        } else {                    
            $this->load->model('category_model');            
            $data['listcategory'] = $this->category_model->all();
            $this->load->model('supplier_model');
            $data['listsupplier'] = $this->supplier_model->all_product();
            $data['action_form'] = site_url('product/create');
            $data['titulo'] = ".:: Zaimar Group ::.";
            $this->load->view('includes/header', $data);            
            $this->load->view('product/product_create_view', $data);
            $this->load->view('includes/footer');
        }           
    }
    
    /**
     * cambiar datos del post (por dintinto formularios)
     */
    public function formatatDataPost($dataPost){
        $data = array(          
            'id_category' => $dataPost['id_category'],       
            'id_supplier' => $dataPost['id_supplier'],
            'name' => $dataPost['name'],                        
            'description' => $dataPost['description']
        );
        
        return $data;        
    }

    public function edit()
    {
        if ($_POST) {            
            $this->load->model('product_model');
            $this->product_model->update($this->input->post('id'));
            redirect(site_url('product'));
        } else {
            $this->load->model('product_model');
            $data['product'] = $this->product_model->edit($this->input->get('id'));
            $this->load->model('category_model');            
            $data['listcategory'] = $this->category_model->all();
            $data['listcatmodal'] = $this->category_model->all_modal();
            $this->load->model('supplier_model');
            $data['listsupplier'] = $this->supplier_model->all_product();
            $this->load->view('product/edit_product_view', $data);
        }           
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('product_model');
        $this->product_model->delete($id);
        redirect(site_url('product'));
    }

}