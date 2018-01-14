<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Article_model');
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
}
