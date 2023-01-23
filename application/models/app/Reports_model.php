<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Reports_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function daily_sales(){
		$this->db->select("
			A.receipt_no,
			A.invoice_no,
			A.dDate,
			A.discount,
			A.subtotal,
			B.patient_no,
			concat(B.firstname,' ',B.lastname) as patient,
			A.total_amount
		",false);
		$where = "DATE_FORMAT(A.dDate,  '%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.dDate","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("iop_receipt A");
		return $query->result();
	}
	
	public function total_sales(){
		$this->db->select("sum(A.total_amount) as total_amount,sum(A.discount) as discount,sum(A.subtotal) as subtotal");
		$where = "DATE_FORMAT(A.dDate,'%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("iop_receipt A");
		return $query->row();
	}
	
	public function patient_list(){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as name,
			concat(A.street,' ',A.subd_brgy,' ',A.province) as address,
			A.mobile_no,
			A.birthday,
			A.age,
			A.date_entry,
			C.cValue as gender,
			D.cValue as civil_status,
			E.cValue as blood_group,
			F.company_name
		",false);
		$this->db->order_by("A.patient_no","ASC");
		
		$where = "A.InActive = 0 and DATE_FORMAT( date_entry,  '%Y-%m-%d' ) between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."'";
		if($this->input->post('gender') != ''){ 			$where .= " and C.param_id = '".$this->input->post('gender')."'";}
		if($this->input->post('civil_status') != ''){ 		$where .= " and D.param_id = '".$this->input->post('civil_status')."'";}
		if($this->input->post('bloodGroup') != ''){ 		$where .= " and E.param_id = '".$this->input->post('bloodGroup')."'";}
		if($this->input->post('insurance_comp') != ''){ 	$where .= " and F.in_com_id = '".$this->input->post('insurance_comp')."'";}
		$this->db->where($where);
		
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$this->db->join("system_parameters E","E.param_id = A.blood_group","left outer");
		$this->db->join("insurance_comp F","F.in_com_id  = A.Insurance_comp","left outer");
		$query = $this->db->get("patient_personal_info A");
		return $query->result();
	}


	public function doctor_fee_report(){
		$this->db->select("
			concat(B.firstname,' ',B.middlename,' ',B.lastname) as name,
			A.date,A.feeType,A.value,A.totalFee,A.notes
		",false);
		$this->db->order_by("A.date","DESC");
		
		$where = "DATE_FORMAT( A.date,  '%Y-%m-%d' ) between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' 
				AND A.user_id LIKE '%".$this->input->post('doctor')."%' AND C.receipt_no != ''";
		$this->db->where($where);
		
		$this->db->join("users B","B.user_id = A.user_id","left outer");
		$this->db->join("iop_billing C","C.invoice_no = A.invoice_no","left outer");
		$query = $this->db->get("doctors_fee A");
		return $query->result();
	}



	
	public function opd_diagnosis_reports($iop_no){
		$this->db->select("
			A.iop_id,
			A.dDate,
			C.diagnosis_name,
			A.remarks
		",false);
		$this->db->where(array(
			'A.iop_id'		=>		$iop_no,
			'A.InActive'	=>		0
		));
		$this->db->order_by("A.iop_diag_id","DESC");
		$this->db->join("patient_details_iop B","B.IO_ID = A.iop_id","left outer join");
		$this->db->join("diagnosis C","C.diagnosis_id = A.diagnosis_id","left outer join");
		$query = $this->db->get("iop_diagnosis A");
		return $query->result();	
	}
	
	public function OPD_DISTINCT(){
		$this->db->select("distinct IO_ID",false);
		$query = $this->db->get_where("patient_details_iop",array('patient_no' => $this->input->post('patient_no')));	
		return $query->result();
	}
	
	public function patientInfo(){
		$this->db->select("
			A.patient_no,	
			concat(A.firstname,' ',A.middlename,' ',A.lastname) as patient,
			B.cValue as gender,
			C.cValue as civil_status,
			concat(A.street,' ',A.subd_brgy,' ',A.province) as address,
			A.age,
			A.phone_no,
			A.birthday
		",false);
		$this->db->join("system_parameters B","B.param_id = A.gender","left outer join");
		$this->db->join("system_parameters C","C.param_id = A.civil_status","left outer join");
		$query = $this->db->get_where("patient_personal_info A",array('A.patient_no' => $this->input->post('patient_no')));
		return $query->row();
	}
	
	public function patientvisited(){
		$this->db->order_by("A.IO_ID","DESC");
		$query = $this->db->get_where("patient_details_iop A",array(
			'A.patient_no' 	=> 	$this->input->post('patient_no'),
			'A.InActive'	=>	0
		));
		return $query->result();
	}
	
	public function outpatient(){
		$this->db->select("
			A.date_visit,
			A.time_visit,
			A.IO_ID,
			A.patient_no,
			concat(C.cValue,' ',B.firstname,' ',B.middlename,' ',B.lastname) as name,
			concat(E.cValue,' ',D.firstname,' ',D.middlename,' ',D.lastname) as consultant,
			concat(G.cValue,' ',F.firstname,' ',F.middlename,' ',F.lastname) as refferal,
			H.dept_name,
			A.nStatus
		",false);
		
		$where = "A.InActive = 0 
				and A.date_visit between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' 
				and A.patient_type = 'OPD' and A.nStatus = 'Pending'";
		if($this->input->post('department') != ''){ $where .= " and H.department_id = '".$this->input->post('department')."'"; }
		$this->db->where($where);
		
		$this->db->order_by("A.date_visit","DESC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");	
		$this->db->join("system_parameters C","C.param_id = B.title","left outer");	
		$this->db->join("users D","D.user_id = A.doctor_id","left outer");	
		$this->db->join("system_parameters E","E.param_id = D.title","left outer");	
		$this->db->join("users F","F.user_id = A.refferal_doctor","left outer");	
		$this->db->join("system_parameters G","G.param_id = F.title","left outer");	
		$this->db->join("department H","H.department_id = A.department_id","");	
		$query = $this->db->get("patient_details_iop A");
		return $query->result();
	}
	
	public function inpatient(){
		$cFrom = $this->input->post('cFrom');
		$cTo = $this->input->post('cTo');
		
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
		$where = "A.department_id like '%".$this->input->post('department')."%' 
				and A.date_visit between '".$cFrom."' and '".$cTo."'  
				and A.patient_type = 'IPD' and A.nStatus = 'Pending'
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
		$query = $this->db->get("patient_details_iop A");
		return $query->result();
	}
	
	public function discharged_patient(){
		$cFrom = $this->input->post('cFrom');
		$cTo = $this->input->post('cTo');
		
		$this->db->select("
			A.IO_ID,
			A.patient_type,
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
		$where = "A.department_id like '%".$this->input->post('department')."%' 
				and A.date_visit between '".$cFrom."' and '".$cTo."'  
				and A.patient_type = 'IPD' and A.nStatus != 'Pending'
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
		$query = $this->db->get("patient_details_iop A");
		return $query->result();
	}
	
	
	public function getORList($limit = 10, $offset = 0){
		$this->db->select("
			A.id,
			A.receipt_no,
			A.invoice_no,
			A.discount,
			A.subtotal,
			A.dDate,
			concat(B.firstname,' ',B.lastname) as patient,
			B.patient_no,
			A.total_amount
		",false);
		$where = "DATE_FORMAT(A.dDate,  '%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.receipt_no","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("declaredor A",$limit,$offset);
		return $query->result();
	}
	
	public function count_all_OR(){
		$this->db->select("
			A.receipt_no,
			A.invoice_no,
			A.dDate,
			concat(B.firstname,' ',B.lastname) as patient,
			A.total_amount
		",false);
		$where = "DATE_FORMAT(A.dDate,  '%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.dDate","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("declaredor A");
		return $query->num_rows();
	}
	
	
	public function ORList(){
		$this->db->select("
			A.receipt_no,
			A.invoice_no,
			A.dDate,
			concat(B.firstname,' ',B.lastname) as patient,
			B.patient_no,
			A.total_amount
		",false);
		$where = "DATE_FORMAT(A.dDate,  '%Y-%m-%d') between '".$this->input->post('cFrom2')."' and '".$this->input->post('cTo2')."' 
				and A.receipt_no not in(select old_receipt_no from declaredOR where InActive = 0)
				and A.InActive = 0 
				and B.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.dDate","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("iop_receipt A");
		return $query->result();
	}
	
	public function getReceiptDetails($receipt_no){
		$this->db->select("
			A.receipt_no,
			A.invoice_no,
			A.iop_id,
			A.dDate,
			A.payment_type,
			A.discount,
			A.subtotal,
			A.amountPaid,
			A.change,
			A.total_purchased,
			concat(B.firstname,' ',B.lastname) as patient,
			B.patient_no,
			A.total_amount,
			C.patient_type",false);
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer join");
		$this->db->join("patient_details_iop C","C.IO_ID = A.iop_id","left outer join");
		$query = $this->db->get_where("iop_receipt A",array(
			'A.receipt_no'	=>	$receipt_no
		));	
		return $query->row();
	}
	
	public function validate_receipt(){
		$this->db->where(array(
			'receipt_no'	=>		$this->input->post('receipt_no'),
			'InActive'		=>		0
		));
		$query = $this->db->get("declaredor");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function daily_sales2(){
		$this->db->select("
			A.receipt_no,
			A.invoice_no,
			A.dDate,
			B.patient_no,
			concat(B.firstname,' ',B.lastname) as patient,
			A.discount,
			A.subtotal,
			A.total_amount
		",false);
		$where = "DATE_FORMAT(A.dDate,  '%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->order_by("A.dDate","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("declaredor A");
		return $query->result();
	}
	
	public function total_sales2(){
		$this->db->select("sum(A.total_amount) as total_amount,sum(A.discount) as discount,sum(A.subtotal) as subtotal");
		$where = "DATE_FORMAT(A.dDate,'%Y-%m-%d') between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' and A.InActive = 0 and B.InActive = 0";
		$this->db->where($where);	
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("declaredor A");
		return $query->row();
	}
	
	public function OR_details($or_no){
		$this->db->select("A.*,B.*",false);	
		$this->db->where("A.receipt_no",$or_no);
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("declaredor A");
		return $query->row();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}