<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Dashboard extends General{

	function __construct(){
		parent::__construct();	
		$this->load->model("app/dashboard_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();
	}
	
	public function index(){
		$this->dashboard();	
	}
	
	public function dashboard(){
		$this->session->set_userdata(array(
				 'tab'			=>		'',
				 'module'		=>		'',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->data['latest_patient'] = $this->dashboard_model->latest_patient();		 
		$this->data['latest_visited_patient'] = $this->dashboard_model->latest_visited_patient();		 
		$this->data['getTodayAppointment'] = $this->dashboard_model->getTodayAppointment();		 
				 
		$this->load->view('app/dashboard',$this->data);	
	}
	
}