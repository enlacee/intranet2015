<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (trim($this->session->userdata('logueado')) == true) {
			redirect('panel');
		} else {
			$data['token'] = $this->token();
			$data['titulo'] = "Seguridad del Sistema";
			$this->load->view('login_view', $data);			
		}
	}
    
    public function sinpermiso()
    {
        $this->load->view('login_view_sinpermiso');		
    }

    public function validar_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'Usuario', 'required|trim|min_length[3]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('userpassword', 'Password', 'required|trim|min_length[3]|max_length[25]|xss_clean');

            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$this->load->model('user_model');
				$usuario_activo = $this->user_model->validar_login();
				if($usuario_activo == TRUE)
				{
					$data = array(
                        'logueado' => TRUE,
                        'profile' => $usuario_activo->profile,
                        'login' => $usuario_activo->login,
                        'loginData' => $usuario_activo
                    );
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url());
		}
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}	
}