<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function verify_email($email) 
		{
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;				
		}
		
		public function get_password($email, $password)
		{
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			// var_dump($this->db->last_query());die;
			return $query->row_array();
		}

		public function get_dept()
		{
			return $this->db->get('department_master')->result_array();
		}
		
		public function getSubDept($data)
		{
			$query = $this->db->where('id',$data)->get('department_master');
			return $query->result_array();
		}

		public function insert_data($data)
		{
			$sql = $this->db->insert('users',$data);
			if($sql)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function update_data($data,$id)
		{
			// $sql= $this->db->set($data)->where('id',$id)->update('users');
			$sql = $this->db->where('id',$id)->update('users',$data);
			if($sql)
			{
				$query = $this->db->where('id',$id)->get('users');
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}
	}
?>