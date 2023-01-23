<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Bill_history_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->select("
					A.invoice_no,
					A.receipt_no,
					A.iop_id,
					A.patient_no,
					A.dDate,
					A.total_amount,
					A.total_purchased,
					concat(B.firstname,' ',B.lastname) as patient
					",false);
		$where = "(
				A.invoice_no like '%".$this->input->post('search')."%' or 
				A.iop_id like '%".$this->input->post('search')."%' or 
				A.patient_no like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or
				B.lastname like '%".$this->input->post('search')."%'
				) and 
				A.dDate between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."' 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('A.invoice_no','asc');
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("iop_billing A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("
					A.invoice_no,
					A.iop_id,
					A.patient_no,
					A.dDate,
					A.total_amount,
					A.total_purchased,
					concat(B.firstname,' ',B.lastname) as patient
					",false);
		$where = "(
				A.invoice_no like '%".$this->input->post('search')."%' or 
				A.iop_id like '%".$this->input->post('search')."%' or 
				A.patient_no like '%".$this->input->post('search')."%' or 
				B.firstname like '%".$this->input->post('search')."%' or
				B.lastname like '%".$this->input->post('search')."%'
				) and 
				A.dDate between '".$this->input->post('cFrom')."' and '".$this->input->post('cTo')."'  
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('A.invoice_no','asc');
		$this->db->join("patient_personal_info B","A.patient_no = B.patient_no","left outer");
		$this->db->join("patient_details_iop C","C.patient_no = B.patient_no","left outer");
		$query = $this->db->get("iop_billing A");
		return $query->num_rows();
	}
	
	
	public function getHeader($invoiceno){
		$this->db->where("invoice_no",$invoiceno);
		$query = $this->db->get("iop_billing");
		return $query->row();
	}
	
	public function details($invoiceno){
		$this->db->where(array(
			'invoice_no'	=>		$invoiceno,
			'InActive'		=>		0
		));
		$query = $this->db->get("iop_billing_t");
		return $query->result();
	}
	
	public function patientInfo($invoiceno){
		$this->db->select("
				concat(B.firstname,' ',B.lastname) as patient,
				C.IO_ID,
				C.patient_no,
				C.patient_type,
				C.date_visit,
				C.time_visit
		",false);
		$this->db->where("A.invoice_no",$invoiceno);
		$this->db->join("patient_personal_info B","A.patient_no = B.patient_no","left outer");
		$this->db->join("patient_details_iop C","A.iop_id = C.IO_ID","left outer");
		$query = $this->db->get("iop_billing A");
		return $query->row();
	}
	
	
	
	
	
	
	
}