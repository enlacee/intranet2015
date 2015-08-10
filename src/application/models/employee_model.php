<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * table inside
 */
class Employee_Model extends CI_Model{

	public function for_user()
	{
		$this->db->select('id, fullname, status');
		$this->db->from('inside');
		$this->db->order_by('fullname', 'asc');
		$listinside = $this->db->get();
		if ($listinside->num_rows() > 0) {
			return $listinside->result();
		}
	}

	public function create()
	{
		$data = array(                      
            'fullname' => $this->input->post('fullname'),
            'status' => $this->input->post('status')
            );
        $this->db->insert('inside', $data);
        return $this->db->insert_id();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('inside');
		return $this->db->affected_rows();
	}

}