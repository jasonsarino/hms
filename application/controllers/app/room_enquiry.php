<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Room_enquiry extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/room_master_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','room_enquiry');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'room_m',
				 'module'		=>		'room_enquiry',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->room_enquiry();
	}
	
	function room_enquiry(){
		$this->data['room_category'] = $this->general_model->room_category();
		$this->load->view('app/room_enquiry/index', $this->data);		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}