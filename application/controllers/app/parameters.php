<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Parameters extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/parameters_model");
		$this->load->model("general_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
		
	}
	
	public function index(){	
		
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'parameters',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		// user restriction function
		$this->session->set_userdata('page_name','view_user');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function
		
		$this->parameters();
	}
	
	public function parameters(){
		$this->data['param_list'] = $this->parameters_model->param_list();
		$this->load->view("app/parameters/index",$this->data);
	}
	
	public function lists($module){
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['lists'] = $this->parameters_model->lists($module);
		$this->data['module'] = $module;
		$this->load->view("app/parameters/lists",$this->data);
	}
	
	public function add($module){
		// user restriction function
		$this->session->set_userdata('page_name','add_sys_param');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function
		
		$this->data['module'] = $module;
		$this->load->view('app/parameters/add', $this->data);		
	}
	
	public function validate_param(){
		if($this->parameters_model->validate_param()){
			$this->form_validation->set_message('validate_param','Parameters Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("cCode","CODE","trim|xss_clean|required|callback_validate_param");	
		$this->form_validation->set_rules("cValue","VALUE","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			//save user
			$this->parameters_model->save();
			
			//logfile
			$value = $this->input->post('cCode')." ->".$this->input->post('cValue');
			General::logfile('System Parameters','INSERT',$value);
				
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Parameters successfully saved!</div>");
			
			redirect(base_url().'app/parameters/lists/'.$this->input->post('module'),$this->data);
			
		}else{
			$this->add($this->input->post('module'));
		}	
	}
	
	public function delete(){
		$module = $this->uri->segment("4");
		$id = $this->uri->segment("5");
		
			// user restriction function
			$this->session->set_userdata('page_name','delete_sys_param');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			
			
		$this->data['user'] = $this->parameters_model->delete($id); 
		
		//logfile
		$value = $id;
		General::logfile('User','INACTIVE USER',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Parameters successfully deleted!</div>");
			
		redirect(base_url().'app/parameters/lists/'.$module,$this->data);
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','update_sys_param');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
		
		
			$this->data['param'] = $this->parameters_model->getParam($id); 
			$this->load->view('app/parameters/edit',$this->data);	
		}
	}
	
	public function validate_param_edit(){
		if($this->parameters_model->validate_param_edit()){
			$this->form_validation->set_message('validate_param_edit','Parameters Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("cCode","CODE","trim|xss_clean|required|callback_validate_param_Edit");	
		$this->form_validation->set_rules("cValue","VALUE","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			//save user
			$this->parameters_model->update();
			
			//logfile
			$value = $this->input->post('cCode')." ->".$this->input->post('cValue');
			General::logfile('System Parameters','INSERT',$value);
				
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Parameters successfully saved!</div>");
			
			redirect(base_url().'app/parameters/lists/'.$this->input->post('cCode'),$this->data);
			
		}else{
		
		
		//echo $this->input->post('id');
			$this->data['param'] = $this->parameters_model->getParam($this->input->post('id')); 
			$this->load->view('app/parameters/edit',$this->data);	
		}	
	}
	
	
	
	
	
	
}