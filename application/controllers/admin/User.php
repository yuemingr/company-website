<?php
/* �û����� */
class User extends CI_Controller{
    private $passaddchar = 'company_user_pass';
    public function __construct()
	{
	    parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
	}
    public function index(){
	    $this->listUser();
	}
	public function listUser()
	{
	    $data['userlist'] = $this->user_model->get_users();
        $this->load->view('admin/user/list', $data);
	}
	public function del($userid)
	{
	    //���û��id����ʾ
        if (empty($userid)) {
		    echo "not id";return;
		} 
	    $rel = $this->user_model->del($userid);
		if ($rel) {
		    echo "ok";
		} else {
		    echo "not ok";
		}
	}
	public function login()
	{
	    $this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = "�û���½";
	
	    $this->form_validation->set_rules('uname','uname','required');
		$this->form_validation->set_rules('passwd','passwd','required');
		if ($this->form_validation->run() === FALSE)
		{
		     $this->load->view('admin/user/login',$data);
		}
		$uname = $this->input->post('uname');
		$passwd = $this->input->post('passwd');
		$userinfo = $this->user_model->get_user_for_name($uname);
		if (empty($userinfo)) {
		    echo "aaaû�д��û�";return;
		}
		if (md5($passwd . 'company_user_pass') == $userinfo['passwd']) {
		    echo "bbb��½�ɹ�";
		} else {
		    echo "ccc�û������������";
		}
		
	}
	public function modify($userid)
	{
	    //���û��id����ʾ
        if (empty($userid)) {
		    echo "not id";return;
		} 
		
    	$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = "�޸��û�";
	
		$this->form_validation->set_rules('passwd','passwd','required');
		if ($this->form_validation->run() === FALSE)
		{
		    //��ȡ�û���Ϣ������޸ı�
		    $userdata = $this->user_model->get_users($userid);
			if (empty($userdata)) {
			    echo "not the user";return;
			}
			$data['user'] = $userdata;
		    $this->load->view('admin/user/modifyuser',$data);
		}
		else
		{
		    //�����
			$userdata = array(
			    //'uname' => $this->input->post('uname'),
				'passwd'=> md5($this->input->post('passwd') . $this->passaddchar),
				'mtime' => time()
			);
			$ret = $this->user_model->up_user($userid, $userdata);
			if($ret){
			    echo "ok";
			} else {
			    echo "fail";
			};
		}
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
		    //�����
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
