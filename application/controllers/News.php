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
	    $this->load->view('news/index',$data);
	    $this->load->view('templates/footer', $data);
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
	
	public function newsc($page="news")
	{
	    if( ! file_exists(APPPATH . 'views/pages/' . $page . ".php"))
		{
		    show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}
}
