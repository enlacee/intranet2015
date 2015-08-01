<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logueado') != false) {
			$data['titulo'] = ".:: Zaimar Group ::.";						
			$this->load->view('includes/header', $data);
			$this->load->view('panelcontrol_view', $data);
			$this->load->view('includes/footer');
		} else {
			redirect(base_url());
		}
	}
	
	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}