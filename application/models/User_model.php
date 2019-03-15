<?php
class User_model extends CI_Model {
    
	public function __construct()
	{
	    $this->load->database();
	}
	
	public function create($userdata){
		return $this->db->insert('user',$userdata);
	}
	
	public function get_users($id = FALSE)
	{
	    if($id === FALSE)
		{
		    $query = $this->db->get('user');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('user',array('id' => $id));
		return $query->row_array();
	}
}