<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Surgical_costing extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/general_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
		// user restriction function
				$this->session->set_userdata('page_name','surgical_costing');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'billing',
				 'module'		=>		'surgical_costing',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		$this->data['surgery_list'] = $this->general_model->surgery_list();
		$this->load->view("app/general/surgical_costing",$this->data);	
	}
	
	
	
	public function print_preview(){
		$this->data['SurgeryName'] = $this->general_model->getSurgeryName();
		$this->data['SurgeryItems'] = $this->general_model->getSurgeryItems();
		$this->data['requestby'] = $this->input->post('requestby');
		$this->data['subjects'] = $this->input->post('subjects');
		$this->load->view("app/general/print_preview",$this->data);	
	}
	
	
	
	
	
	
	
}