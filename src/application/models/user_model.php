<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model{

	public function validar_login()
	{   
        //$this->db->select('login, profile');
		$this->db->select('login, id_perfil, id_buyer, login as usuario, profile');
        $this->db->where('login', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('userpassword')));
		$usuario = $this->db->get('user');
		if($usuario->num_rows() == 1)
        {
            return $usuario->row();
        }else{
            $this->session->set_flashdata('err_user','Usuario o Password incorrectos.');
            redirect(base_url(),'refresh');
        }
	}

	public function all()
	{
		$this->db->select('id, login, profile');
		$this->db->from('user');	
		$this->db->order_by('login', 'asc');	
		$listuser = $this->db->get();
		if ($listuser->num_rows() > 0) {
			return $listuser->result();
		}	
	}

    public function edit($id)
    {
        $this->db->select('id, login, fullname, email, profile, employee, status');        
        $this->db->where('id', $id);
        $user = $this->db->get('user');
        if ($user->num_rows() > 0) {
            return $user->row();
        }
    }

	public function create()
	{
		$data = array(          
            'login' => $this->input->post('login'),                        
            'password' => sha1($this->input->post('password')),
            'fullname' => $this->input->post('fullname'),            
            'email' => $this->input->post('email'),
            'profile' => $this->input->post('profile'),
            'employee' => $this->input->post('employee'),
            'status' => $this->input->post('status')            
            );
        $this->db->insert('user', $data);
	}

    public function update($id)
    {
        if (strlen(trim($this->input->post('password'))) > 0) {
            $data = array(          
            'login' => $this->input->post('login'),                        
            'password' => sha1($this->input->post('password')),
            'fullname' => $this->input->post('fullname'),            
            'email' => $this->input->post('email'),
            'profile' => $this->input->post('profile'),
            'employee' => $this->input->post('employee'),
            'status' => $this->input->post('status')            
            );
        } else {
            $data = array(          
            'login' => $this->input->post('login'),                                    
            'fullname' => $this->input->post('fullname'),            
            'email' => $this->input->post('email'),
            'profile' => $this->input->post('profile'),
            'employee' => $this->input->post('employee'),
            'status' => $this->input->post('status')            
            );
        }  
        $this->db->where('id', $id);          
        $this->db->update('user', $data);
    }

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}