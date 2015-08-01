<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

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
            $this->load->model('user_model');
            $data['list_user'] = $this->user_model->all();
            $data['titulo'] = ".:: Zaimar Group ::.";
            $this->load->view('includes/header', $data);
            $this->load->view('list_user_view', $data);
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
            $this->load->model('employee_model');
            echo $this->employee_model->create();            
        } else {
            $this->load->model('employee_model');           
            $data['listinside'] = $this->employee_model->for_user();
            $this->load->view('employee/create_employee_view', $data);            
        }           
    }

    public function editar()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->load->model('usuario_model');
            $this->usuario_model->usuario_editar($id);
            redirect(site_url('panel'));
        } else {
            $this->load->model('usuario_model');    
            $this->load->model('cliente_model');
            $data['usuario'] = $this->usuario_model->datos_editar($this->input->get('id'));     
            $data['clientes'] = $this->cliente_model->lista_clientes();
            $data['perfil'] = array('1' => 'Administrador', '2' => 'Usuario Final', '3' => 'Tecnico de Soporte');
            $data['action_form'] = site_url('user/editar');         
            $this->load->view('editar_user_view', $data);
        }           
    }

    public function delete()
    {
        if ($_POST) {
            $this->load->model('employee_model');
            if ($this->employee_model->delete($this->input->post('id')) > 0) {
                echo '1';
            } else {
                echo '0';
            }            
        }
    }  

    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }   
}