<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Roles extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/roles_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
			// user restriction function
				$this->session->set_userdata('page_name','roles');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		//$this->session->set_userdata(array('tab'=>'configuration', 'module'=>'roles'));
		$this->session->set_userdata(array(
				 'tab'			=>		'user_mgnmt',
				 'module'		=>		'roles',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->roles();
	}
	
	public function roles($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$roles = $this->roles_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/roles/index/';
 		$config['total_rows'] = $this->roles_model->count_all();
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
		$this->table->set_heading('Role Name', 'Description','Action');
		$i = 0 + $offset;
		
		
		foreach ($roles as $roles)
		{	
				//if($roles->module == "administrator"){
//					$links = 	anchor('app/roles/view/'.$roles->role_id,$roles->role_name);
//				}else{
//					$links = 	$roles->role_name;	
//				}
				$links = 	anchor('app/roles/view/'.$roles->role_id,$roles->role_name);
				
				$this->table->add_row( 
									$links,
									$roles->role_description, 
									anchor('app/roles/edit/'.$roles->role_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/roles/delete/'.$roles->role_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/roles/index',$this->data);	
	}
	
	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_roles');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/roles/add', $this->data);		
	}
	
	public function view($id){
		$this->data['roles'] = $this->roles_model->getRole($id); 
		$this->data['links'] = $this->roles_model->getPageModule();
		$this->data['message'] = $this->session->flashdata('message');	
		$this->load->view('app/roles/view', $this->data);		
	}
	
	public function save(){
		$this->form_validation->set_rules("role_name","Role Name","trim|xss_clean|required");
		$this->form_validation->set_rules("role_description","role Description","trim|xss_clean|required");	
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			if($this->roles_model->save()){
				//save logfile
				$value = $this->input->post('role_name');
				General::logfile('User Roles','INSERT',$value);
				
				$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data saved successfully!</div>");
			}else{
				$this->session->set_flashdata('message',"<div class='alert alert-warning alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>There was an error in saving the data. Please try again or contact your system administrator.</div>");
			}
			
			//redirect
			redirect(base_url().'app/roles',$this->data);
			
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			//save the data
			if($this->roles_model->update()){
				//save logfile
				$value = $this->input->post('role_name');
				General::logfile('User Roles','UPDATE',$value);
				
				$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data saved successfully!</div>");
			}else{
				$this->session->set_flashdata('message',"<div class='alert alert-warning alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>There was an error in saving the data. Please try again or contact your system administrator.</div>");
			}
			
			//redirect
			redirect(base_url().'app/roles',$this->data);
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_roles');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['roles'] = $this->roles_model->getRole($id); 
			$this->load->view('app/roles/edit',$this->data);	
		}
	}
	
	public function delete($id){
		// user restriction function
				$this->session->set_userdata('page_name','delete_roles');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
				
			//save the data
			if($this->roles_model->delete($id)){
				//save logfile
				$value = $this->input->post('role_name');
				General::logfile('User Roles','DELETE',$value);
				
				$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data deleted successfully!</div>");
			}else{
				$this->session->set_flashdata('message',"<div class='alert alert-warning alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>There was an error in deleting the data. Please try again or contact your system administrator.</div>");
			}
			
			//redirect
			redirect(base_url().'app/roles',$this->data);
	}
	
	public function updateRolePages(){
		$this->db->query("delete from user_roles_pages where role_id = ".$this->input->post('id'));
		
		
		foreach ($this->input->post('page_id') as $key => $value)
		{
			//save access level
			//$this->roles_model->save_access_level($value,$this->input->post('id'));
			$this->data = array(
				'role_id'	=>		$this->input->post('id'),
				'page_id'	=>		$value
			);
			$this->db->insert("user_roles_pages",$this->data);
		}		
		
		$this->data['roles'] = $this->roles_model->getRole($this->input->post('id')); 
		$this->data['links'] = $this->roles_model->getPageModule();
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Permission successfully saved!</div>");	
		redirect(base_url().'app/roles/view/'.$this->input->post('id'),$this->data);
		
	}
	
	
	
}