<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Login extends General{

	function __construct(){
		parent::__construct();	
		$this->load->model('login_model');
		$this->load->model('general_model');
		General::variable();
	}
	
	public function index(){
		if($this->session->userdata('is_logged_in')){
            redirect(base_url().'app/dashboard');
        }else{
            $this->login();        
        }      
	}
	
	function login(){
		$this->session->unset_userdata(array(
                'username'          =>      '',
                'is_logged_in'      =>      false,
				'user_id'			=>		''
        ));
        $this->session->sess_destroy();    
        
		$this->load->view("login",$this->data);		
	}

	function loginNow($username,$password){
		$this->data['usernamelogin'] = $username;
		$this->data['passwordlogin'] = $password;
		$this->load->view("login",$this->data);		
	}
	
	function validate_credentials(){
		if($this->login_model->validate_login()){
			return true;	
		}else{
			$this->form_validation->set_message("validate_credentials","Invalid Login");
			return false;
		}
	}
	
	public function validate_login(){
		$this->form_validation->set_rules("username","Username","trim|xss_clean|required|callback_validate_credentials");	
		$this->form_validation->set_rules("password","Password","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			$user_info = $this->general_model->getUserLoggedIn($this->input->post('username'));
			$this->data = $this->session->set_userdata(array(
                    'username'          =>          $this->input->post('username'),
                    'user_role'         =>          $user_info->user_role,
                    'is_logged_in'      =>          true,
					'user_id'			=>			$user_info->user_id,
					'department'		=>			$user_info->department_id     
             )); 
			 
			 $userModule = $this->login_model->getMyModule($this->session->userdata('user_id'));
			 redirect(base_url().'app/dashboard',$this->data);
			
			 
			 
			 
        }else{
            $this->login();        
        }
	}
	
	public function logout(){
        $this->session->unset_userdata(array(
                'username'          =>      '',
                'is_logged_in'      =>      false,
				'user_id'			=>		''
        ));
        $this->session->sess_destroy();    
        // redirect(base_url().'login');
        redirect(base_url().'');
    }
	
}

















