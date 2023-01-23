<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Profile_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
		date_default_timezone_set("Asia/Manila");
	}
	
	public function getMyProfile(){
		$this->db->where('username', $this->session->userdata('username'));	
		$query = $this->db->get("users");
		return $query->row();
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
			'username'		=>		$this->input->post('username')
		);	
		$this->db->where('user_id', $this->input->post('userid'));
		$this->db->update("users",$this->data);
	}
	
	public function validate_password(){
		$this->db->select("password");
		 $this->db->where(array(
                'password'      =>      md5($this->input->post('oldPwd')),
				'user_id'		=>		$this->session->userdata('user_id')
        ));
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
	}
	
	
	
	
	
	
	
	
	
}