<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
		$this->load->library('session');
		$this->load->library('Upload');
	}

	public function index()
	{
		if($this->session->userdata('user'))
		{
			$data['dept'] = $this->users_model->get_dept();
			$this->load->view('home',$data);
		}
		else
		{
			$this->load->view('login_page');
		}
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function verify_email()
	{
		$email = $this->input->post('email');
		$data = $this->users_model->verify_email($email);
		echo $data;
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
		$enc_pass = md5($salt.$password);	
		// $hash = password_hash($password,PASSWORD_DEFAULT);		
		$res = $this->users_model->get_password($email,$enc_pass);
		if($res)
		{
			$this->session->set_userdata('user', $res);
			$data['dept'] = $this->users_model->get_dept();
			$this->load->view('home',$data);
		}
		else
		{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found!!');
		} 
	}

	public function insert_data()
	{
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
		$enc_pass = md5($salt.$password);	
		$array = array('firstname'=>$firstname,'lastname'=>$lastname,'email' =>$email,'password' =>$enc_pass);
		$res = $this->users_model->insert_data($array);
		if($res)
		{
			$this->session->set_userdata('user', $array);
			$data['dept'] = $this->users_model->get_dept();
			$this->load->view('home',$data);
		}
		else
		{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Some Error Occurred, try again!!');
		} 
	}

	public function home()
	{
		if($this->session->userdata('user'))
		{
			$data['dept'] = $this->users_model->get_dept();
			$this->load->view('home',$data);
		}
		else
		{
			redirect('/');
		}		
	}

	public function getSubDept()
	{
		$dept = $this->input->post('dept');
        $res = $this->users_model->getSubDept($dept);
        foreach($res as $c)
        {
		    $data .= "<option value='".$c['id']."' ";
			$data .= ">";
			$data .= $c['sub_dept'];
			$data .="</option>";
		}
        echo $data;
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('/');
	}

	public function update()
	{
		// var_dump($_FILES);die;
		$id = $this->input->post('id');
		$dept = $this->input->post('dept');
		$image = base64_encode($_FILES['img']);
		// var_dump($image);die;
		$data = array('photo'=>$image,'department'=>$dept);
		$res = $this->users_model->update_data($data,$id);
		$this->session->set_userdata('user', $res);
		$data['dept'] = $this->users_model->get_dept();
		$this->load->view('home',$data);
	}
}
