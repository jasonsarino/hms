<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class General_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
		date_default_timezone_set("Asia/Manila");
	}
	
	public function companyInfo(){
		$query = $this->db->get("company_info");
		return $query->row();
	}
	
	public function getUserLoggedIn($username){
		$this->db->select("A.user_id, A.lastname, A.firstname, A.middlename, A.picture, B.designation,A.user_role,C.module,
				D.department_id");
		$this->db->where('A.username', $username);
		$this->db->join("designation B","B.designation_id = A.designation","left outer");
		$this->db->join("user_roles C","C.role_id = A.user_role","left outer");
		$this->db->join("department D","D.department_id = A.department","left outer");
		$query = $this->db->get("users A");
		return $query->row();
	}	

	public function insertNew($roomid, $bedNo)
	{
		$this->db->query("INSERT INTO room_beds(room_master_id,bed_name,nStatus,InActive) VALUES('".$roomid."','".$bedNo."','Vacant','0')");
	}
	
	public function UserTitles(){
		$this->db->select("param_id, cValue");	
		$this->db->where(array(
			'cCode'		=>	'title_name',
			'InActive'	=>	0	
		));
		$this->db->order_by('cValue','asc');
		$query = $this->db->get("system_parameters");
		return $query->result();
	}
	
	public function gender(){
		$this->db->select("param_id, cValue");	
		$this->db->where(array(
			'cCode'		=>	'gender',
			'InActive'	=>	0	
		));
		$this->db->order_by('cValue','asc');
		$query = $this->db->get("system_parameters");
		return $query->result();
	}
	
	public function civilStatus(){
		$this->db->select("param_id, cValue");	
		$this->db->where(array(
			'cCode'		=>	'civil_status',
			'InActive'	=>	0	
		));
		$this->db->order_by('cValue','asc');
		$query = $this->db->get("system_parameters");
		return $query->result();
	}
	
	public function departmentList(){
		$this->db->select("department_id, dept_name");	
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('dept_name','asc');
		$query = $this->db->get("department");
		return $query->result();
	}
	
	public function designationList(){
		$this->db->select("designation_id, designation");	
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('designation','asc');
		$query = $this->db->get("designation");
		return $query->result();
	}
	
	public function userRoleList(){
		$this->db->select("role_id, role_name");	
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('role_name','asc');
		$query = $this->db->get("user_roles");
		return $query->result();
	}
	
	public function floorList(){
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('floor_name','asc');
		$query = $this->db->get("floor");
		return $query->result();
	}
	
	public function roomTypeList(){
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('category_name','asc');
		$query = $this->db->get("room_category");
		return $query->result();
	}
	
	public function roomMasterList(){
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('room_name','asc');
		$query = $this->db->get("room_master");
		return $query->result();
	}
	
	public function bloodGroup(){
		$this->db->where(array(
			'cCode'		=>	'blood_type',
			'InActive'	=>	0	
		));
		$this->db->order_by('cValue','asc');
		$query = $this->db->get("system_parameters");
		return $query->result();
	}
	
	public function religionList(){
		$this->db->where(array(
			'cCode'		=>	'religion',
			'InActive'	=>	0	
		));
		$this->db->order_by('cValue','asc');
		$query = $this->db->get("system_parameters");
		return $query->result();
	}
	
	public function doctorList(){
		$this->db->select("A.user_id,
					concat(B.cValue,' ',A.firstname,' ',A.lastname) as 'name'",false);
		$this->db->where(array(
			'C.module'		=>	'doctor',
			'A.InActive'	=>	0	
		));
		$this->db->order_by('A.lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("user_roles C","C.role_id = A.user_role","left outer");
		$query = $this->db->get("users A");
		return $query->result();
	}
	
	public function insuranceCompList(){
		$this->db->where(array(
			'InActive'	=>	0	
		));
		$this->db->order_by('company_name','asc');
		$query = $this->db->get("insurance_comp ");
		return $query->result();
	}
	
	
	public function getPageID(){
		$this->db->select('page_id');
		$this->db->where("page_link", $this->session->userdata('page_name'));
		$query = $this->db->get('pages');
		return $query->row();		
	}
	
	public function lastOPDNo(){
		$this->db->select("(cValue + 1) as 'opdNo'");
		$this->db->where("cCode","OUTPATIENTNO");
		$query = $this->db->get("system_option");	
		return $query->row();
	}
	
	public function lastIPDNo(){
		$this->db->select("(cValue + 1) as 'ipdNo'");
		$this->db->where("cCode","INPATIENTNO");
		$query = $this->db->get("system_option");	
		return $query->row();
	}
	
	public function patientList(){
		$this->db->select("A.patient_no,
				concat(B.firstname,' ',B.lastname) as name
				",false);
		$this->db->where(array(
			'A.InActive'	=>		0,
			'A.nStatus'		=>		'Pending'
		));
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->result();	
	}
	
	public function room_category(){
		$query = $this->db->get_where("room_category",array('InActive' => 0));	
		return $query->result();
	}
	
	public function numberofOccuBeds($room_id){
		$this->db->select("count(bed_name) as numberofOccuBeds");
		$query = $this->db->get_where("room_beds", array(
			'InActive' 			=> 	'0',
			'nStatus'			=>	'Vacant',
			'room_master_id'	=>	$room_id
		));
		return $query->row();
	}
	
	public function numberofUnOccuBeds($room_id){
		$this->db->select("count(bed_name) as numberofOccuBeds");
		$query = $this->db->get_where("room_beds", array(
			'InActive' 			=> 	'0',
			'nStatus'			=>	'Occupied',
			'room_master_id'	=>	$room_id
		));
		return $query->row();
	}
	
	public function getBeds($room_id){
		$this->db->select("
			A.room_bed_id,
			A.bed_name,
			C.patient_no,
			B.IO_ID,
			concat(D.cValue,' ',C.firstname,' ',C.lastname) as patient,
			B.date_visit,
			B.time_visit,
			A.nStatus
		",false);
		$this->db->where(array(
			'A.room_master_id'		=>		$room_id,
			'A.InActive'			=>		'0'
		));
		$this->db->join("patient_details_iop B","B.IO_ID = A.patient_no","left outer");
		$this->db->join("patient_personal_info C","C.patient_no = B.patient_no","left outer");
		$this->db->join("system_parameters D","D.param_id = C.title","left outer");
		$this->db->order_by("A.bed_name","ASC");
		$query = $this->db->get("room_beds A");
		return $query->result();
	}
	
	public function getConditionDis(){
		$query = $this->db->get_where("system_parameters",array(
			'InActive'		=>		0,
			'cCode'			=>		'condition_upon_discharge'
		));	
		return $query->result();
	}
	
	public function getPreparedBy($user_id){
		$query = $this->db->query("SELECT concat(A.firstname,' ',A.middlename,' ',A.lastname) as cPreparedBy FROM `users` A WHERE `A`.`user_id` = '00007'");
		return $query->row();
	}
	
	public function opdLists($val,$cType){
		$this->db->select("
				patient_no,
				concat(firstname,' ',lastname) as patient
		",false);
		$where = "(
				patient_no like '%".$val."%' or 
				firstname like '%".$val."%' or 
				lastname like '%".$val."%'
			)
			";
		$this->db->where($where);
		$this->db->order_by("patient_no","ASC");
		$query = $this->db->get("patient_personal_info");
		return $query->result();
	}
	
	public function getDoctor($doctor_id){
		$this->db->select("concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as doctor",false);
		$this->db->join("system_parameters B","B.param_id = A.title","left outer join");
		$query = $this->db->get_where("users A",array('A.user_id' => $doctor_id));
		return $query->row();
	}
	
	public function getDeptName($department_id){
		$query = $this->db->get_where("department",array('department_id' => $department_id));
		return $query->row();
	}
	
	
	public function getroomName($room_master_id){
		$query = $this->db->get_where("room_master",array('room_master_id' => $room_master_id));
		return $query->row();
	}
	
	public function getRoomNameLists($category_id){
		$this->db->order_by("room_name","ASC");
		$query = $this->db->get_where("room_master",array('category_id'=>$category_id,'InActive'=>0));
		return $query->result();	
	}
	
	public function getBedList($category_id){
		$this->db->order_by("bed_name","ASC");
		$query = $this->db->get_where("room_beds",array('room_master_id'=>$category_id,'InActive'=>0,'nStatus'=>'Vacant'));
		return $query->result();	
	}
	
	public function getConditionUpon($id){
		$query = $this->db->get_where("system_parameters",array('param_id' => $id));
		return $query->row();
	}
	
	public function ipdLists($val){
		$this->db->select("
				B.patient_no,
				A.IO_ID,
				concat(B.firstname,' ',B.lastname) as patient
		",false);
		$where = "(
				B.patient_no like '%".$val."%' or 
				A.IO_ID like '%".$val."%' or 
				B.firstname like '%".$val."%' or 
				B.lastname like '%".$val."%'
			) and 
			A.patient_type = 'IPD' and A.nStatus = 'Pending'
			";
		$this->db->where($where);
		$this->db->order_by("A.IO_ID","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->result();
	}
	
	public function reason_dicount(){
		$query = $this->db->get_where("system_parameters",array('Inactive' => '0', 'cCode' => 'reason_for_discount'));
		return $query->result();	
	}
	
	public function surgery_list(){
		$query = $this->db->get_where("surgical_package",array('InActive' => 0));
		return $query->result();	
	}
	
	public function getSurgeryName(){
		$query = $this->db->get_where("surgical_package",array('InActive' => 0, 'surgery_id' => $this->input->post('surgery_name')));
		return $query->row();
	}	
	
	public function getSurgeryItems(){
		$this->db->select("B.particular_name,A.costs,A.cDesc");
		$this->db->join("bill_particular B","B.particular_id = A.surgery_item","left outer join");
		$this->db->order_by("B.particular_name","ASC");
		$query = $this->db->get_where("surgical_package_t A",array('A.InActive' => 0, 'surgery_id' => $this->input->post('surgery_name')));
		return $query->result();
	}
	
	public function getSurgeryItems2($iop_id){
		$this->db->select("C.particular_name,B.costs,B.cDesc");
		$this->db->join("surgical_package_t B","B.surgery_id = A.operation_name","left outer");
		$this->db->join("bill_particular C","C.particular_id = B.surgery_item","left outer");
		$query = $this->db->get_where("iop_operation_theater A",array(
			'A.InActive'	=>		0,
			'A.iop_id'		=>		$iop_id,
			'B.InActive'	=>		0
		));
		return $query->result();
	}


	public function getDoctorAvailability($status){
		$this->db->select("A.user_id,
					D.dept_name,
					concat(B.cValue,' ',A.firstname,' ',A.lastname) as 'name',
					A.doctorLastOut,
					A.doctorLastIn,
					A.doctorIsIn",false);
		$this->db->where(array(
			'C.module'		=>	'doctor',
			'A.doctorIsIn'	=>	$status,
			'A.InActive'	=>	0	
		));
		$this->db->order_by('A.lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("department D","D.department_id = A.department","left outer");
		$this->db->join("user_roles C","C.role_id = A.user_role","left outer");
		$query = $this->db->get("users A");
		return $query->result();
	}
	
	
	
	
	
	
	
	
	
	
}