<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Surgical_package extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/surgery_model");
		$this->load->model("app/billing_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','surgical_package');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'surgical_package',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->surgical_package();
	}
	
	public function surgical_package($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$department = $this->surgery_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/surgical_package/index/';
 		$config['total_rows'] = $this->surgery_model->count_all();
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
		$this->table->set_heading('Surgery Name', 'Total Cost','Description','Action');
		$i = 0 + $offset;
		
		
		foreach ($department as $department)
		{	
				$this->table->add_row( 
									anchor('app/surgical_package/view/'.$department->surgery_id,$department->surgery_name),
									number_format($department->total_costs,2), 
									$department->surgery_desc, 
									anchor('app/surgical_package/edit/'.$department->surgery_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/surgical_package/delete/'.$department->surgery_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/surgical_package/index',$this->data);	
	}
	
	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_surgical_package');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/surgical_package/add', $this->data);		
	}
	
	public function validate_surgery(){
		if($this->surgery_model->validate_surgery()){
			$this->form_validation->set_message("validate_surgery","Surgery Name Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("surgery_name","Surgery Name","trim|xss_clean|required|callback_validate_surgery");
		$this->form_validation->set_rules("description","Description","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->surgery_model->save();
			
			$value = $this->input->post('surgery_name');
			General::logfile('Surgery Package','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable' id='table1'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Surgery Package successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/surgical_package',$this->data);
			
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_surgical_package');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['surgery'] = $this->surgery_model->getSurgery($id); 
			$this->load->view('app/surgical_package/edit',$this->data);	
		}
	}
	
	public function validate_surgery_edit(){
		if($this->surgery_model->validate_surgery_edit()){
			$this->form_validation->set_message("validate_surgery_edit","Surgery Name Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("surgery_name","Surgery Name","trim|xss_clean|required|callback_validate_surgery_edit");
		$this->form_validation->set_rules("description","Description","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->surgery_model->edit_save();
			
			$value = $this->input->post('surgery_name');
			General::logfile('Surgery Package','UPDATE',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Surgery Name successfully Updated!</div>");
			
			//redirect
			redirect(base_url().'app/surgical_package',$this->data);
			
			
		}else{
				// user restriction function
				$this->session->set_userdata('page_name','update_surgical_package');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['surgery'] = $this->surgery_model->getSurgery($this->input->post('id')); 
			$this->load->view('app/surgical_package/edit',$this->data);	
		}
	
	}
	
	
	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_surgical_package');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->surgery_model->delete($id);
		
		$value = $id;
		General::logfile('Surgery Package','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Surgery successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/surgical_package',$this->data);
	}
	
	public function view($id){
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['surgery'] = $this->surgery_model->getSurgery($id); 
		$this->data['surgery_items'] = $this->surgery_model->surgery_items($id); 
		
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		
		$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
		
		$this->load->view('app/surgical_package_items/index',$this->data);		
	}
	
	public function validate_surgery2(){
		if($this->surgery_model->validate_surgery2()){
			$this->form_validation->set_message("validate_surgery2","Surgery Item Name Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save_item(){
		$this->form_validation->set_rules("particular","Surgery Item","trim|xss_clean|required|callback_validate_surgery2");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->surgery_model->save_item();
			
			$query = "update surgical_package set total_costs = 
					(select sum(costs) from surgical_package_t where surgery_id = '".$this->input->post('surgery_id')."' and InActive = '0')
					where surgery_id = '".$this->input->post('surgery_id')."'";
			$this->db->query($query);
			
			$value = $this->input->post('surgery_name');
			General::logfile('Surgery Item Package','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable' id='table1'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Surgery Package successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/surgical_package/view/'.$this->input->post('surgery_id'),$this->data);
			
			
		}else{
			redirect(base_url().'app/surgical_package/view/'.$this->input->post('surgery_id'),$this->data);
		}
	}
	
	public function delete_item(){
		$m_id = $this->uri->segment("4");
		$surgery_id = $this->uri->segment("5");	
		
		$this->db->query("update surgical_package_t set InActive = '1' where m_id = '".$m_id."'");	
		
		$query = "update surgical_package set total_costs = 
					(select sum(costs) from surgical_package_t where surgery_id = '".$surgery_id ."' and InActive = '0')
					where surgery_id = '".$surgery_id."'";
			$this->db->query($query);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable' id='table1'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Surgery Item successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/surgical_package/view/'.$surgery_id,$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
}