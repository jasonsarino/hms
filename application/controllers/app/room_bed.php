<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Room_bed extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/room_bed_master_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
				// user restriction function
				$this->session->set_userdata('page_name','room_management');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'room_m',
				 'module'		=>		'room_bed_master',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->room_bed();
	}
	
	public function room_bed($offset = 0){
		$this->session->set_userdata('search_room_bed_master',$this->input->post('search'));

		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$category = $this->room_bed_master_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/room_bed/index/';
 		$config['total_rows'] = $this->room_bed_master_model->count_all();
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
		$this->table->set_heading('Bed No/Name', 'Room No/Name','Floor','Room Type Name','Action');
		$i = 0 + $offset;
		
		
		foreach ($category as $category)
		{	
				$this->table->add_row( 
									$category->bed_name, 
									$category->room_name, 
									$category->floor_name, 
									$category->category_name, 
									anchor('app/room_bed/edit/'.$category->room_bed_id,'Edit').'&nbsp|&nbsp;'.
									anchor('app/room_bed/delete/'.$category->room_bed_id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/room_bed/index',$this->data);	
	}
	
	public function add(){
		// user restriction function
				$this->session->set_userdata('page_name','add_room_management');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->load->view('app/room_bed/add', $this->data);		
	}
	
	
	public function validate_room(){
		if($this->room_bed_master_model->validate_room()){
			$this->form_validation->set_message("validate_room","Room Bed Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("bed_name","Bed Name","trim|xss_clean|required|callback_validate_room");	
		$this->form_validation->set_rules("room","Room","trim|xss_clean|required");		
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->room_bed_master_model->save();
			
			$value = $this->input->post('bed_name');
			General::logfile('Room Bed Master','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Room Bed successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/room_bed',$this->data);
			
			
		}else{
			$this->add();	
		}
	
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_save();
			
		}else{
			// user restriction function
				$this->session->set_userdata('page_name','update_room_management');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['bed'] = $this->room_bed_master_model->getRoom($id); 
			$this->load->view('app/room_bed/edit',$this->data);	
		}
	}
	
	
	public function validate_room_edit(){
		if($this->room_bed_master_model->validate_room_edit()){
			$this->form_validation->set_message("validate_room_edit","Room Bed Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function edit_save(){
		$this->form_validation->set_rules("bed_name","Bed Name","trim|xss_clean|required|callback_validate_room_edit");	
		$this->form_validation->set_rules("room","Room","trim|xss_clean|required");		
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			//save the data
			$this->room_bed_master_model->edit_save();
			
			$value = $this->input->post('bed_name');
			General::logfile('Room Bed Master','UPDATE',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Room Bed successfully Updated!</div>");
			
			//redirect
			redirect(base_url().'app/room_bed',$this->data);
			
			
		}else{
				// user restriction function
				$this->session->set_userdata('page_name','update_room_management');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
			$this->data['bed'] = $this->room_bed_master_model->getRoom($this->input->post('id')); 
			$this->load->view('app/room_bed/edit',$this->data);	
		}
	
	}
	
	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_room_management');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->room_bed_master_model->delete($id);
		
		$value = $id;
		General::logfile('Room Bed Master','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Room Bed successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/room_bed',$this->data);
	}
	
	
	
	
	
	
	
	
	
}