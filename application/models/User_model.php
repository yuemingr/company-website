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
	
	public function get_user_for_name($uname){
	    $query = $this->db->where('uname',$uname)->get('user');
		//var_dump($query); return;
		return $query->row_array();
		        
	}
	
	public function up_user($id,$userdata)
	{
	    //$this->db
		return $this->db->where('id',$id)->update('user',$userdata);
	}
	
	public function del($id)
	{
	    //$this->db
		return $this->db->delete('user',array("id"=>$id));
	}
}