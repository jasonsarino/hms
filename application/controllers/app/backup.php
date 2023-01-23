<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Backup extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/backup_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','backup_database');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'backup_database',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		// $this->data['companyInfo'] = $this->general_model->companyInfo();
		// $this->data['message'] = $this->session->flashdata('message');
		$this->load->view('app/general/backup',$this->data);
	}

	public function backup_database()
	{
		

		$this->load->dbutil();
	  	$prefs = array(     
	                'format'      => 'zip',             
	                'filename'    => 'database-file.sql'
	              );
	  	$backup =& $this->dbutil->backup($prefs); 
	  	$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
	    $save = 'backup/'.$db_name;
	  	$this->load->helper('file');
	    write_file($save, $backup); 
	  	$this->load->helper('download');
	    force_download($db_name, $backup);
		


	}
	
	

	
	
	
	
	
	
	
}