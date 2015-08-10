<?php

class MY_ControllerAdmin extends CI_Controller {

    // paginator
    const LIMIT = 5;
    const PERFIL_1 = 'p01';
    const PERFIL_2 = 'p02';
    const PERFIL_3 = 'p03';
    const PERFIL_4 = 'p04';

    public $logueado;
    public $loginData;
    
    public $dataView = array(); 

    public function __construct() {
        parent::__construct();
        $this->dependencias();
        $this->validateUser();
    }

    /*
     * Validate Admin session
     */

    public function validateUser() {
        $this->logueado = false;
        if ($this->session->userdata('logueado') == true) {
            $this->logueado = true;
            $this->loginData = $this->session->userdata('loginData');
            $this->load->vars(array('LOGUEADO_DATA' => $this->loginData));
        }

        return $this->logueado;
    }

    /**
     * Redirect to REQUEST HTTP
     */
    public function getViewLogin() {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    // helper
    private function dependencias()
    {
        $this->load->library(array('layout'));
        $this->load->helper(array(
            'my_funcion_helper',
            'url',
            'form',
            'security',
            'captcha'));
        
        $this->load->driver('cache');
        
        // message flash
        if ($this->session->flashdata('flashMessage') != '') {            
            $flashMessage['flashMessage'] = $this->session->flashdata('flashMessage');
            $this->load->vars($flashMessage); // $this->load->get_var('flashMessage');
        }
    }   
    
    
    protected function loadStatic(array $data = array()) {

        foreach ($data as $key => $value) {
            if ($key === 'css') {
                if (is_string($data[$key])) {
                    $this->dataView['css'][] = $value;
                } elseif (count($data[$key] > 0)) {
                    foreach ($data['css'] as $llave => $valor) {
                        $this->dataView['css'][] = $valor;
                    }
                }
            } elseif ($key === 'js') {
                if (is_string($data[$key])) {
                    $this->dataView['js'][] = $value;
                } elseif (count($data[$key] > 0)) {
                    foreach ($data['js'] as $llave => $valor) {
                        $this->dataView['js'][] = $valor;
                    }
                }
            } elseif ($key === 'jstring') {
                if (is_string($data[$key])) {
                    $this->dataView['jstring'][] = $value;
                }
            }
        }
        //$this->load->get_var($key)
        $this->load->vars($this->dataView);
        return $this->dataView;
    }

}
