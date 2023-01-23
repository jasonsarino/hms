<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Dashboard_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function latest_patient(){
		$this->db->select("
			concat(B.cValue,' ',A.firstname,' ',A.lastname) as patient,
			DATE_FORMAT(A.date_entry, '%Y-%m-%d') as date_entry,
			A.age,
			C.cValue as gender,
			A.date_entry as date_entry2,
			A.patient_no
		",false);
		$where = "DATE_FORMAT(A.date_entry, '%Y-%m-%d') = '".date("Y-m-d")."' and A.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.date_entry","DESC");
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$query = $this->db->get('patient_personal_info A',3,0);
		return $query->result();
	}
	
	public function latest_visited_patient(){
		$this->db->select("
			concat(C.cValue,' ',B.firstname,' ',B.lastname) as patient,
			A.IO_ID,
			A.date_visit,
			A.time_visit,
			E.dept_name,
			A.patient_no
		",false);
		$where = "A.date_visit = '".date("Y-m-d")."' and A.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.date_visit","DESC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$this->db->join("system_parameters C","C.param_id = B.title","left outer");
		$this->db->join("system_parameters D","D.param_id = B.gender","left outer");
		$this->db->join("department E","E.department_id = A.department_id","left outer");
		$query = $this->db->get('patient_details_iop A',3,0);
		return $query->result();
	}

	public function getTodayAppointment(){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			C.appID,
			C.appointmentDate,
			C.appHour,
			C.appMinutes,
			C.appAMPM,
			C.dateVisit,
			C.appointmentStatus,
			C.appointmentReason,
			C.dateEntry,
			concat(E.cValue,' ',D.firstname,' ',D.middlename,' ',D.lastname) as 'consultantDoctor',
		",false);
		$where = "C.appointmentDate = '".date("Y-m-d")."' AND C.appointmentStatus = 'A'";
		$this->db->where($where);
		$this->db->order_by('A.lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("patient_appointment C","C.patient_no = A.patient_no","join");
		$this->db->join("users D","D.user_id = C.consultantDoctor","left outer");
		$this->db->join("system_parameters E","E.param_id = D.title","left outer");
		$query = $this->db->get("patient_personal_info A", 10, 0);
		return $query->result();
	}
	
}