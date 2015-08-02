<?php

class MY_ControllerAdmin extends CI_Controller {
		
	// paginator
	const LIMIT = 5;
    
    const PERFIL_1 = 'p01';
    const PERFIL_2 = 'p02';
    const PERFIL_3 = 'p03';
    const PERFIL_4 = 'p04';
    
	
    public $logueado;
    public $logueadoData;
    
    
    public function __construct()
    {
        parent::__construct();
        $this->validateUser();
    }
    
    /*
     * Validate Admin session
     */
    public function validateUser()
    {
        $this->logueado = false;        
        if ($this->session->userdata('logueado') == true) {
            $this->logueado = true;
            $this->logueadoData = $this->session->userdata('loginData');
            $this->load->vars(array('LOGUEADO_DATA' => $this->logueadoData)); 
        }
        
        return $this->logueado;
    }


    
    
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
}
