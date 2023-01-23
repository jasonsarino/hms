<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller{

	function __construct(){
		parent::__construct();	
		date_default_timezone_set("Asia/Manila");
		$this->load->model('general_model');

		
		
	}
	
	public function variable(){
		$this->data['companyInfo'] = $this->general_model->companyInfo();
		$this->data['userInfo'] = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		$this->data['UserTitles'] = $this->general_model->UserTitles();
		$this->data['gender'] = $this->general_model->gender();
		$this->data['civilStatus'] = $this->general_model->civilStatus();
		$this->data['departmentList'] = $this->general_model->departmentList();
		$this->data['designationList'] = $this->general_model->designationList();
		$this->data['userRoleList'] = $this->general_model->userRoleList();
		$this->data['roomTypeList'] = $this->general_model->roomTypeList();
		$this->data['floorList'] = $this->general_model->floorList();
		$this->data['roomMasterList'] = $this->general_model->roomMasterList();
		$this->data['bloodGroup'] = $this->general_model->bloodGroup();
		$this->data['religionList'] = $this->general_model->religionList();
		$this->data['doctorList'] = $this->general_model->doctorList();
		$this->data['doctorList2'] = $this->general_model->doctorList();
		$this->data['insuranceCompList'] = $this->general_model->insuranceCompList();
		$this->data['patientListRows'] = $this->general_model->patientList();

		
		if( isset($_SESSION['username']) ) {
			// Sidebar menu restriction access
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));

		// Dashboard 
		$this->data['hasAccesstoDoctorAvail'] = ($this->has_rights_to_access("134",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Billing Module Validation
		$this->data['hasAccesstoBilling'] = ($this->has_rights_to_access("85",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoPOS'] = ($this->has_rights_to_access("84",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoSurgical'] = ($this->has_rights_to_access("116",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Patient Appointment
		$this->data['hasAccesstoAppointment'] = ($this->has_rights_to_access("121",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAddAppointment'] = ($this->has_rights_to_access("122",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Patient Management
		$this->data['hasAccesstoPatient'] = ($this->has_rights_to_access("49",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAddPatient'] = ($this->has_rights_to_access("48",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoPatient'] = ($this->has_rights_to_access("49",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoOPDRegistration'] = ($this->has_rights_to_access("91",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoOPDEnquiry'] = ($this->has_rights_to_access("92",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoIPDRegistration'] = ($this->has_rights_to_access("93",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoIPDEnquiry'] = ($this->has_rights_to_access("94",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Room Management
		$this->data['hasAccesstoRooms'] = ($this->has_rights_to_access("44",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoRoomsEnquiry'] = ($this->has_rights_to_access("99",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Nurse Module
		$this->data['hasAccesstoNurse'] = ($this->has_rights_to_access("128",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseBedSide'] = ($this->has_rights_to_access("107",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseInOutTake'] = ($this->has_rights_to_access("101",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseIPRoomTransfer'] = ($this->has_rights_to_access("104",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseDiagnosis'] = ($this->has_rights_to_access("120",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseProgressNote'] = ($this->has_rights_to_access("102",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseDischarge'] = ($this->has_rights_to_access("106",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNursePatientHistory'] = ($this->has_rights_to_access("105",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseMedication'] = ($this->has_rights_to_access("100",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoNurseVitalSign'] = ($this->has_rights_to_access("103",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Doctor Module
		$this->data['hasAccesstoDoctor'] = ($this->has_rights_to_access("129",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoDoctorIPD'] = ($this->has_rights_to_access("90",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoDoctorOPD'] = ($this->has_rights_to_access("89",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// EMR Module
		$this->data['hasAccesstoEMR'] = ($this->has_rights_to_access("130",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoEMRIPD'] = ($this->has_rights_to_access("96",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoEMROPD'] = ($this->has_rights_to_access("95",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Users Module
		$this->data['hasAccesstoUsers'] = ($this->has_rights_to_access("36",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAddUsers'] = ($this->has_rights_to_access("37",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Administration Module
		$this->data['hasAccesstoAdmin'] = ($this->has_rights_to_access("131",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminCompanyInfo'] = ($this->has_rights_to_access("111",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminDepartment'] = ($this->has_rights_to_access("28",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminDesignation'] = ($this->has_rights_to_access("40",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminBillGroupName'] = ($this->has_rights_to_access("56",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminParticularBill'] = ($this->has_rights_to_access("60",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminComplain'] = ($this->has_rights_to_access("72",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminDiagnosis'] = ($this->has_rights_to_access("64",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminSurgicalPack'] = ($this->has_rights_to_access("112",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminInsuranceCompany'] = ($this->has_rights_to_access("68",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminMedicineCategory'] = ($this->has_rights_to_access("76",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminDrugName'] = ($this->has_rights_to_access("80",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminAckReceipt'] = ($this->has_rights_to_access("117",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminParameters'] = ($this->has_rights_to_access("52",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminBackup'] = ($this->has_rights_to_access("127",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoAdminPages'] = ($this->has_rights_to_access("1",$userRole->user_role) == FALSE) ? FALSE : TRUE;

		// Reports Module
		$this->data['hasAccesstoReport'] = ($this->has_rights_to_access("132",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportPatient'] = ($this->has_rights_to_access("88",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportIndividualPatient'] = ($this->has_rights_to_access("98",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportOPD'] = ($this->has_rights_to_access("108",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportAdmitted'] = ($this->has_rights_to_access("109",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportDischarge'] = ($this->has_rights_to_access("110",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportDailySales'] = ($this->has_rights_to_access("87",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportDoctorsFee'] = ($this->has_rights_to_access("133",$userRole->user_role) == FALSE) ? FALSE : TRUE;
			$this->data['hasAccesstoReportAR'] = ($this->has_rights_to_access("119",$userRole->user_role) == FALSE) ? FALSE : TRUE;
		}


		


	}
	
	
	
	public function logfile($module,$event,$value){
		$this->data = array(
				'user_id'		=>		$this->session->userdata('user_id'),
				'module'		=>		$module,
				'event'			=>		$event,
				'value'			=>		$value,
				'ipaddress'		=>		$this->input->ip_address(),
				'date_time'		=>		date("Y-m-d h:i:s a")
		);
		$this->db->insert('logfile',$this->data);
	}
	
	//set if the user is currently logged in
    public function is_logged_in(){
        if($this->session->userdata('is_logged_in')){
            return true;    
        }else{
            return false;																
        }
    }
	
	public function has_rights_to_access($page_id,$role_id){
		$this->db->where(array(
			'role_id'	=>		$role_id,
			'page_id'	=>		$page_id
		));
		$query = $this->db->get("user_roles_pages");
		if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
	}
	
	public function getRoomName($category_id){
		$this->data['room'] = $this->general_model->getRoomNameLists($category_id);
		$this->load->view('app/general/roomList',$this->data);
	}
	
	public function getBedList($category_id){
		$this->data['bed'] = $this->general_model->getBedList($category_id);
		$this->load->view('app/general/bedList',$this->data);
	}
	
	public function ipdLists($val = NULL){
		$this->data['showPatients'] = $this->general_model->ipdLists($val);
		$this->load->view("app/general/showIPD",$this->data);	
	}
	
	public function surgical_costing(){
		$this->data['surgery_list'] = $this->general_model->surgery_list($val);
		$this->load->view("app/general/surgical_costing",$this->data);	
	}	

	public function getDoctorOUT(){
		$this->data['doctor'] = $this->general_model->getDoctorAvailability('OUT');
		$this->data['docStatus'] = "OUT";
		$this->load->view('app/general/doctorsAvailability.php',$this->data);
		// echo "<pre>".print_r($this->data['bed'],TRUE)."</pre>";
	}

	public function getDoctorIN(){
		$this->data['doctor'] = $this->general_model->getDoctorAvailability('IN');
		$this->data['docStatus'] = "IN";
		$this->load->view('app/general/doctorsAvailability.php',$this->data);
		// echo "<pre>".print_r($this->data['bed'],TRUE)."</pre>";
	}

	public function procDocAvail($id, $status)
	{

		if($status == "IN")
		{
			$this->data = array(
				'doctorLastIn'			=>		date("Y-m-d h:i:s A"),
				'doctorIsIn'			=>		$status
			);	
		}
		else
		{
			$this->data = array(
				'doctorLastOut'			=>		date("Y-m-d h:i:s A"),
				'doctorIsIn'			=>		$status
			);	
		}

		
		$this->db->where('user_id', $id);
		$this->db->update("users",$this->data);



	}

	
	
	
	
	
}