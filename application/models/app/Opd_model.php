<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Opd_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		if($this->input->post("cFrom") == ""){
			$cFrom = date("Y-m-d");	
		}else{
			$cFrom = $this->input->post("cFrom");
		}
		
		if($this->input->post("cTo") == ""){
			$cTo = date("Y-m-d");	
		}else{
			$cTo = $this->input->post("cTo");
		}
		
		$this->db->select("
			A.IO_ID,
			B.patient_no,
			concat(C.cValue,' ',B.firstname,' ',B.middlename,' ',B.lastname) as 'name',
			B.age,
			A.date_visit,
			A.time_visit,
			D.dept_name,
			D.dept_name,
			concat(F.cValue,' ',E.firstname,' ',E.middlename,' ',E.lastname) as 'doctor',
			A.nStatus,
			",false);
		$where = "(
				B.lastname like '%".$this->input->post("search")."%' or 
				B.firstname like '%".$this->input->post("search")."%' or 
				B.patient_no like '%".$this->input->post("search")."%' or 
				A.IO_ID like '%".$this->input->post("search")."%'
				) 
				and A.department_id like '%".$this->input->post("department")."%' 
				and E.user_id like '%".$this->input->post("doctor")."%' 
				and A.date_visit between '".$cFrom."' and '".$cTo."'  
				and A.patient_type = 'OPD' 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('B.patient_no','asc');
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$this->db->join("system_parameters C","C.param_id = B.title","left outer");
		$this->db->join("department D","D.department_id = A.department_id","left outer");
		$this->db->join("users E","E.user_id = A.doctor_id","left outer");
		$this->db->join("system_parameters F","F.param_id = E.title","left outer");
		$query = $this->db->get("patient_details_iop A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		if($this->input->post("cFrom") == ""){
			$cFrom = date("Y-m-d");	
		}else{
			$cFrom = $this->input->post("cFrom");
		}
		
		if($this->input->post("cTo") == ""){
			$cTo = date("Y-m-d");	
		}else{
			$cTo = $this->input->post("cTo");
		}
		
		$this->db->select("
			A.IO_ID,
			B.patient_no,
			concat(C.cValue,' ',B.firstname,' ',B.middlename,' ',B.lastname) as 'name',
			B.age,
			A.date_visit,
			A.time_visit,
			D.dept_name,
			D.dept_name,
			concat(F.cValue,' ',E.firstname,' ',E.middlename,' ',E.lastname) as 'doctor',
			",false);
		$where = "(
				B.lastname like '%".$this->input->post("search")."%' or 
				B.firstname like '%".$this->input->post("search")."%' or 
				B.patient_no like '%".$this->input->post("search")."%' or 
				A.IO_ID like '%".$this->input->post("search")."%'
				) 
				and A.department_id like '%".$this->input->post("department")."%' 
				and E.user_id like '%".$this->input->post("doctor")."%' 
				and A.date_visit between '".$cFrom."' and '".$cTo."'  
				and A.patient_type = 'OPD' 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('B.lastname','asc');
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$this->db->join("system_parameters C","C.param_id = B.title","left outer");
		$this->db->join("department D","D.department_id = A.department_id","left outer");
		$this->db->join("users E","E.user_id = A.doctor_id","left outer");
		$this->db->join("system_parameters F","F.param_id = E.title","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->num_rows();
	}
	
	
	
	
	
	public function getAll_search($limit = 10, $offset = 0){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			C.cValue as 'gender',
			D.cValue as 'civil_status',
			A.age,
			A.date_entry
		",false);
		$where = "(
				A.lastname like '%".$this->input->post('search')."%' or 
				A.firstname like '%".$this->input->post('search')."%' or 
				A.patient_no like '%".$this->input->post('search')."%'
				) 
				and A.patient_no not in(select patient_no from patient_details_iop where nStatus = 'Pending' and InActive = 0)
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$query = $this->db->get("patient_personal_info A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all_search(){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			C.cValue,
			D.cValue,
			A.age,
			A.date_entry
		",false);
		$where = "(
				A.lastname like '%".$this->input->post('search')."%' or 
				A.firstname like '%".$this->input->post('search')."%' or 
				A.patient_no like '%".$this->input->post('search')."%'
				)           
				and A.patient_no not in(select patient_no from patient_details_iop where nStatus = 'Pending' and InActive = 0) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$query = $this->db->get("patient_personal_info A");
		return $query->num_rows();
	}
	
	public function validate_opd(){
		$this->db->where(array(
			'patient_no'		=>		$this->input->post('patient_no'),
			'nStatus'			=>		'Pending',
			'patient_type'		=>		'OPD',
			'InActive'			=>		0
		));
		$query = $this->db->get("patient_details_iop");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'IO_ID'						=>		$this->input->post('opdNo'),
			'patient_no'				=>		$this->input->post('patient_no'),
			'patient_type'				=>		'OPD',
			'date_visit'				=>		date('Y-m-d'),
			'time_visit'				=>		date('h:i:s'),
			'doctor_id'					=>		$this->input->post('doctor'),
			'refferal_doctor'			=>		$this->input->post('refdoctor'),
			'room_id'					=>		0,
			'department_id'				=>		$this->input->post('department'),
			'provisional_diagnosis'		=>		$this->input->post('diagnosis'),
			'complaints'				=>		$this->input->post('complaints'),
			'allergies'					=>		$this->input->post('allergies'),
			'warnings'					=>		$this->input->post('warnings'),
			'social_history'			=>		$this->input->post('social_history'),
			'family_history'			=>		$this->input->post('family_history'),
			'personal_history'			=>		$this->input->post('personal_history'),
			'past_medical_history'		=>		$this->input->post('past_medical_history'),
			'pulse_rate'				=>		$this->input->post('pulse_rate'),
			'temperature'				=>		$this->input->post('temperature'),
			'height'					=>		$this->input->post('height'),
			'bp'						=>		$this->input->post('bp'),
			'respiration'				=>		$this->input->post('respiration'),
			'weight'					=>		$this->input->post('weight'),
			'nStatus'					=>		'Pending',
			'InActive'					=>		0
		);	
		
		$this->db->insert("patient_details_iop",$this->data);
	}
	
	public function save_vital(){
		$this->data = array(
			'iop_id'					=>		$this->input->post('opdNo'),
			'dDate'						=>		date("Y-m-d"),
			'dDateTime'					=>		date("Y-m-d h:i:s"),
			'pulse_rate'				=>		$this->input->post('pulse_rate'),
			'temperature'				=>		$this->input->post('temperature'),
			'height'					=>		$this->input->post('height'),
			'bp'						=>		$this->input->post('bp'),
			'respiration'				=>		$this->input->post('respiration'),
			'weight'					=>		$this->input->post('weight'),
			'InActive'					=>		0
		);	
		
		$this->db->insert("iop_vital_parameters",$this->data);
	}
	
	public function diagnosisList(){
		$this->db->order_by("diagnosis_name","ASC");
		$query = $this->db->get_where("diagnosis", array("InActive"=>'0'));	
		return $query->result();
	}
	
	public function ComplainList(){
		$this->db->order_by("complain_name","ASC");
		$query = $this->db->get_where("complain", array("InActive"=>'0'));	
		return $query->result();
	}
	
	public function getOPDPatient($iop_no){
		$this->db->select("
				A.IO_ID,
				A.patient_no,
				A.date_visit,
				A.time_visit,
				concat(D.cValue,' ',B.firstname,' ',B.lastname) as ref_doctor,
				concat(E.cValue,' ',C.firstname,' ',C.lastname) as con_doctor,
				F.dept_name,
				A.pulse_rate,
				A.temperature,
				A.height,
				A.bp,
				A.respiration,
				A.weight,
				A.allergies,
				A.warnings,
				A.social_history,
				A.family_history,
				A.personal_history,
				A.past_medical_history,
				A.nStatus
		",false);
		$this->db->where("A.IO_ID",$iop_no);
		$this->db->join("users B","B.user_id = A.refferal_doctor","left outer");
		$this->db->join("users C","C.user_id = A.doctor_id","left outer");
		$this->db->join("system_parameters D","D.param_id = B.title","left outer");
		$this->db->join("system_parameters E","E.param_id = C.title","left outer");
		$this->db->join("department F","F.department_id = A.department_id","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->row();
	}
	
	public function validate_diagnosis(){
		$this->db->where(array(
			'iop_id'				=>		$this->input->post('opd_no'),
			'diagnosis_id'			=>		$this->input->post('diagnosis'),
			'InActive'				=>		0
		));
		$query = $this->db->get("iop_diagnosis");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save_complain(){
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'complain_id'	=>		$this->input->post('complain'),
			'remarks'		=>		$this->input->post('remarks'),
			'dDate'			=>		date("Y-m-d h:i:s a"),
			'InActive'		=>		0
		);
		$this->db->insert("iop_complaints",$this->data);	
	}
	
	public function save_diagnosis(){
		$this->data = array(
			'iop_id'		=>		$this->input->post('opd_no'),
			'diagnosis_id'	=>		$this->input->post('diagnosis'),
			'remarks'		=>		$this->input->post('remarks'),
			'dDate'			=>		date("Y-m-d h:i:s a"),
			'InActive'		=>		0
		);
		$this->db->insert("iop_diagnosis",$this->data);	
	}
	
	
	public function patientDiagnosis($iop_no){
		$this->db->select("A.iop_diag_id,B.diagnosis_name, A.remarks");
		$this->db->order_by("A.iop_diag_id","DESC");
		$this->db->where(array(
			'A.iop_id'		=>		$iop_no,
			'A.InActive'	=>		0
		));
		$this->db->join("diagnosis B","B.diagnosis_id = A.diagnosis_id","left outer");
		$query = $this->db->get("iop_diagnosis A");	
		return $query->result();	
	}
	
	public function patientComplain($iop_no){
		$this->db->select("A.iop_comp_id,B.complain_name, A.remarks, A.dDate");
		$this->db->order_by("A.iop_comp_id","DESC");
		$this->db->where(array(
			'A.iop_id'		=>		$iop_no,
			'A.InActive'	=>		0
		));
		$this->db->join("complain B","B.complain_id = A.complain_id","left outer");
		$query = $this->db->get("iop_complaints A");	
		return $query->result();	
	}
	
	public function medicineCategory(){
		$this->db->order_by("med_category_name","ASC");
		$this->db->where("InActive","0");	
		$query = $this->db->get("medicine_category");
		return $query->result();
	}
	
	public function drug_name_lists($id){
		$this->db->order_by("drug_name","ASC");	
		$this->db->where(array(
			'med_cat_id'	=>		$id,
			'InActive'		=>		0
		));
		$query = $this->db->get("medicine_drug_name");
		return $query->result();
	}	
	
	public function patientMedication($iop_no){
		$this->db->select("
					A.dDate,
						A.iop_med_id,
						B.drug_name,
						A.instruction,
						A.advice,
						A.days,
						A.total_qty,
						concat(D.cValue,' ',C.firstname,' ',C.middlename,' ',C.lastname) as name
						",false);
		$this->db->order_by("A.iop_med_id","asc");
		$this->db->where(array(
			'A.iop_id'		=>	$iop_no,
			'A.InActive'	=>	0
		));
		$this->db->join("medicine_drug_name B","B.drug_id = A.medicine_id","left outer");
		$this->db->join("users C","C.user_id = A.cPreparedBy","left outer");
		$this->db->join("system_parameters D","D.param_id = C.title","left outer");
		$query = $this->db->get("iop_medication A");	
		return $query->result();
	}
	
	public function get_discharge_summary($iop_no){
		$query = $this->db->get_where("iop_discharge_summary",array(
			'iop_id'	=>		$iop_no,
			'InActive'	=>		0
		));	
		return $query->row();
	}
	
	public function getProgressNote($iop_no){
		$this->db->order_by("dDateTime","DESC");
		$query = $this->db->get_where("iop_progress_note",array(
			'iop_id'	=>		$iop_no,
			'InActive'	=>		0
		));	
		
		return $query->result();
	}
	
	public function getVital($iop_no){
		$this->db->order_by("dDateTime","DESC");
		$query = $this->db->get_where("iop_vital_parameters",array(
			'iop_id'	=>		$iop_no,
			'InActive'	=>		0
		));	
		
		return $query->result();
	}
	
	public function getNurseProgressNote($iop_no){
		$this->db->order_by("dDateTime","DESC");
		$query = $this->db->get_where("iop_nurse_notes",array(
			'iop_id'	=>		$iop_no,
			'InActive'	=>		0
		));	
		
		return $query->result();
	}
	
	public function getOperationTheater($iop_no){
		$this->db->select("A.*,B.surgery_name");
		$this->db->join("surgical_package B","B.surgery_id = A.operation_name","left outer");
		$query = $this->db->get_where("iop_operation_theater A",array('A.iop_id' => $iop_no));
		return $query->row();
	}
	
	public function getServices($iop_no){
		$this->db->select("
				A.dDateTime,
				A.bed_pro_id,
				B.particular_name,
				A.qty,
				A.notes,
				concat(D.cValue,' ',C.firstname,' ',C.middlename,C.lastname) as name
				",false);
		$this->db->order_by("A.dDateTime","DESC");
		$this->db->join("bill_particular B","B.particular_id = A.cItem_id","left outer");
		$this->db->join("users C","C.user_id = A.cPreparedBy","left outer");
		$this->db->join("system_parameters D","D.param_id = C.title","left outer");
		$query = $this->db->get_where("iop_bed_side_procedure A",array('A.iop_id' => $iop_no, 'A.InActive' => '0'));
		return $query->result();
	}
	
	public function patient_lab($iop_no){
		$this->db->select("
						A.io_lab_id,
						A.dDateTime,
						C.particular_name,
						B.group_name,
						C.particular_name,
						A.findings,
						A.result,
						concat(E.cValue,' ',D.firstname,' ',D.middlename,' ',D.lastname) as doctor
						",false);
		$this->db->order_by("A.io_lab_id","asc");
		$this->db->where(array(
			'A.iop_id'		=>	$iop_no,
			'A.InActive'	=>	0
		));
		$this->db->join("bill_group_name B","B.group_id = A.category_id","left outer");
		$this->db->join("bill_particular C","C.particular_id = A.laboratory_id","left outer");
		$this->db->join("users D","D.user_id = A.doctor","left outer");
		$this->db->join("system_parameters E","E.param_id = D.title","left outer");
		$query = $this->db->get("iop_laboratory A");	
		return $query->result();
	}
	
	
	
	
}