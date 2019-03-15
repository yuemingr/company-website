<?php
/* 用户管理 */
class User extends CI_Controller{

    public function __construct()
	{
	    parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
	}
    public function index(){
	     echo "user index()";
	}
	
	public function add()
	{
	    $this->load->library('form_validation');
	    $this->load->view('admin/user/adduser');
	}
	public function create()
	{
	    $this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'create a new user';
		
		$this->form_validation->set_rules('uname','uname','required');
		$this->form_validation->set_rules('passwd','passwd','required');
		
		if ($this->form_validation->run() === FALSE)
		{
		    $this->load->view('admin/user/adduser',$data);
		}
		else
		{
		    //保存表单
			$userdata = array(
			    'uname' => $this->input->post('uname'),
				'passwd'=> md5($this->input->post('passwd') . 'company_user_pass'),
		        'ctime' => time(),
				'mtime' => time()
			);
			$ret = $this->user_model->create($userdata);
			if($ret){
			    echo "ok";
			} else {
			    echo "fail";
			};
		}
	}
    
    public function view($id = NULL)
	{
        $data['news_item'] = $this->news_model->get_news($id);
		
		if(empty($data['news_item']))
		{
		    echo "not data";
		}
		
		$data['title'] = $data['news_item']['title'];
		$this->load->view('templates/header', $data);
	    $this->load->view('news/view',$data);
	    $this->load->view('templates/footer', $data);
    }
	

}
