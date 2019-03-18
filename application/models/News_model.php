<?php
class News_model extends CI_Model {
    
	public function __construct()
	{
	    $this->load->database();
	}
	
	public function get_news($id = FALSE)
	{
	    if($id === FALSE)
		{
		    $query = $this->db->get('news');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news',array('id' => $id));
		return $query->row_array();
	}
	
	public function create_new($new)
	{
		return $this->db->insert('news',$new);
	}
	
	public function up_new($newid, $new)
	{
		return $this->db->where('id',$newid)->update('news', $new);
	}
}