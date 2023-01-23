<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Medicine_category extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/medicine_category_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','medicine_category');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'',
				 'subtab'		=>		'medicine_master',
				 'submodule'	=>		'medicine_category'));
		
		$this->medicine_category();
	}
	
	public function medicine_category($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$category = $this->medicine_category_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/medicine_category/index/';
 		$config['total_rows'] = $this->medicine_category_model->count_all();
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
		$this->table->set_heading('Category Name', 'Description','Action');
		$i = 0 + $offset;
		
		
		foreach ($category as $category)
		{	
		
				$this->table->add_row( 
									$category->med_category_name, 
									$category->med_category_desc, 
									anchor('app/medicine_category/edit/'.$category->cat_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/medicine_category/delete/'.$category->cat_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/medicine_category/index',$this->data);	
	}


	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_medicine_category');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/medicine_category/add', $this->data);		
	}
	
	public function validate_category(){
		if($this->medicine_category_model->validate_category()){
			$this->form_validation->set_message("validate_category","Category Master Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("category","Category Name","trim|xss_clean|required|callback_validate_category");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->medicine_category_model->save();
			
			$value = $this->input->post('category');
			General::logfile('Medicine Category','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medicine Category successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/medicine_category',$this->data);
			
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_medical_category');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['medicine_category'] = $this->medicine_category_model->getCategory($id); 
			$this->load->view('app/medicine_category/edit',$this->data);	
		}
	}
	
	public function validate_category_edit(){
		if($this->medicine_category_model->validate_category_edit()){
			$this->form_validation->set_message("validate_category_edit","Category Master Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("category","Category Name","trim|xss_clean|required|callback_validate_category_edit");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->medicine_category_model->edit_save();
			
			$value = $this->input->post('category');
			General::logfile('Medicine Category','UPDATE',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medicine Category successfully Updated!</div>");
			
			//redirect
			redirect(base_url().'app/medicine_category',$this->data);
			
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_medical_category');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['medicine_category'] = $this->medicine_category_model->getCategory($this->input->post('id')); 
			$this->load->view('app/medicine_category/edit',$this->data);	
		}
	
	}


	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_medical_category');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->medicine_category_model->delete($id);
		
		$value = $id;
		General::logfile('Medicine Category','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medicine Category successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/medicine_category',$this->data);
	}














	
	
}