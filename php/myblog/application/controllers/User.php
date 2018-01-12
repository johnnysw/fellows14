<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function reg(){
		$this->load->view('reg');
	}

	public function add_user(){
		$email = $this->input->get('email');
		$name = $this->input->get('name');
		$pwd = $this->input->get('pwd');
		$pwd2 = $this->input->get('pwd2');
		$gender = $this->input->get('gender');
		$province = $this->input->get('province');
		$city = $this->input->get('city');


		if($pwd != $pwd2){
			echo 'pwd-error';
			die();
		}


		$rows = $this->User_model->add(array(
			'username'=>$name,
			'email'=>$email,
			'password'=>$pwd,
			'sex'=>$gender,
			'province'=>$province,
			'city'=>$city
		));
		if($rows > 0){
//			redirect('user/login');
			echo 'success';
		}else{
			echo 'fail';
		}

	}

}
