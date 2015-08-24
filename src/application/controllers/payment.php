<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Payment extends MY_ControllerAdmin { 

    public function __construct()
    {
        parent::__construct();
        if ($this->logueado == false) {
            $this->getViewLogin();
        }
    }

    public function delete()
    {
        if ($_POST) {
            $this->load->model('payment_model');
            if ($this->payment_model->delete($this->input->post('id')) > 0) {
                echo '1';
            } else {
                echo '0';
            }         
        }
    }

    public function create()
    {
        if ($_POST) {
            $this->load->model('payment_model');
            echo $this->payment_model->create();            
        }
    }
    
}