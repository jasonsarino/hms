<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Insurance_company extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/insurance_company_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','insurance_company');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'insurance_company',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->insurance();
	}
	
	public function insurance($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$insurance = $this->insurance_company_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/room_master/index/';
 		$config['total_rows'] = $this->insurance_company_model->count_all();
 		$config['per_page'] = $this->limit;
		
		
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<ul class="pagination pagination no-margin pull-right">';
		$config['full_tag_close'] = '</ul><!--pagination-->';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$this->data['pagination'] = $this->pagination->create_links();
	
		$tmpl = array('table_open' => '<table class="table table-hover table-striped">');
        $this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Company Name', 'Company Address','Email Address','Action');
		$i = 0 + $offset;
		
		
		foreach ($insurance as $insurance)
		{	
		
				$this->table->add_row( 
									anchor('app/insurance_company/view/'.$insurance->in_com_id,$insurance->company_name),
									$insurance->company_address, 
									$insurance->email_address, 
									anchor('app/insurance_company/edit/'.$insurance->in_com_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/insurance_company/delete/'.$insurance->in_com_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/insurance_company/index',$this->data);	
	}
	
	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_insurance_company');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/insurance_company/add', $this->data);		
	}
	
	public function validate_company(){
		if($this->insurance_company_model->validate_company()){
			$this->form_validation->set_message("validate_company","Insurance Company Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("company_name","Company Name","trim|xss_clean|required|callback_validate_company");	
		$this->form_validation->set_rules("email_address","Email Address","trim|xss_clean|required|valid_email");	
		$this->form_validation->set_rules("contact_email","Contact Email Address","trim|xss_clean|required|valid_email");
		$this->form_validation->set_rules("phone_no","Phone No.","trim|xss_clean|required");
		$this->form_validation->set_rules("address","Company Address","trim|xss_clean|required");	
		$this->form_validation->set_rules("contact_person","Contact Person","trim|xss_clean|required");	
		$this->form_validation->set_rules("contact_no_person","Contact Person","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->insurance_company_model->save();

			$value = $this->input->post('company_name');
			General::logfile('Insurance Company','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Insurance Company successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/insurance_company',$this->data);
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_insurance_company');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['insurance_companyList'] = $this->insurance_company_model->getInsurance_company($id); 
			$this->load->view('app/insurance_company/edit',$this->data);	
		}
	}
	
	public function validate_company_edit(){
		if($this->insurance_company_model->validate_company_edit()){
			$this->form_validation->set_message("validate_company_edit","Insurance Company Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("company_name","Company Name","trim|xss_clean|required|callback_validate_company_edit");	
		$this->form_validation->set_rules("email_address","Email Address","trim|xss_clean|required|valid_email");	
		$this->form_validation->set_rules("contact_email","Contact Email Address","trim|xss_clean|required|valid_email");
		$this->form_validation->set_rules("phone_no","Phone No.","trim|xss_clean|required");
		$this->form_validation->set_rules("address","Company Address","trim|xss_clean|required");	
		$this->form_validation->set_rules("contact_person","Contact Person","trim|xss_clean|required");	
		$this->form_validation->set_rules("contact_no_person","Contact Person","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->insurance_company_model->edit_save();

			$value = $this->input->post('company_name');
			General::logfile('Insurance Company','UPDATE',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Insurance Company successfully Updated!</div>");
			
			//redirect
			redirect(base_url().'app/insurance_company',$this->data);
			
		}else{
			
			// user restriction function
				$this->session->set_userdata('page_name','update_insurance_company');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['insurance_companyList'] = $this->insurance_company_model->getInsurance_company($this->input->post('id')); 
			$this->load->view('app/insurance_company/edit',$this->data);	
			
			
		}
	
	}
	
	
	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_insurance_company');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->insurance_company_model->delete($id);
		
		$value = $id;
		General::logfile('Insurance Company','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Insurance Company successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/insurance_company',$this->data);
	}
	
	
	public function view($id){
		
		$this->data['insurance_companyList'] = $this->insurance_company_model->getInsurance_company($id);
		
		$this->load->view("app/insurance_company/view",$this->data);			
	}
	
	
	
	
	
	
}