<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->select("A.user_id,
					concat(D.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as name,
					C.designation,
					B.dept_name,
					A.email_address,
					A.InActive",false);
		$where = "(A.lastname like '%".$this->session->userdata("search_user")."%' 
					or A.firstname like '%".$this->session->userdata("search_user")."%' 
					or A.user_id like '%".$this->session->userdata("search_user")."%' 
					or C.designation like '%".$this->session->userdata("search_user")."%' 
					or B.dept_name like '%".$this->session->userdata("search_user")."%' 
					or A.email_address like '%".$this->session->userdata("search_user")."%' 
					or A.InActive like '%".$this->session->userdata("search_user")."%')";
		$this->db->where($where);
		$this->db->join("department B","B.department_id = A.department","left outer");
		$this->db->join("designation C","C.designation_id = A.designation","left outer");
		$this->db->join("system_parameters D","D.param_id = A.title","left outer");
		$this->db->order_by('A.user_id','asc');
		$query = $this->db->get("users A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("A.user_id,
					concat(D.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as name,
					C.designation,
					B.dept_name,
					A.email_address,
					A.InActive",false);
		$where = "(A.lastname like '%".$this->session->userdata("search_user")."%' 
					or A.firstname like '%".$this->session->userdata("search_user")."%' 
					or A.user_id like '%".$this->session->userdata("search_user")."%' 
					or C.designation like '%".$this->session->userdata("search_user")."%' 
					or B.dept_name like '%".$this->session->userdata("search_user")."%' 
					or A.email_address like '%".$this->session->userdata("search_user")."%' 
					or A.InActive like '%".$this->session->userdata("search_user")."%')";
		$this->db->where($where);
		$this->db->join("department B","B.department_id = A.department","left outer");
		$this->db->join("designation C","C.designation_id = A.designation","left outer");
		$this->db->join("system_parameters D","D.param_id = A.title","left outer");
		$this->db->order_by('A.user_id','asc');
		$query = $this->db->get("users A");
		return $query->num_rows();
	}
	
	public function lastUserID(){
		$this->db->select("(cValue + 1) as cValue");
		$this->db->where(array('cCode'=>'employee_no','InActive'=>0));
		$query = $this->db->get("system_option");
		return $query->row();	
	}
	
	
	public function validate_username(){
		$this->db->select("username");
		$this->db->where(array(
			'username'		=>		$this->input->post('username'),
			'InActive'		=>		0
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function validate_email(){
		$this->db->select("email_address");
		$this->db->where(array(
			'email_address'	=>	$this->input->post('email'),
			'InActive'		=>	0
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function validate_name(){
		$this->db->select("lastname");
		$this->db->where(array(
			'lastname'		=>		$this->input->post('lastname'),
			'firstname'		=>		$this->input->post('firstname'),
			'InActive'		=>		0
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function save_user(){
		$age = 0;
		$dob = strtotime($this->input->post('birthday'));
		$tdate = strtotime(date("Y-m-d"));
		while( $tdate > $dob = strtotime('+1 year', $dob))
        {
                ++$age;
        }
		
		$this->data = array(
			'user_id'			=>		$this->input->post('userid'),
			'department'		=>		$this->input->post('department'),
			'designation'		=>		$this->input->post('designation'),
			'user_role'			=>		$this->input->post('user_role'),
			'cType'				=>		$this->input->post('cType'),
			'title'				=>		$this->input->post('title'),
			'lastname'			=>		$this->input->post('lastname'),
			'firstname'			=>		$this->input->post('firstname'),
			'middlename'		=>		$this->input->post('middlename'),
			'age'				=>		$age,
			'street'			=>		$this->input->post('noofhouse'),
			'subd_brgy'			=>		$this->input->post('brgy'),
			'province'			=>		$this->input->post('province'),
			'phone_no'			=>		$this->input->post('phone'),
			'mobile_no'			=>		$this->input->post('mobile'),
			'gender'			=>		$this->input->post('gender'),
			'civil_status'		=>		$this->input->post('civil_status'),
			'birthday'			=>		$this->input->post('birthday'),
			'birthplace'		=>		$this->input->post('birthplace'),
			'email_address'		=>		$this->input->post('email'),
			'username'			=>		$this->input->post('username'),
			'password'			=>		$this->input->post('password'),
			'InActive'			=>		0
		);	
		$this->db->insert("users",$this->data);
		
	}
	
	
	public function updateAutoNum(){
		$this->db->where(array(
			'cCode'			=>		'employee_no',
			'InActive'		=>		0
		));	
		$this->data = array('cValue'	=>		$this->input->post('userID2'));
		$this->db->update("system_option",$this->data);
	}
	
	public function getUser($id){
		$this->db->where("user_id",$id);
		$query = $this->db->get("users");
		return $query->row();	
	}
	
	public function validate_username_edit(){
		$this->db->select("username");
		$this->db->where(array(
			'username'		=>		$this->input->post('username'),
			'InActive'		=>		0,
			'user_id !='	=>		$this->input->post('userid')
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function validate_email_edit(){
		$this->db->select("email_address");
		$this->db->where(array(
			'email_address'	=>	$this->input->post('email'),
			'InActive'		=>	0,
			'user_id !='	=>		$this->input->post('userid')
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function validate_name_edit(){
		$this->db->select("lastname");
		$this->db->where(array(
			'lastname'		=>		$this->input->post('lastname'),
			'firstname'		=>		$this->input->post('firstname'),
			'InActive'		=>		0,
			'user_id !='	=>		$this->input->post('userid')
		));	
		$query = $this->db->get("users");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function edit_user(){
		$age = 0;
		$dob = strtotime($this->input->post('birthday'));
		$tdate = strtotime(date("Y-m-d"));
		while( $tdate > $dob = strtotime('+1 year', $dob))
        {
                ++$age;
        }
		
		$this->data = array(
			'department'		=>		$this->input->post('department'),
			'designation'		=>		$this->input->post('designation'),
			'user_role'			=>		$this->input->post('user_role'),
			'cType'				=>		$this->input->post('cType'),
			'title'				=>		$this->input->post('title'),
			'lastname'			=>		$this->input->post('lastname'),
			'firstname'			=>		$this->input->post('firstname'),
			'middlename'		=>		$this->input->post('middlename'),
			'age'				=>		$age,
			'street'			=>		$this->input->post('noofhouse'),
			'subd_brgy'			=>		$this->input->post('brgy'),
			'province'			=>		$this->input->post('province'),
			'phone_no'			=>		$this->input->post('phone'),
			'mobile_no'			=>		$this->input->post('mobile'),
			'gender'			=>		$this->input->post('gender'),
			'civil_status'		=>		$this->input->post('civil_status'),
			'birthday'			=>		$this->input->post('birthday'),
			'birthplace'		=>		$this->input->post('birthplace'),
			'username'			=>		$this->input->post('username'),
			'email_address'		=>		$this->input->post('email')
		);	
		$this->db->where('user_id', $this->input->post('userid'));
		$this->db->update("users",$this->data);
	}
	
	public function delete($id){
		$this->db->where('user_id',$id);
		$this->data = array('InActive'=>1);
		$this->db->update("users",$this->data);	
	}
	
	public function activate($id){
		$this->db->where('user_id',$id);
		$this->data = array('InActive'=>0);
		$this->db->update("users",$this->data);	
	}
	
	public function uploadImg($image_data = array(),$emp_id){
		$this->data = array(
			'picture'	=>		$image_data['file_name']
		);
		$this->db->where('user_id',$emp_id);
		$this->db->update('users',$this->data);
		

	}

	public function changepassword()
	{
		$this->data = array(
			'password'				=>		md5($this->input->post('newpassword'))
		);	
		$this->db->where('user_id',$this->input->post('userid'));
		$result = $this->db->update("users",$this->data);

		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	
	
	
	
	
	
}