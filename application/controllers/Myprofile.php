<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Myprofile extends General{

	function __construct(){
		parent::__construct();	
		$this->load->model('profile_model');
		$this->load->model('app/user_model');
		$this->load->model('general_model');
		General::variable();
	}
	
	public function index(){
		$this->profile();	
	}
	
	public function profile(){
		//$this->session->set_userdata(array('tab'=>'profile', 'module'=>'myprofile'));
		$this->session->set_userdata(array(
				 'tab'			=>		'profile',
				 'module'		=>		'myprofile',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->data['user'] = $this->profile_model->getMyProfile();
		$this->load->view("profile",$this->data);
	}
	
	public function editprofile(){
		if(isset($_POST['btnSubmit'])){
			$this->edit_user();
		}else{
			$this->data['message'] = "";
			$this->session->set_userdata(array('tab'=>'profile', 'module'=>'editprofile'));
			$this->data['user'] = $this->profile_model->getMyProfile(); 
			$this->load->view('editprofile',$this->data);	
		}
	}
	
	function edit_user(){
		$this->form_validation->set_rules("lastname","Last Name","trim|xss_clean|required|callback_validate_name_edit");	
		$this->form_validation->set_rules("firstname","First Name","trim|xss_clean|required");	
		$this->form_validation->set_rules("middlename","Middle Name","trim|xss_clean|required");
		$this->form_validation->set_rules("email","Email Address","trim|xss_clean|required|callback_validate_email_edit");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			//save user
			$this->profile_model->edit_user();
				
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>You have successfully updated your profile!</div>");
			
			$this->data = $this->session->set_userdata('username',$this->input->post('username'));
			
			redirect(base_url().'myprofile/editprofile',$this->data);
			
		}else{
			$this->session->set_userdata(array('tab'=>'profile', 'module'=>'editprofile'));
			$this->data['user'] = $this->profile_model->getMyProfile(); 
			$this->load->view('editprofile',$this->data);	
		}
	}
	
	public function validate_name_edit(){
		if($this->user_model->validate_name_edit()){
			$this->form_validation->set_message('validate_name_edit','User Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_email_edit(){
		if($this->user_model->validate_email_edit()){
			$this->form_validation->set_message('validate_email_edit','Email Address Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_username_edit(){
		if($this->user_model->validate_username_edit()){
			$this->form_validation->set_message('validate_username_edit','Username Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function changepwd(){
		$this->session->set_userdata(array(
				 'tab'			=>		'profile',
				 'module'		=>		'change_pwd',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->data['user'] = $this->profile_model->getMyProfile();
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view("changepwd",$this->data);
	}
	
	public function changepwd2(){
		$this->data['user'] = $this->profile_model->getMyProfile();
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("changepwd",$this->data);
	}
	
	function validate_password(){
		if($this->profile_model->validate_password()){
			return true;	
		}else{
			$this->form_validation->set_message("validate_password","Old Password did not match in your account.");
			return false;
		}
	}	
	
	public function savepwd(){
		$this->form_validation->set_rules("oldPwd","Old Password","trim|xss_clean|required|callback_validate_password");
		$this->form_validation->set_rules("newPwd","New Password","trim|xss_clean|required|matches[conPwd]");	
		$this->form_validation->set_rules("conPwd","Confirm Password","trim|xss_clean|required|matches[newPwd]");	
		$this->form_validation->set_rules("truePwd","","trim|xss_clean|required|md5");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");	
	
		if($this->form_validation->run()){
			//save the data
			
			$this->data = array('password' => $this->input->post('truePwd'));
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('users',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password successfully Changed!</div>");
			//redirect
			redirect(base_url().'myprofile/changepwd',$this->data);
		}else{
			$this->changepwd();	
		}
	}
	
	
	
}