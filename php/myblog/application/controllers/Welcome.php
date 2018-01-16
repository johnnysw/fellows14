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

		$total = $this->Article_model->get_logined_count_article();


		$config['base_url'] = base_url().'welcome/index_logined';//当前控制器方法
		$config['total_rows'] = $total;//总数
		$config['per_page'] = 1;//每页显示条数

		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$results = $this->Article_model->get_article_list($this->uri->segment(3),$config['per_page']);

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


	public function blog_catalogs(){

		$user = $this->session->userdata('user');
		$types = $this->Article_model->get_logined_article_type($user->user_id);
		$this->load->view('blogCatalogs',array('types'=>$types));
	}

	public function add_type(){
		$name = $this->input->get('name');
		$user = $this->session->userdata('user');
		$rows = $this->Article_model->add_type($name,$user->user_id);
		if($rows >0){
			echo 'success';
		}
	}

	public function edit_type(){
		$name = $this->input->get('name');
		$type_id = $this->input->get('typeId');

		$rows = $this->Article_model->edit_type($name,$type_id);
		if($rows >0){
			echo 'success';
		}

	}

	public function del_type(){
		$type_id = $this->input->get('typeId');
		$user = $this->session->userdata('user');

		$result = $this->Article_model->get_type_by_id_userid($user->user_id,$type_id);
		if(count($result) == 0){
			echo 'fail';
		}else{
			$rows = $this->Article_model->del_type($type_id);
			if($rows >0){
				echo 'success';
			}
		}
	}

	public function blogs(){
		$user = $this->session->userdata('user');
		$result = $this->Article_model->get_blogs_by_user($user->user_id);

		$this->load->view('blogs',array('result'=>$result));
	}


	public function del_article(){
		$ids = $this->input->get('ids');
		$rows = $this->Article_model->del_article_by_id($ids);
		if($rows>0){
			echo 'success';
		}
	}

	public function blog_detail(){
		$id = $this->input->get('id');
		$row = $this->Article_model->get_article_by_id($id);
		$date_str = $this->time_tran($row->post_date);

		$row->post_date = $date_str;

		$comments = $this->Article_model->get_comment_by_article_id($id);

		//查询上一篇和下一篇文章

		//全部的文章
		$result = $this->Article_model->get_article_list_all();
		$next_article = null;
		$prev_article = null;
		foreach($result as $index=>$article){
			if($article->article_id == $id){
				if($index >0){
					$prev_article = $result[$index-1];
				}
				if($index < count($result) - 1){
					$next_article = $result[$index+1];
				}
			}
		}
		$this->load->view('viewPost_comment',array(
			'article'=>$row,
			'comments'=>$comments,
			'next'=>$next_article,
			'prev'=>$prev_article
		));
	}


	public function add_comment(){
		$content = $this->input->get('content');
		$article_id = $this->input->get('articleId');
		$user = $this->session->userdata('user');

		$rows = $this->Article_model->add_comment(array(
			'content'=>$content,
			'user_id'=>$user->user_id,
			'post_date'=>date("Y-m-d h:m:s"),
			'article_id'=>$article_id
		));

		if($rows >0){
			echo 'success';
		}
	}

	public function blog_comments(){

		$user = $this->session->userdata('user');
		$result = $this->Article_model->blog_comments($user->user_id);

		$this->load->view('blogComments',array(
			'result'=>$result
		));
	}







	function time_tran($the_time)
	{
		$now_time = date("Y-m-d H:i:s", time() + 8 * 60 * 60);
		$now_time = strtotime($now_time);
		$show_time = strtotime($the_time);
		$dur = $now_time - $show_time;
		if ($dur < 0) {
			return $the_time;
		} else {
			if ($dur < 60) {
				return $dur . '秒前';
			} else {
				if ($dur < 3600) {
					return floor($dur / 60) . '分钟前';
				} else {
					if ($dur < 86400) {
						return floor($dur / 3600) . '小时前';
					} else {
						if ($dur < 259200) {//3天内
							return floor($dur / 86400) . '天前';
						} else {
							return $the_time;
						}
					}
				}
			}
		}
	}
}
