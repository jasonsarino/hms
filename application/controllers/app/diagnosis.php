<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Diagnosis extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/diagnosis_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
		// user restriction function
		$this->session->set_userdata('page_name','diagnosis');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function
				
		//$this->session->set_userdata(array('tab'=>'admin', 'module'=>'designation'));
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'diagnosis',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->diagnosis();
	}
	
	public function diagnosis($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$diagnosis = $this->diagnosis_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/diagnosis/index/';
 		$config['total_rows'] = $this->diagnosis_model->count_all();
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
		$this->table->set_heading('Diagnosis Name', 'Description','Action');
		$i = 0 + $offset;
		
		
		foreach ($diagnosis as $diagnosis)
		{	
				$this->table->add_row( 
									$diagnosis->diagnosis_name, 
									$diagnosis->diagnosis_desc, 
									anchor('app/diagnosis/edit/'.$diagnosis->diagnosis_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/diagnosis/delete/'.$diagnosis->diagnosis_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/diagnosis/index',$this->data);	
	}
	
	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_diagnosis');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/diagnosis/add', $this->data);		
	}
	
	public function validate_diagnosis(){
		if($this->diagnosis_model->validate_diagnosis()){
			$this->form_validation->set_message("validate_diagnosis","Diagnosis Name Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("diagnosis","Diagnosis Name","trim|xss_clean|required|callback_validate_diagnosis");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->diagnosis_model->save();
			
			$value = $this->input->post('diagnosis');
			General::logfile('Diagnosis','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/diagnosis',$this->data);
			
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
		}else{
				// user restriction function
				$this->session->set_userdata('page_name','update_diagnosis');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
			$this->data['diagnosis'] = $this->diagnosis_model->getDiagnosis($id);	
			$this->load->view('app/diagnosis/edit',$this->data);	
		}
	}
	
	public function validate_diagnosis_edit(){
		if($this->diagnosis_model->validate_diagnosis_edit()){
			$this->form_validation->set_message("validate_diagnosis_edit","Diagnosis Name Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("diagnosis","Diagnosis Name","trim|xss_clean|required|callback_validate_diagnosis_edit");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->diagnosis_model->edit_save();
			
			$value = $this->input->post('diagnosis');
			General::logfile('Diagnosis','UPDATE',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Updated!</div>");
			
			//redirect
			redirect(base_url().'app/diagnosis',$this->data);
			
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_diagnosis');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
			$this->data['diagnosis'] = $this->diagnosis_model->getDiagnosis($this->input->post('id'));	
			$this->load->view('app/diagnosis/edit',$this->data);	
		}
	
	}
	
	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_diagnosis');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->diagnosis_model->delete($id);
		
		$value = $id;
		General::logfile('Diagnosis','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/diagnosis',$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}