<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('authentication_model');  
	}



	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric|max_length[20]|is_unique[creadential.name]',
			array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[80]|is_unique[creadential.email]',
			array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
		if ($this->form_validation->run() == FALSE)
		{
			$message= array(
				'status' =>false,
				'error' =>$this->form_validation->error_array(),
				'message' =>validation_errors()
			);
			$this->response($message,REST_Controller::HTTP_NOT_FOUND);
		}
		else
		{
			$insert_data=[
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')) ,
				'created'=>time(),
				'modified' =>time()
			];
			$result= $this->authentication_model->register_model($insert_data);
			if($result > 0 AND !empty($result))
			{
				$message=[
					'status' =>true,
					'message' =>"User registration successfully"
				];
				$this->response($message,REST_Controller::HTTP_OK);
			}
			else{
				$message=[
					'status' =>FALSE,
					'message' =>"Your Account not Registered"
				];
				$this->response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}




	public function login()
	{ 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$message= array(
				'status' =>false,
				'error' =>$this->form_validation->error_array(),
				'message' =>validation_errors()
			);
			$this->response($message,REST_Controller::HTTP_NOT_FOUND);
		}
		else
		{
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->input->post('password');
			$result= $this->authentication_model->login_model($email,$password);

			if(!empty($result))
			{
				$return_data =[
					'id' =>$result->id,
					'name' =>$result->name,
					'email' =>$result->emai,
					'created' =>$result->created
				];
				$message=[
					'status' =>true,
					'data' =>$return_data,
					'message' =>"User Logedin successfully"
				];
				$this->response($message,REST_Controller::HTTP_OK);
			}
			else{
				$message=[
					'status' =>FALSE,
					'message' =>"Invalid Username or Password"
				];
				$this->response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}

	}

	








}

