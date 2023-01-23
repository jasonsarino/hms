<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class User extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/user_model");
		$this->load->model("general_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
		
	}
	
	public function index(){	
	

		//$this->session->set_userdata(array('tab'=>'admin', 'module'=>'user'));
		
		$this->session->set_userdata(array(
				 'tab'			=>		'user_mgnmt',
				 'module'		=>		'user_index',
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
		
		$this->user();
	}
	
	public function user($offset = 0){
		$this->session->set_userdata('search_user',$this->input->post('search'));	

		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$user = $this->user_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/user/index/';
 		$config['total_rows'] = $this->user_model->count_all();
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
		$this->table->set_heading('User ID', 'Name','Designation','Department','Email Address','Status','Actions');
		$i = 0 + $offset;
		
		
		foreach ($user as $user)
		{	
				if($user->InActive == 1){
					$cStatus = "<font color='red'>InActive</font>";
					$InActive = anchor('app/user/activate/'.$user->user_id,'Activate',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to Activate this user?')"));
				}else{
					$cStatus = "Active";
					$InActive = anchor('app/user/delete/'.$user->user_id,'InActive',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to InActive this user?')"));
				}
				
				$this->table->add_row( 
									anchor('app/user/view/'.$user->user_id,$user->user_id),
									$user->name, 
									$user->designation, 
									$user->dept_name, 
									$user->email_address, 
									$cStatus, 
									anchor('app/user/edit/'.$user->user_id,'Edit').'&nbsp|&nbsp;'.
									$InActive
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/user/index',$this->data);	
	}
	
	public function upload_picture($id){
		$this->data['user_id'] = $id;
		$this->data['user'] = $this->user_model->getUser($id); 
		$this->data['error'] = "";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view('app/user/upload_picture',$this->data);	
	}
	
	public function upload_na(){
		$config = array(
					'allowed_types'		=>		'jpg|jpeg|gif|png',
					'upload_path'		=>		realpath('public/user_picture'),
					'max_size'			=>		2000
					);
		
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload()){
			//$this->session->set_flashdata('message',"<div class='alert alert-block'><a class='close' data-dismiss='alert' href='#'>&times;</a>".$this->upload->display_errors()."</div>");
			$this->session->set_flashdata('message',"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$this->upload->display_errors()."</div>");
			redirect(base_url().'app/user/upload_picture/'.$this->input->post('user_id'),$this->data);
		}else{
			
			$image_data = $this->upload->data();
			$this->user_model->uploadImg($image_data,$this->input->post('user_id'));
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Profile successfully Uploaded</div>");
			redirect(base_url().'app/user/upload_picture/'.$this->input->post('user_id'),$this->data);
		}
	}
	
	public function activate($id){
		$this->data['user'] = $this->user_model->activate($id); 
		
		//logfile
		$value = $id;
		General::logfile('User','ACTIVATE USER',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>User successfully Activated!</div>");
			
		redirect(base_url().'app/user',$this->data);
	}
	
	public function delete($id){
			// user restriction function
			$this->session->set_userdata('page_name','delete_user');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			
			
		$this->data['user'] = $this->user_model->delete($id); 
		
		//logfile
		$value = $id;
		General::logfile('User','INACTIVE USER',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>User successfully InActive!</div>");
			
		redirect(base_url().'app/user',$this->data);
	}
	
	public function view($id){
		$this->data['user'] = $this->user_model->getUser($id); 
		$this->load->view('app/user/view',$this->data);	
	}
	
	public function add(){
		// user restriction function
		$this->session->set_userdata('page_name','add_user');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function
		
		
		$this->session->set_userdata(array(
				 'tab'			=>		'user_mgnmt',
				 'module'		=>		'add_user',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->data['lastUserID'] = $this->user_model->lastUserID();
		
		$this->load->view('app/user/add', $this->data);		
	}
	
	public function validate_name(){
		if($this->user_model->validate_name()){
			$this->form_validation->set_message('validate_name','User Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_email(){
		if($this->user_model->validate_email()){
			$this->form_validation->set_message('validate_email','Email Address Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_username(){
		if($this->user_model->validate_username()){
			$this->form_validation->set_message('validate_username','Username Already Exists.');
			return false;
		}else{
			return true;
		}
	}

	public function changepassword()
	{
		$this->form_validation->set_rules("newpassword","New Password","trim|xss_clean|required");
		$this->form_validation->set_rules("retypepassword","Re-type Password","trim|xss_clean|required|matches[newpassword]");
		$this->form_validation->set_error_delimiters('', '<br>');
	
		if($this->form_validation->run())
		{
			// save data array
			$result = $this->user_model->changepassword();

			if($result)
			{

				$data = array('status' => 0, 'message' => 'Password has been changed.');
			}
			else
			{
				$data = array('status' => 1, 'message' => "There's an error in updating the data.");
			}
		}
		else
		{
			$data = array('status' => 1, 'message' => validation_errors());
		}

		echo json_encode($data);
	}
	
	public function save(){
		$this->form_validation->set_rules("lastname","Last Name","trim|xss_clean|required|callback_validate_name");	
		$this->form_validation->set_rules("firstname","First Name","trim|xss_clean|required");	
		$this->form_validation->set_rules("middlename","Middle Name","trim|xss_clean|required");
		$this->form_validation->set_rules("email","Email Address","trim|xss_clean|required|callback_validate_email");
		$this->form_validation->set_rules("username","Username","trim|xss_clean|required|callback_validate_username");
		$this->form_validation->set_rules("password","Password","trim|xss_clean|required|md5");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			//save user
			$this->user_model->save_user();
			
			//update employeeID autonumber();
			$this->user_model->updateAutoNum();
			
			//logfile
			$value = $this->input->post('firstname')." ".$this->input->post('middlename')." ".$this->input->post('lastname');
			General::logfile('User','INSERT',$value);
				
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data saved successfully!</div>");
			
			redirect(base_url().'app/user',$this->data);
			
		}else{
			$this->add();
		}
	}
	
	public function edit($id = 0){
		if(isset($_POST['btnSubmit'])){
			
			$this->edit_user();
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','update_user');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
		
		
			$this->data['user'] = $this->user_model->getUser($id); 
			$this->load->view('app/user/edit',$this->data);	
		}
	}
	
	function edit_user(){
		$this->form_validation->set_rules("lastname","Last Name","trim|xss_clean|required|callback_validate_name_edit");	
		$this->form_validation->set_rules("firstname","First Name","trim|xss_clean|required");	
		$this->form_validation->set_rules("middlename","Middle Name","trim|xss_clean|required");
		$this->form_validation->set_rules("username","Username","trim|xss_clean|required");
		$this->form_validation->set_rules("email","Email Address","trim|xss_clean|required|callback_validate_email_edit");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			
			//save user
			$this->user_model->edit_user();
			
			
			//logfile
			$value = $this->input->post('firstname')." ".$this->input->post('middlename')." ".$this->input->post('lastname');
			General::logfile('User','UPDATE',$value);
				
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data updated successfully!</div>");
			
			redirect(base_url().'app/user',$this->data);
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','update_user');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			
			$this->data['user'] = $this->user_model->getUser($this->input->post('userid')); 
			$this->load->view('app/user/edit',$this->data);	
		}
	}
	
	public function validate_name_edit(){
		if($this->user_model->validate_name_edit()){
			$this->form_validation->set_message('validate_name_edit','User Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_email_edit(){
		if($this->user_model->validate_email_edit()){
			$this->form_validation->set_message('validate_email_edit','Email Address Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	public function validate_username_edit(){
		if($this->user_model->validate_username_edit()){
			$this->form_validation->set_message('validate_username_edit','Username Already Exists.');
			return false;
		}else{
			return true;
		}
	}
	
	
	
	
}