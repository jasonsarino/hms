<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Landingpage extends General{

	function __construct(){
		parent::__construct();	
		$this->load->model('login_model');
		$this->load->model('general_model');

		$this->session->unset_userdata(array(
                'username'          =>      '',
                'is_logged_in'      =>      false,
				'user_id'			=>		''
        ));
    	$this->session->sess_destroy();  

    	General::variable(); 

    	// if($this->session->userdata('is_logged_in')){
     //        redirect(base_url().'app/dashboard');
     //    }else{
     //    	General::variable();
     //        $this->landingpage();        
     //    }       

		
	}
	
	public function index(){
		if($this->session->userdata('is_logged_in')){
            redirect(base_url().'app/dashboard');
        }else{
        	
            $this->landingpage();        
        }      
	}
	
	function landingpage(){
		$this->session->unset_userdata(array(
	                'username'          =>      '',
	                'is_logged_in'      =>      false,
					'user_id'			=>		''
	        ));
        	$this->session->sess_destroy();    

        define('expired', true);

        if(expired)
        {
        	$this->load->view("trial-expired",$this->data);		
        }
        else
        {
        	$this->load->view("login-details",$this->data);		
        }

	}
	
	
}

















