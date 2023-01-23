<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Ipd extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/ipd_model");
		$this->load->model("app/opd_model");
		$this->load->model("app/billing_model");
		$this->load->model("general_model");
		$this->load->model("app/patient_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index($offset = 0){
		// user restriction function
				$this->session->set_userdata('page_name','ipd_enquiry');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function		
				
				 
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'ipd',
				 'submodule'	=>		'ipd_master'));
		
		//set session in textfield to paginate the table		 
		$this->session->set_userdata(array(
			'search_ipd'				=>		$this->input->post('search'),
			'search_ipd_cFrom'			=>		$this->input->post('cFrom'),
			'search_ipd_cTo'			=>		$this->input->post('cTo'),
			'search_ipd_department'		=>		$this->input->post('department'),
			'search_ipd_doctor'			=>		$this->input->post('doctor')
		));		 
				 
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$patient = $this->ipd_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/opd/search_result/';
 		$config['total_rows'] = $this->ipd_model->count_all();
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
		$this->table->set_heading('IPD No','Patient No','Patient Name','Date Admit','Department','Room & Bed No.','Incharge Doctor','Status');
		$i = 0 + $offset;
		
		
		foreach ($patient as $patient)
		{	
				if($patient->nStatus == "Pending"){ 
					$nStatus = "Checked In";
					$discharge = anchor('app/ipd/discharge/'.$patient->IO_ID.'/'.$patient->patient_no,'Discharge',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to discharge patient?')"));
				}else{ 
					$nStatus = "Discharged";
					$discharge = "Discharged";
				}
				
				$this->table->add_row( 
									$patient->IO_ID,
									$patient->patient_no,
									$patient->name, 
									date('M d, Y',strtotime($patient->date_visit))." ".date('H:i:s',strtotime($patient->time_visit)), 
									$patient->dept_name, 
									"Rm ".$patient->room_name." Bed No.".$patient->bed_name, 
									$patient->doctor,
									$nStatus,
									$discharge
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/ipd/index',$this->data);	
	}
	
	public function discharge(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient successfully discharged!</div>");
		
		//update patient's status to discharged
		$this->db->query("update patient_details_iop set nStatus = 'Discharged' where IO_ID = '".$iop_no."' and patient_no = '".$patient_no."'");
		
		//update bed status to vacant and remove patient has been admitted
		$this->db->query("update room_beds set nStatus = 'Vacant',patient_no = '' where patient_no = '".$iop_no."'");
		
		redirect(base_url().'app/ipd/index/'.$iop_no.'/'.$patient_no);
	}
	
	public function registration(){
		
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'ipd',
				 'submodule'	=>		'ipd_registration'));
				 
		$this->load->view("app/ipd/registration",$this->data);	
	}
	
	public function admit(){
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'ipd',
				 'submodule'	=>		'ipd_registration'));
				 
				 
		$patient_no = $this->uri->segment("4");
		
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['room_category'] = $this->general_model->room_category();
		$this->data['lastIPDNo'] = $this->general_model->lastIPDNo();
		
		$this->load->view("app/ipd/admit",$this->data);		
	}

	public function getRoomMaster(){
		
		$roomType = $this->uri->segment("4");
		$occupied = $this->uri->segment("5");	
		
		$this->data['getRoomMaster'] = $this->ipd_model->getRoomMaster($roomType,$occupied);
		$this->load->view("app/ipd/getRoomMaster",$this->data);
		
	}
	
	public function getBeds($room_id){
		
		$this->data['getBeds'] = $this->general_model->getBeds($room_id);
		$this->load->view("app/ipd/getBeds",$this->data);
		
	}
	
	public function getRoomMaster2(){
		
		$roomType = $this->uri->segment("4");
		$occupied = $this->uri->segment("5");	
		
		$this->data['getRoomMaster'] = $this->ipd_model->getRoomMaster($roomType,$occupied);
		$this->load->view("app/ipd/getRoomMaster2",$this->data);
		
	}
	
	public function getBeds2($room_id){
		
		$this->data['getBeds'] = $this->general_model->getBeds($room_id);
		$this->load->view("app/ipd/getBeds2",$this->data);
		
	}
	
	public function validate_ipd(){
		if($this->ipd_model->validate_ipd()){
			$this->form_validation->set_message("validate_ipd","IPD Patient Already Exists.");
			return false;
		}else{
			return true;
		}	
	}
	
	public function save_ipd(){
		$this->form_validation->set_rules("patient_no","Patient No.","trim|xss_clean|required|callback_validate_ipd");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			$this->ipd_model->save();
			
			//update bed
			$this->ipd_model->updateBed();
			
			//save patient room
			$this->ipd_model->savepatientRoom();
			
			
			
			$this->db->where(array("cCode"=>"INPATIENTNO", 'InActive' => 0));
			$this->db->update('system_option',array('cValue'=>$this->input->post('iopNo2')));
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>IPD Patient successfully saved!</div>");
			
			//redirect
			redirect(base_url().'app/ipd/index',$this->data);
			
			
		}else{
			redirect(base_url().'app/ipd/admit/'.$this->input->post('patient_no'));
		}		
	}
	
	public function delete_diagnos(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Added!</div>");
		
		$this->db->query("update iop_diagnosis set InActive = 1 where iop_diag_id = ".$id);
		
		redirect(base_url().'app/ipd/diagnosis/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function view(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->load->view("app/ipd/view",$this->data);	
	}
	
	public function diagnosis(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['diagnosisList'] = $this->ipd_model->diagnosisList($iop_no);
		$this->data['patientDiagnosis'] = $this->ipd_model->patientDiagnosis($iop_no);
		
		
		$this->load->view("app/ipd/diagnosis",$this->data);	
	}
	
	
	
	
	
	
	
	public function ipd_reg($patient_no){
		$this->data['lastOPDNo'] = $this->general_model->lastOPDNo();
		$this->data['message'] = "";
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->load->view("app/opd/opdReg",$this->data);	
	}
	
	public function admit_patient2($offset = 0){
		// user restriction function
				$this->session->set_userdata('page_name','ipd_registration');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function			
				
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'ipd',
				 'submodule'	=>		'ipd_registration'));	
		
		$patient = $this->opd_model->getAll_search($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/opd/search_result/';
 		$config['total_rows'] = $this->opd_model->count_all_search();
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
		$this->table->set_heading('Patient No', 'Patient Name','Gender','Civil Status','Age','Date Entry','Action');
		$i = 0 + $offset;
		
		
		foreach ($patient as $patient)
		{	
				$this->table->add_row( 
									anchor('app/patient/view/'.$patient->patient_no,$patient->patient_no),
									$patient->name, 
									$patient->gender, 
									$patient->civil_status, 
									$patient->age,
									date('M d, Y H:i:s',strtotime($patient->date_entry)), 
									anchor('app/opd/opd_reg/'.$patient->patient_no,'OPD Visit')
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/opd/search_result',$this->data);	
	}

	
	
	public function admit_patient($offset = 0){
		// user restriction function
				$this->session->set_userdata('page_name','ipd_registration');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function		
				
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'ipd',
				 'submodule'	=>		'ipd_registration'));	
				 
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$patient = $this->opd_model->getAll_search($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/ipd/admit_patient/';
 		$config['total_rows'] = $this->opd_model->count_all_search();
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
		$this->table->set_heading('Patient No', 'Patient Name','Gender','Civil Status','Age','Date Entry','Admit');
		$i = 0 + $offset;
		
		
		foreach ($patient as $patient)
		{	
				$this->table->add_row( 
									anchor('app/patient/view/'.$patient->patient_no,$patient->patient_no),
									$patient->name, 
									$patient->gender, 
									$patient->civil_status, 
									$patient->age,
									date('M d, Y H:i:s',strtotime($patient->date_entry)), 
									anchor('app/ipd/admit/'.$patient->patient_no,'Admit')
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/ipd/search_result',$this->data);	
	}
	
	public function save_diagnosis(){
		$this->form_validation->set_rules("diagnosis","Diagnosis","trim|xss_clean|required|callback_validate_diagnosis");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		$opd_no = $this->input->post('opd_no');
		$patient_no = $this->input->post('patient_no');
		
		if($this->form_validation->run()){
			
			$this->opd_model->save_diagnosis();
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/ipd/diagnosis/'.$opd_no.'/'.$patient_no,$this->data);
			
			
		}else{
			redirect(base_url().'app/ipd/diagnosis/'.$opd_no.'/'.$patient_no,$this->data);
		}		
	}
	
	public function medication(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['medicineCategory'] = $this->opd_model->medicineCategory();
		
		
		$this->data['patientMedication'] = $this->opd_model->patientMedication($iop_no);
		
		
		$this->load->view("app/ipd/medication",$this->data);	
	}
	
	public function save_medication(){
		
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'medicine_id'	=>		$this->input->post('drug_name'),
			'instruction'	=>		$this->input->post('instruction'),
			'advice'		=>		$this->input->post('advice'),
			'days'			=>		$this->input->post('nDays'),
			'total_qty'		=>		$this->input->post('qty'),
			'cPreparedBy'	=>		$this->session->userdata('user_id'),
			'dDate'			=>		date("Y-m-d h:i:s A"),
			'InActive'		=>		0
		);
		$this->db->insert("iop_medication",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medication successfully Added!</div>");
		
		redirect(base_url().'app/ipd/medication/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
		
	}
	
	public function delete_medication(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_medication set InActive = 1 where iop_med_id = ".$id);
		
		redirect(base_url().'app/ipd/medication/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function complain(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['ComplainList'] = $this->opd_model->ComplainList();
		
		$this->data['patientComplain'] = $this->opd_model->patientComplain($iop_no);
		
		
		$this->load->view("app/ipd/complain",$this->data);	
	}
	
	public function save_complain(){
		$this->form_validation->set_rules("complain","Complain","trim|xss_clean|required");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		$opd_no = $this->input->post('opd_no');
		$patient_no = $this->input->post('patient_no');
		
		if($this->form_validation->run()){
			
			$this->opd_model->save_complain();
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Complain successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/ipd/complain/'.$opd_no.'/'.$patient_no,$this->data);
			
			
		}else{
			redirect(base_url().'app/ipd/complain/'.$opd_no.'/'.$patient_no,$this->data);
		}		
	}
	
	public function delete_complain(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_complaints set InActive = 1 where iop_comp_id = ".$id);
		
		redirect(base_url().'app/ipd/complain/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function vitalSign(){
		if(isset($_POST['btnSave'])){
			$this->data = array(
				'iop_id'		=>		$this->input->post('opd_no'),
				'dDate'			=>		$this->input->post('dDate'),
				'dDateTime'		=>		$this->input->post('dDate')." ".$this->input->post('cTime'),
				'pulse_rate'	=>		$this->input->post('pulse_rate'),
				'temperature'	=>		$this->input->post('temperature'),
				'height'		=>		$this->input->post('height'),
				'bp'			=>		$this->input->post('bp'),
				'respiration'	=>		$this->input->post('respiration'),
				'weight'		=>		$this->input->post('weight'),
				'cPreparedBy'	=>		$this->session->userdata('user_id'),
				'InActive'		=>		0
			);
			$this->db->insert('iop_vital_parameters',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vital Parameters successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/ipd/vitalSign/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
			
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
			$this->data['getVital'] = $this->opd_model->getVital($iop_no);
			$this->data['message'] = $this->session->flashdata('message');
		
			$this->load->view("app/ipd/vitalSign",$this->data);	
		}
	}
	
	public function delete_vital(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vital Parameters successfully Deleted!</div>");
		
		$this->db->query("update iop_vital_parameters set InActive = 1 where vital_id = ".$id);
		
		redirect(base_url().'app/ipd/vitalSign/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function save_vital(){
		$iop_no = $this->input->post('opd_no');
		$patient_no = $this->input->post('patient_no');
		
		$this->data = array(
			'pulse_rate'		=>	$this->input->post('pulse_rate'),
			'temperature'		=>	$this->input->post('temperature'),
			'height'			=>	$this->input->post('height'),
			'bp'				=>	$this->input->post('bp'),
			'respiration'		=>	$this->input->post('respiration'),
			'weight'			=>	$this->input->post('weight')
		);
		$this->db->where("IO_ID",$iop_no);
		$this->db->update("patient_details_iop",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vital Sign successfully Updated!</div>");
			
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
		//redirect
		redirect(base_url().'app/ipd/vitalSign/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function patientHistory(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view("app/ipd/patientHistory",$this->data);	
	}
	
	public function save_patientHistory(){
		$iop_no = $this->input->post('opd_no');
		$patient_no = $this->input->post('patient_no');
		
		$this->data = array(
			'allergies'				=>	$this->input->post('allergies'),
			'warnings'				=>	$this->input->post('warnings'),
			'social_history'		=>	$this->input->post('social_history'),
			'family_history'		=>	$this->input->post('family_history'),
			'personal_history'		=>	$this->input->post('personal_history'),
			'past_medical_history'	=>	$this->input->post('past_medical_history')
		);
		$this->db->where("IO_ID",$iop_no);
		$this->db->update("patient_details_iop",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient History successfully Updated!</div>");
			
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
		//redirect
		redirect(base_url().'app/ipd/patientHistory/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function discharge_summary(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['get_discharge_summary'] = $this->opd_model->get_discharge_summary($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['getConditionDis'] = $this->general_model->getConditionDis();
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view("app/ipd/discharge_summary",$this->data);	
	}
	
	public function save_discharge_summary(){
		$this->db->query("delete from iop_discharge_summary where iop_id = '".$this->input->post('opd_no')."'");
		
		$this->data = array(
			'iop_id'					=>		$this->input->post('opd_no'),
			'dDate'						=>		date("Y-m-d"),
			'dDateTime'					=>		date("Y-m-d h:i:s"),
			'reason_admission'			=>		$this->input->post('reason_admission'),
			'condition_upon_discharge'	=>		$this->input->post('condition'),
			'admitting_impression'		=>		$this->input->post('admitting_impression'),
			'final_diagnosis'			=>		$this->input->post('final_diagnosis'),
			'physical_exam_findings'	=>		$this->input->post('physical_exam_findings'),
			'course_ward'				=>		$this->input->post('course_ward'),
			'InActive'					=>		0
		);
		//$this->db->where("iop_id",$this->input->post('opd_no'));
		$this->db->insert("iop_discharge_summary",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Discharge summary successfully Added!</div>");
		
		redirect(base_url().'app/ipd/discharge_summary/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
	}
	
	public function progress_note(){
		if(isset($_POST['btnSave'])){
			$this->ipd_model->save_progress_note();
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Progress Notes successfully Added!</div>");
		
			redirect(base_url().'app/ipd/progress_note/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getProgressNote'] = $this->opd_model->getProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			$this->data['message'] = $this->session->flashdata('message');
		
			$this->load->view("app/ipd/progress_note",$this->data);	
		}
	}
	
	public function delete_progress(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_progress_note set InActive = 1 where progress_id = ".$id);
		
		redirect(base_url().'app/ipd/progress_note/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function intake_output(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['getIntake'] = $this->ipd_model->getIntake($iop_no);
		$this->data['getOutput'] = $this->ipd_model->getOutput($iop_no);
		
		$this->load->view("app/ipd/intake_output",$this->data);	
	}
	
	public function save_intake(){
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'particulars'	=>		$this->input->post('particular'),
			'IV_fluids'		=>		$this->input->post('fluids'),
			'oral'			=>		$this->input->post('oral'),
			'no_stool'		=>		$this->input->post('no_stool'),
			'no_urine'		=>		$this->input->post('no_urine'),
			'dDate'			=>		$this->input->post('dDate'),
			'dDateTime'		=>		$this->input->post('dDate')." ".$this->input->post('cTime'),
			'cPreparedBy'	=>		$this->session->userdata('user_id'),
			'InActive'		=>		0
		);	
		$this->db->insert("iop_intake_record",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Intake Record successfully Added!</div>");
		
		redirect(base_url().'app/ipd/intake_output/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
	}
	
	public function delete_intake(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_intake_record set InActive = 1 where intake_id = ".$id);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Intake Record successfully Deleted!</div>");
		
		redirect(base_url().'app/ipd/intake_output/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function save_output(){
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'urine'			=>		$this->input->post('urine'),
			'feaces'		=>		$this->input->post('feaces'),
			'respitation'	=>		$this->input->post('respitation'),
			'skin'			=>		$this->input->post('skin'),
			'dDate'			=>		$this->input->post('dDate2'),
			'dDateTime'		=>		$this->input->post('dDate2')." ".$this->input->post('cTime2'),
			'cPreparedBy'	=>		$this->session->userdata('user_id'),
			'InActive'		=>		0
		);	
		$this->db->insert("iop_output_record",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Output Record successfully Added!</div>");
		
		redirect(base_url().'app/ipd/intake_output/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
	}
	
	public function delete_output(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_output_record set InActive = 1 where output_id = ".$id);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Output Record successfully Deleted!</div>");
		
		redirect(base_url().'app/ipd/intake_output/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function nurse_progress_note(){
		if(isset($_POST['btnSave'])){
			$this->data = array(
				'iop_id'		=>		$this->input->post('opd_no'),
				'dDate'			=>		$this->input->post('dDate'),
				'dDateTime'		=>		$this->input->post('dDate')." ".$this->input->post('cTime'),
				'focus'			=>		$this->input->post('focus'),
				'notes'			=>		$this->input->post('notes'),
				'cPreparedBy'	=>		$this->session->userdata('user_id'),
				'InActive'		=>		0
			);
			$this->db->insert('iop_nurse_notes',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Notes successfully Added!</div>");
		
			redirect(base_url().'app/ipd/nurse_progress_note/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getNurseProgressNote'] = $this->opd_model->getNurseProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			$this->data['message'] = $this->session->flashdata('message');
		
			$this->load->view("app/ipd/nurse_progress_note",$this->data);	
		}
	}
	
	public function delete_nurse_progress(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_nurse_notes set InActive = 1 where nurse_notes_id = ".$id);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Notes successfully Deleted!</div>");
		
		redirect(base_url().'app/ipd/nurse_progress_note/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function operation_theater(){
		if(isset($_POST['btnSave'])){
			$this->db->query("delete from iop_operation_theater where iop_id = '".$this->input->post('opd_no')."'");
			
			$this->data = array(
				'iop_id'				=>		$this->input->post('opd_no'),
				'dDate_from'			=>		$this->input->post('dDate_from'),
				'dTime_from'			=>		$this->input->post('dTime_from'),
				'dDate_to'				=>		$this->input->post('dDate_to'),
				'dTime_to'				=>		$this->input->post('dTime_to'),
				'operation_name'		=>		$this->input->post('operation_name'),
				'diagnosis'				=>		$this->input->post('diagnosis'),
				'name_of_surgeon'		=>		$this->input->post('surgeon'),
				'name_of_anesthesia'	=>		$this->input->post('anesthesia'),
				'assistant_name1'		=>		$this->input->post('assistant1'),
				'assistant_name2'		=>		$this->input->post('assistant2'),
				'assistant_name3'		=>		$this->input->post('assistant3'),
				'assistant_name4'		=>		$this->input->post('assistant4'),
				'operation_procedure'	=>		$this->input->post('operation_procedure'),
				'notes'					=>		$this->input->post('notes'),
				'InActive'				=>		0
			);
			$this->db->insert('iop_operation_theater',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Operation Theater successfully Saved!</div>");
		
			redirect(base_url().'app/ipd/operation_theater/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			$this->data['surgery_list'] = $this->general_model->surgery_list();
			$this->load->view("app/ipd/operation_theater",$this->data);	
		}
	}
	
	public function room_transfer(){
		if(isset($_POST['btnSave'])){
			
			$this->data = array(
				'iop_id'				=>		$this->input->post('opd_no'),
				'dDate'					=>		$this->input->post('dDate'),
				'dDateTime'				=>		$this->input->post('dDate')." ".$this->input->post('dTime'),
				'room_category_id'		=>		$this->input->post('roomType'),
				'room_master_id'		=>		$this->input->post('room_name'),
				'bed_id'				=>		$this->input->post('bed_name'),
				'reason'				=>		$this->input->post('reason'),
				'cPreparedBy'			=>		$this->session->userdata('user_id'),
				'InActive'				=>		0
			);
			$this->db->insert('iop_room_transfer',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient successfully Transfered!</div>");
		
			redirect(base_url().'app/ipd/room_transfer/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
			
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['room_transfer'] = $this->ipd_model->room_transfer($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			$this->load->view("app/ipd/room_transfer",$this->data);	
		}
	}
	
	public function delete_room_transfer(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_room_transfer set InActive = 1 where transfer_id = ".$id);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Room successfully Deleted!</div>");
		
		redirect(base_url().'app/ipd/room_transfer/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function bed_side_procedure(){
		if(isset($_POST['btnSubmit'])){
			
			$this->data = array(
				'iop_id'				=>		$this->input->post('opd_no'),
				'dDate'					=>		date("Y-m-d"),
				'dDateTime'				=>		date("Y-m-d h:i:s A"),
				'cItem_id'				=>		$this->input->post('particular'),
				'qty'					=>		$this->input->post('qty'),
				'notes'					=>		$this->input->post('remarks'),
				'cPreparedBy'			=>		$this->session->userdata('user_id'),
				'InActive'				=>		0
			);
			$this->db->insert('iop_bed_side_procedure',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Bed Side Procedure successfully Saved!</div>");
		
			redirect(base_url().'app/ipd/bed_side_procedure/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
			
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['getServices'] = $this->opd_model->getServices($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			
			$this->load->view("app/ipd/bed_side_procedure",$this->data);			
		}
	}
	
	public function delete_bed_side(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_bed_side_procedure set InActive = 1 where bed_pro_id = ".$id);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Bed Side Procedure successfully Deleted!</div>");
		
		redirect(base_url().'app/ipd/bed_side_procedure/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function laboratory(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		//list of category
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		
		
		$this->data['patient_lab'] = $this->opd_model->patient_lab($iop_no);
		
		
		$this->load->view("app/ipd/laboratory",$this->data);	
	}
	
	public function save_laboratory(){
		$this->data = array(
				'iop_id'				=>		$this->input->post('opd_no'),
				'dDate'					=>		$this->input->post('dDate'),
				'dDateTime'				=>		$this->input->post('dDate')." ".$this->input->post('cTime'),
				'category_id'			=>		$this->input->post('category'),
				'laboratory_id'			=>		$this->input->post('particular'),
				'findings'				=>		$this->input->post('findings'),
				'result'				=>		$this->input->post('results'),
				'doctor'				=>		$this->input->post('doctor'),
				'InActive'				=>		0
			);
			$this->db->insert('iop_laboratory',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Laboratory successfully Saved!</div>");
		
			redirect(base_url().'app/ipd/laboratory/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
	}
	
	public function delete_lab(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Laboratory successfully Deleted!</div>");
		
		$this->db->query("update iop_laboratory set InActive = 1 where io_lab_id = ".$id);
		
		redirect(base_url().'app/ipd/laboratory/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	
	
	
	
	
	
	
	
}