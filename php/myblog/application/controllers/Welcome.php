<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Article_model');
	}

	public function index_logined(){

		$this->load->library('pagination');

		$user = $this->session->userdata('user');

		$total = $this->Article_model->get_logined_count_article($user->user_id);


		$config['base_url'] = base_url().'welcome/index_logined';//当前控制器方法
		$config['total_rows'] = $total;//总数
		$config['per_page'] = 1;//每页显示条数

		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$results = $this->Article_model->get_logined_article_list($this->uri->segment(3),$config['per_page'],$user->user_id);

		$types = $this->Article_model->get_logined_article_type($user->user_id);

		$this->load->view('index_logined',array('list'=>$results,'types'=>$types,'links'=>$links));
	}

	public function index()
	{
		$this->load->library('pagination');
		$total = $this->Article_model->get_count_article();


		$config['base_url'] = base_url().'welcome/index';//当前控制器方法
		$config['total_rows'] = $total;//总数
		$config['per_page'] = 1;//每页显示条数
//
//		$config['first_link'] = 'one';
//
//		$config['next_link'] = '**';

		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();



		$results = $this->Article_model->get_article_list($this->uri->segment(3),$config['per_page']);


		$types = $this->Article_model->get_article_type();

		$this->load->view('index',array('list'=>$results,'types'=>$types,'links'=>$links));
	}

	public function new_blog(){

		$user = $this->session->userdata('user');
		$types = $this->Article_model->get_type_by_user_id($user->user_id);


		$this->load->view('newBlog',array('types'=>$types));
	}

	public function publish_blog(){

		$title = $this->input->post('title');
		$catalog = $this->input->post('catalog');
		$content = $this->input->post('content');
		$user = $this->session->userdata('user');
		//获取user_id 和 当前时间


		date_default_timezone_set('Asia/Shanghai');

		$rows = $this->Article_model->publish_blog(array(
			'title'=>$title,
			'content'=>$content,
			'post_date'=>date("Y-m-d h:m:s"),
			'user_id'=>$user->user_id,
			'type_id'=>$catalog
		));

		if($rows >0 ){
			redirect('welcome/index_logined');
		}

	}
}
