<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
//		$this->load->model('Class_model');
	}

	public function index()
	{
		$this->load->view('reg');
	}

	public function user_list(){

		$users = $this->User_model->user_list();
		$this->load->view('list',array('list'=>$users));
	}

	public function add(){
		$name = $this->input->post('username');

		$row = $this->User_model->add($name);
		if($row > 0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}

	public function del_user($id){
//		$id = $this->input->get('id');

		$rows = $this->User_model->del_user($id);
		if($rows >0){
			redirect('user/user_list');
		}
	}

	public function update_user($id){
		$result = $this->User_model->get_user_by_id($id);
		$this->load->view('update_user',array('user'=>$result));
	}

	public function update($id){
		$name = $this->input->post('username');
		$rows = $this->User_model->update($id,$name);
		if($rows > 0){
			redirect('user/user_list');
		}
		else{
			echo '修改失败';
		}
	}
}
