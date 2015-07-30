<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
			$this->load->view('user/list_user_view', $data);
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
			$this->load->model('user_model');
			$this->user_model->create();
			redirect(site_url('user'));
		} else {						
			$data['titulo'] = ".:: Zaimar Group ::.";
			$this->load->model('employee_model');			
			$data['listinside'] = $this->employee_model->for_user();
			$this->load->view('includes/header', $data);	
			$this->load->view('user/create_user_view', $data);
			$this->load->view('includes/footer');
		}			
	}

	public function edit()
	{
		if ($_POST) {
			$this->load->model('user_model');
			$this->user_model->update($this->input->post('id'));
			redirect(site_url('user'));
		} else {
			$this->load->model('user_model');
			$data['user'] = $this->user_model->edit($this->input->get('id'));
			$this->load->model('employee_model');			
			$data['listinside'] = $this->employee_model->for_user();
			$data['action_form'] = site_url('user/editar');			
			$this->load->view('user/edit_user_view', $data);
		}			
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('user_model');
		$this->user_model->delete($id);
		redirect(site_url('user'));
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}	
}