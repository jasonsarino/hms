<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Company_information extends General{

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
				$this->session->set_userdata('page_name','company_information');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function		
				
				 
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'company_information',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->data['companyInfo'] = $this->general_model->companyInfo();
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view('app/general/company_information',$this->data);
	}
	
	public function save()
	{

		$logo = $this->input->post('old_logo');
		$isUpload = TRUE;
		$msg = array();

		if (!empty($_FILES['logo']['name']))
		{
			$config = array(
				'allowed_types'		=>		'jpg|jpeg|png|gif',
				'upload_path'		=>		realpath('public/company_logo'),
				'max_size'			=>		2000
			);

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo'))
	        {
	            $upload_data = $this->upload->data();

	            $logo = $upload_data['file_name'];

	        } else 
	        {
	            array_push($msg, $this->upload->display_errors());
	            $isUpload = FALSE;
	        }

		}

		if($isUpload) 
		{
			$this->data = array(
				'company_name'			=>		$this->input->post('company_name'),
				'company_address'		=>		$this->input->post('company_address'),
				'company_contactNo'		=>		$this->input->post('contact'),
				'TIN'					=>		$this->input->post('tin'),
				'logo'					=>		$logo
			);	
			$result = $this->db->update("company_info",$this->data);
			
			if($result)
			{
				$value = $this->input->post('company_name');
				General::logfile('Company Information','INSERT',$value);
				array_push($msg, "Company Information has been saved");
			}
			else
			{
				array_push($msg, "Their's an error in saving data.");
			}
		}
		

		
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable' id='table1'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".implode("<br>", $msg)."</div>");
			
		//redirect
		redirect(base_url().'app/company_information',$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
}