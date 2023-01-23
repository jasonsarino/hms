<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Doctor_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		if($this->input->post('cFrom') == ""){
			$cFrom = date("Y-m-d");	
		}else{
			//$cFrom = "2014-01-01";	
			$cFrom = $this->input->post('cFrom');
		}
		
		if($this->input->post('cTo') == ""){
			$cTo = date("Y-m-d");	
		}else{
			//$cTo = "2014-01-01";	
			$cTo = $this->input->post('cTo');
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
				B.lastname like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or 
				B.patient_no like '%".$this->input->post('search')."%' or 
				A.IO_ID like '%".$this->input->post('search')."%'
				) 
				and E.user_id = '".$this->session->userdata('user_id')."' 
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
		if($this->input->post('cFrom') == ""){
			$cFrom = date("Y-m-d");	
		}else{
			$cFrom = $this->input->post('cFrom');	
		}
		
		if($this->input->post('cTo') == ""){
			$cTo = date("Y-m-d");	
		}else{
			$cTo = $this->input->post('cTo');	
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
				B.lastname like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or 
				B.patient_no like '%".$this->input->post('search')."%' or 
				A.IO_ID like '%".$this->input->post('search')."%'
				) 
				and A.department_id = '".$this->session->userdata('department')."' 
				and E.user_id = '".$this->session->userdata('user_id')."' 
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getAll2($limit = 10, $offset = 0){
		if($this->input->post('cFrom') == ""){
			$cFrom = date("Y-m-d");	
		}else{
			//$cFrom = "2014-01-01";	
			$cFrom = $this->input->post('cFrom');
		}
		
		if($this->input->post('cTo') == ""){
			$cTo = date("Y-m-d");	
		}else{
			//$cTo = "2014-01-01";	
			$cTo = $this->input->post('cTo');
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
			G.bed_name,
			H.room_name
			",false);
		$where = "(
				B.lastname like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or 
				B.patient_no like '%".$this->input->post('search')."%' or 
				A.IO_ID like '%".$this->input->post('search')."%'
				) 
				and E.user_id = '".$this->session->userdata('user_id')."' 
				and A.date_visit between '".$cFrom."' and '".$cTo."'  
				and A.patient_type = 'IPD' 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('B.patient_no','asc');
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$this->db->join("system_parameters C","C.param_id = B.title","left outer");
		$this->db->join("department D","D.department_id = A.department_id","left outer");
		$this->db->join("users E","E.user_id = A.doctor_id","left outer");
		$this->db->join("system_parameters F","F.param_id = E.title","left outer");
		$this->db->join("room_beds G","G.room_bed_id = room_id","left outer");
		$this->db->join("room_master H","H.room_master_id = G.room_master_id","left outer");
		$query = $this->db->get("patient_details_iop A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all2(){
		if($this->input->post('cFrom') == ""){
			$cFrom = date("Y-m-d");	
		}else{
			$cFrom = $this->input->post('cFrom');	
		}
		
		if($this->input->post('cTo') == ""){
			$cTo = date("Y-m-d");	
		}else{
			$cTo = $this->input->post('cTo');	
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
				B.lastname like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or 
				B.patient_no like '%".$this->input->post('search')."%' or 
				A.IO_ID like '%".$this->input->post('search')."%'
				) 
				and A.department_id = '".$this->session->userdata('department')."' 
				and E.user_id = '".$this->session->userdata('user_id')."' 
				and A.date_visit between '".$cFrom."' and '".$cTo."' 
				and A.patient_type = 'IPD' 
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
	
}