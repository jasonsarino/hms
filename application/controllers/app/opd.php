<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Opd extends General{

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
	
	public function registration(){
		
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'opd',
				 'submodule'	=>		'opd_registration'));
				 
				 
		$this->load->view("app/opd/registration",$this->data);	
	}

	
	public function search_result($offset = 0){
		// user restriction function
				$this->session->set_userdata('page_name','opd_registration');
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
				 'subtab'		=>		'opd',
				 'submodule'	=>		'opd_registration'));
		
		
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
									anchor('app/opd/opd_reg/'.$patient->patient_no,'Check IN')
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/opd/search_result',$this->data);	
	}
	
	public function opd_reg($patient_no){
		$this->data['lastOPDNo'] = $this->general_model->lastOPDNo();
		$this->data['message'] = "";
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientHistory'] = $this->patient_model->getPatientHistory($patient_no);
		$this->load->view("app/opd/opdReg",$this->data);	
	}
	
	
	public function index($offset = 0){
				 
		// user restriction function
		$this->session->set_userdata('page_name','opd_enquiry');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function		
		 
		$this->session->set_userdata(array(
				 'tab'			=>		'patient',
				 'module'		=>		'',
				 'subtab'		=>		'opd',
				 'submodule'	=>		'opd_master'));	
		
		//set session in textfield to paginate the table		 
		$this->session->set_userdata(array(
			'search_opd_master'			=>		$this->input->post('search'),
			'search_opd_From'			=>		$this->input->post('cFrom'),
			'search_opd_cTo'			=>		$this->input->post('cTo'),
			'search_opd_department'		=>		$this->input->post('department'),
			'search_opd_doctor'			=>		$this->input->post('doctor')
		));


		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$patient = $this->opd_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/opd/index/';
 		$config['total_rows'] = $this->opd_model->count_all();
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
		$this->table->set_heading('OPD No','Patient No','Patient Name','Age','Visit Date Time','Department','Consultant Doctor','Status','');
		$i = 0 + $offset;
		
		
		foreach ($patient as $patient)
		{	
				if($patient->nStatus == "Pending"){ 
					$nStatus = "Checked In";
					$discharge = anchor('app/opd/discharge/'.$patient->IO_ID.'/'.$patient->patient_no,'Discharge',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to discharge patient?')"));
				}else{ 
					$nStatus = "Discharged";
					$discharge = "Discharged";
				}
				
				$this->table->add_row( 
									$patient->IO_ID,
									$patient->patient_no,
									$patient->name, 
									$patient->age, 
									date('M d, Y',strtotime($patient->date_visit))." ".date('H:i:s',strtotime($patient->time_visit)), 
									$patient->dept_name, 
									$patient->doctor,
									$nStatus,
									$discharge
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/opd/index',$this->data);	
	}
	
	public function validate_opd(){
		if($this->opd_model->validate_opd()){
			$this->form_validation->set_message("validate_opd","OPD Patient Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save_opd(){
		$this->form_validation->set_rules("patient_no","Patient No.","trim|xss_clean|required|callback_validate_opd");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
	
		if($this->form_validation->run()){
			
			$this->opd_model->save();
			
			$this->opd_model->save_vital();
			
			$this->db->where(array("cCode"=>"OUTPATIENTNO", 'InActive' => 0));
			$this->db->update('system_option',array('cValue'=>$this->input->post('userID2')));
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>OPD Patient successfully saved!</div>");
			
			//redirect
			redirect(base_url().'app/opd/index',$this->data);
			
			
		}else{
			$this->opd_reg($this->input->post('patient_no'));	
		}	
	}
	
	public function view(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		
		$this->load->view("app/opd/view",$this->data);	
	}
	
	public function diagnosis(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['diagnosisList'] = $this->opd_model->diagnosisList($iop_no);
		$this->data['patientDiagnosis'] = $this->opd_model->patientDiagnosis($iop_no);
		
		
		$this->load->view("app/opd/diagnosis",$this->data);	
	}
	
	public function validate_diagnosis(){
		if($this->opd_model->validate_diagnosis()){
			$this->form_validation->set_message("validate_diagnosis","Diagnosis Already Exists.");
			return false;
		}else{
			return true;
		}
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
			redirect(base_url().'app/opd/diagnosis/'.$opd_no.'/'.$patient_no,$this->data);
			
			
		}else{
			redirect(base_url().'app/opd/diagnosis/'.$opd_no.'/'.$patient_no,$this->data);
		}		
	}
	
	
	public function delete_complain(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->db->query("update iop_complaints set InActive = 1 where iop_comp_id = ".$id);
		
		redirect(base_url().'app/opd/complain/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function delete_medication(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medication successfully Added!</div>");
		
		$this->db->query("update iop_medication set InActive = 1 where iop_med_id = ".$id);
		
		redirect(base_url().'app/opd/medication/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function delete_diagnos(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis successfully Added!</div>");
		
		$this->db->query("update iop_diagnosis set InActive = 1 where iop_diag_id = ".$id);
		
		redirect(base_url().'app/opd/diagnosis/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	
	public function patientHistory(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view("app/opd/patientHistory",$this->data);	
	}
	
	public function delete_vital(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vital Parameters successfully Deleted!</div>");
		
		$this->db->query("update iop_vital_parameters set InActive = 1 where vital_id = ".$id);
		
		redirect(base_url().'app/opd/vitalSign/'.$iop_no.'/'.$patient_no,$this->data);
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
				'InActive'		=>		0
			);
			$this->db->insert('iop_vital_parameters',$this->data);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vital Parameters successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/opd/vitalSign/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
			
		}else{
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getVital'] = $this->opd_model->getVital($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
			$this->data['message'] = $this->session->flashdata('message');
		
			$this->load->view("app/opd/vitalSign",$this->data);	
		}
	}
	
	public function complain(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['ComplainList'] = $this->opd_model->ComplainList();
		
		$this->data['patientComplain'] = $this->opd_model->patientComplain($iop_no);
		
		
		$this->load->view("app/opd/complain",$this->data);	
	}
	
	public function medication(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['medicineCategory'] = $this->opd_model->medicineCategory();
		
		
		$this->data['patientMedication'] = $this->opd_model->patientMedication($iop_no);
		
		
		$this->load->view("app/opd/medication",$this->data);	
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
			redirect(base_url().'app/opd/complain/'.$opd_no.'/'.$patient_no,$this->data);
			
			
		}else{
			redirect(base_url().'app/opd/complain/'.$opd_no.'/'.$patient_no,$this->data);
		}		
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
			
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
		//redirect
		redirect(base_url().'app/opd/vitalSign/'.$iop_no.'/'.$patient_no,$this->data);
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
			
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
		//redirect
		redirect(base_url().'app/opd/patientHistory/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	public function getDrugName($id){
		
		$this->data['drug_name_lists'] = $this->opd_model->drug_name_lists($id);	
		
		$this->load->view("app/opd/drug_name_lists",$this->data);	
		
		
	}
	
	public function save_medication(){
		
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'medicine_id'	=>		$this->input->post('drug_name'),
			'instruction'	=>		$this->input->post('instruction'),
			'advice'		=>		$this->input->post('advice'),
			'days'			=>		$this->input->post('nDays'),
			'total_qty'		=>		$this->input->post('qty'),
			'InActive'		=>		0
		);
		$this->db->insert("iop_medication",$this->data);
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Medication successfully Added!</div>");
		
		redirect(base_url().'app/opd/medication/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
		
	}
	
	
	
	public function billing(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		
		if($this->billing_model->checkInvoice($iop_no)){
			redirect(base_url()."app/opd/billingView/".$iop_no."/".$patient_no,$this->data);		
		}else{
			$this->load->view("app/opd/billing",$this->data);	
		}
		
	}
	
	public function billingView(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		$this->data['headerInv'] = $this->billing_model->headerInv($iop_no);
		$this->data['detailsInv'] = $this->billing_model->detailsInv($iop_no);
		
		$this->load->view("app/opd/billingView",$this->data);	
		
	}
	
	public function printInv(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		$InvNo = $this->uri->segment("6");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		$this->data['headerInv'] = $this->billing_model->headerInv2($InvNo);
		$this->data['detailsInv'] = $this->billing_model->detailsInv2($InvNo);
		
		$this->load->view("app/opd/printInv",$this->data);	
		
	}
	
	public function printOR(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		$InvNo = $this->uri->segment("6");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		$this->data['headerInv'] = $this->billing_model->headerInv2($InvNo);
		$this->data['detailsInv'] = $this->billing_model->detailsInv2($InvNo);
		$this->data['getOR'] = $this->billing_model->OR_num($InvNo);
		
		
		$this->load->view("app/opd/printOR",$this->data);	
		
	}
	
	public function pdfOR(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		$InvNo = $this->uri->segment("6");
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		$this->data['headerInv'] = $this->billing_model->headerInv2($InvNo);
		$this->data['detailsInv'] = $this->billing_model->detailsInv2($InvNo);
		$this->data['getOR'] = $this->billing_model->OR_num($InvNo);
		$this->data['ORNUM'] = $this->billing_model->OR_num($InvNo);
		$ORNUM = $this->billing_model->OR_num($InvNo);
		
		$filename = $ORNUM->receipt_no."_".date("mdY");
		
		$html = $this->load->view("app/opd/printOR2",$this->data,true);		
        pdf_create($html, $filename, TRUE);
		
		
	}
	
	public function discharge(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>OPD Patient successfully discharged!</div>");
		
		$this->db->query("update patient_details_iop set nStatus = 'Discharged' where IO_ID = '".$iop_no."' and patient_no = '".$patient_no."'");
		
		
		redirect(base_url().'app/opd/index/'.$iop_no.'/'.$patient_no);
	}
	
	public function discharge_summary(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['get_discharge_summary'] = $this->opd_model->get_discharge_summary($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['getConditionDis'] = $this->general_model->getConditionDis();
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view("app/opd/discharge_summary",$this->data);	
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
		
		redirect(base_url().'app/opd/discharge_summary/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
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
		
		
		$this->load->view("app/opd/laboratory",$this->data);	
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
		
			redirect(base_url().'app/opd/laboratory/'.$this->input->post('opd_no').'/'.$this->input->post('patient_no'),$this->data);
	}
	
	public function delete_lab(){
		$id = $this->uri->segment("4");
		$iop_no = $this->uri->segment("5");
		$patient_no = $this->uri->segment("6");
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Laboratory successfully Deleted!</div>");
		
		$this->db->query("update iop_laboratory set InActive = 1 where io_lab_id = ".$id);
		
		redirect(base_url().'app/opd/laboratory/'.$iop_no.'/'.$patient_no,$this->data);
	}
	
	
	
	
	
}