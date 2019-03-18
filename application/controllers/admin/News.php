<?php
/* 新闻 */
class News extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('url_helper');
	}
	public function index(){
		$data['news'] = $this->news_model->get_news();
		$data['title'] = '新闻';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/news/index',$data);
		$this->load->view('templates/footer', $data);
	}
	
	public function edit($newid = null)
	{
		$data['new'] = $this->news_model->get_news($newid);
		if(empty($data['new']))
		{
			echo "not data";
			return ;
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = "修改文章";
	
		$this->form_validation->set_rules('title','title','required');
		$this->form_validation->set_rules('content','content','required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/news/newsedit', $data);
		}
		else
		{
			$new = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'mtime' => Date("Y-m-d H:i:s",time()),
			);
			$ret = $this->news_model->up_new($newid, $new);
			if ($ret) 
			{
				var_dump($ret);
				echo 'ook';
			}
			else
			{
				echo 'nott';
			}
		}
		
	}
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = "新增文章";
	
		$this->form_validation->set_rules('title','title','required');
		$this->form_validation->set_rules('content','content','required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/news/newsadd');
		}
		else
		{
			$new = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'mtime' => Date("Y-m-d H:i:s",time()),
				'ctime' => Date("Y-m-d H:i:s",time())
			);
			$ret = $this->news_model->create_new($new);
			if ($ret) 
			{
				var_dump($ret);
				echo 'ook';
			}
			else
			{
				echo 'nott';
			}
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
		$this->load->view('admin/news/view',$data);
		$this->load->view('templates/footer', $data);
	}
	
}