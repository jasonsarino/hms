<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Billing_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getOPDPatient(){
		$this->db->select("
			A.IO_ID,
			concat(B.firstname,' ',B.lastname) as patient
		",false);
		$this->db->order_by("B.lastname","ASC");
		$this->db->where(array(
			'A.nStatus'		=>		'Pending',
			'A.InActive'	=>		0
		));
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->result();	
	}
	
	
	public function loadPatientInfo($IO_ID){
		$this->db->select("
				A.IO_ID,
				A.patient_no,
				A.patient_type,
				B.picture,
				A.date_visit,
				A.time_visit,
				B.age,
				concat(B.firstname,' ',B.lastname) as patient
		",false);
		$this->db->where("A.IO_ID", $IO_ID);
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->row();
	}
	
	
	public function particular_cat(){
		$this->db->order_by("group_name","ASC");
		$this->db->where("InActive","0");	
		$query = $this->db->get("bill_group_name");
		return $query->result();
	}
	
	public function itemList($id){
		$this->db->order_by("particular_name","ASC");
		$this->db->where(array(
			'InActive'		=>		0,
			'group_id'		=>		$id
		));	
		$query = $this->db->get("bill_particular");
		return $query->result();
	}
	
	public function particularName($id){
		$this->db->select("group_name");
		$this->db->where('group_id',$id);	
		$query = $this->db->get("bill_group_name");
		return $query->row();
	}
	
	public function getRate($id){
		$this->db->select("charge_amount,particular_name");
		$query = $this->db->get_where("bill_particular",array('particular_id' => $id));	
		return $query->row();
	}
	
	public function insurance_company(){
		$this->db->order_by("company_name","ASC");	
		$query = $this->db->get_where("insurance_comp", array('InActive' => '0'));
		return $query->result();
	}
	
	public function payment_type(){
		$this->db->order_by("cValue","ASC");	
		$query = $this->db->get_where("system_parameters", array('cCode' => 'payment_type', 'InActive' => '0'));
		return $query->result();
	}
	
	public function invoice_no(){
		$this->db->select("(cValue + 1) as invoice_no");
		$this->db->where("cCode","invoice_no");
		$query = $this->db->get("system_option");	
		return $query->row();	
	}
	
	public function receipt_no(){
		$this->db->select("(cValue + 1) as receipt_no");
		$this->db->where("cCode","receipt_no");
		$query = $this->db->get("system_option");	
		return $query->row();	
	}
	
	public function saveHeader(){
		$this->data = array(
			'iop_id'				=>		$this->input->post('opd_no'),
			'patient_no'			=>		$this->input->post('patient_no'),
			'payment_type'			=>		$this->input->post('paymentType'),
			'invoice_no'			=>		$this->input->post('invoiceno'),
			'dDate'					=>		date("Y-m-d h:i:s a"),
			'discount'				=>		$this->input->post('discount'),
			'reason_discount'		=>		$this->input->post('reason_dicount'),
			'sub_total'				=>		$this->input->post('nGross'),
			'total_amount'			=>		$this->input->post('total_amount'),
			'total_purchased'		=>		$this->input->post('hdnrowcnt'),
			'creditCardNo'			=>		$this->input->post('creditCardNo'),
			'creditCardHolder'		=>		'',
			'insurance_company'		=>		$this->input->post('insurance_company'),
			'remarks'				=>		$this->input->post('remarks'),
			'InActive'				=>		0
		);	
		$this->db->insert('iop_billing',$this->data);
	}
	
	public function saveDetails($i){
		$this->data = array(
			'invoice_no'	=>		$this->input->post('invoiceno'),
			'iop_id'		=>		$this->input->post('opd_no'),
			'bill_name'		=>		$this->input->post('bill_name'.$i),
			'qty'			=>		$this->input->post('qty'.$i),
			'rate'			=>		$this->input->post('rate'.$i),
			'amount'		=>		$this->input->post('amount'.$i),
			'note'			=>		$this->input->post('note'.$i),
			'isPackage'		=>		$this->input->post('isPackage'.$i),
			'InActive'		=>		0
		);	
		
		$this->db->insert('iop_billing_t',$this->data);
	}
	
	public function updateInvoiceNo(){
		$this->db->query("update system_option set cValue = '".$this->input->post('invoiceno2')."' where cCode = 'invoice_no'");	
	}
	
	public function checkInvoice($iop_no){
		$this->db->where(array(
			'iop_id'		=>		$iop_no,
			'InActive'		=>		0
		));
		$query = $this->db->get("iop_billing");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function headerInv($iop_no,$invoiceno){
		$this->db->where(array(
			'iop_id'		=>		$iop_no,
			'invoice_no'	=>		$invoiceno
		));
		$query = $this->db->get('iop_billing');
		return $query->row();
	}
	
	public function detailsInv($iop_no,$invoiceno){
		$this->db->where(array(
			'iop_id'	=>		$iop_no,
			'invoice_no'	=>		$invoiceno
		));
		$this->db->order_by("id","ASC");
		$query = $this->db->get('iop_billing_t');
		return $query->result();
	}
	
	public function headerInv2($InvNo){
		$this->db->where(array(
			'invoice_no'	=>		$InvNo
		));
		$query = $this->db->get('iop_billing');
		return $query->row();
	}
	
	public function detailsInv2($InvNo){
		$this->db->where(array(
			'invoice_no'	=>		$InvNo
		));
		$this->db->order_by("id","ASC");
		$query = $this->db->get('iop_billing_t');
		return $query->result();
	}
	
	public function showPatients($val){
		$this->db->select("
				A.IO_ID,
				A.patient_no,
				A.patient_type,
				B.picture,
				A.date_visit,
				A.time_visit,
				B.age,
				concat(B.firstname,' ',B.lastname) as patient
		",false);
		$where = "A.nStatus = 'Pending' and 
			(
				A.IO_ID like '%".$val."%' or 
				A.patient_no like '%".$val."%' or 
				A.patient_type like '%".$val."%' or 
				B.firstname like '%".$val."%' or 
				B.lastname like '%".$val."%'
			)
			";
		$this->db->where($where);
		$this->db->order_by("A.IO_ID","ASC");
		$this->db->join("patient_personal_info B","B.patient_no = A.patient_no","left outer");
		$query = $this->db->get("patient_details_iop A");
		return $query->result();
	}
	
	public function getOR($invoiceno){
		$query = $this->db->get_where('iop_receipt',array('invoice_no' => $invoiceno));
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function OR_num($invoiceno){
		$query = $this->db->get_where('iop_receipt', array('invoice_no' => $invoiceno));	
		return $query->row();
	}
	
	public function medicine_cat(){
		$query = $this->db->get_where("medicine_category", array('InActive' => 0));	
		return $query->result();
	}
	
	public function drug_list($id){
		$query = $this->db->get_where("medicine_drug_name", array(
			'InActive' 		=> 	0,
			'med_cat_id'	=>	$id));	
		return $query->result();
	}
	
	public function medicineName($id){
		$query = $this->db->get_where("medicine_category", array('cat_id' => $id));	
		return $query->row();
	}
	
	public function getDrugRate($id){
		$this->db->select("nPrice,drug_name");
		$query = $this->db->get_where("medicine_drug_name",array('drug_id' => $id));	
		return $query->row();
	}
	
	
	public function patientMedication($patientNo,$iopNo){
		//table medication
		$this->db->select("A.medicine_id,B.drug_name,B.nPrice,A.total_qty,'0' as isPackage",false);
		$this->db->where(array(
			'A.iop_id'		=>		$iopNo,
			'A.InActive'	=>		0
		));
		$this->db->join("medicine_drug_name B","B.drug_id = A.medicine_id","left outer");
		$this->db->get("iop_medication A");
		$query1 = $this->db->last_query();
		
		//table room transfer
		$this->db->select("A.room_master_id,concat('Rm. ',B.room_name), B.room_rates,'1' as total_qty,'0' as isPackage",false);
		$this->db->where(array(
			'A.iop_id'		=>		$iopNo,
			'A.InActive'	=>		0
		));
		$this->db->join("room_master B","B.room_master_id = A.room_master_id","left outer");
		$this->db->get("iop_room_transfer A");
		$query2 = $this->db->last_query();
		
		//table bed side procedures
		$this->db->select("B.particular_id,B.particular_name, B.charge_amount,A.qty,'0' as isPackage",false);
		$this->db->where(array(
			'A.iop_id'		=>		$iopNo,
			'A.InActive'	=>		0
		));
		$this->db->join("bill_particular B","B.particular_id = A.cItem_id","left outer");
		$this->db->get("iop_bed_side_procedure A");
		$query3 = $this->db->last_query();
		
		//table operation theater
		$this->db->select("B.surgery_id,B.surgery_name, B.total_costs,'1' as qty,'1' as isPackage",false);
		$this->db->where(array(
			'A.iop_id'		=>		$iopNo,
			'A.InActive'	=>		0
		));
		$this->db->join("surgical_package B","B.surgery_id = A.operation_name","left outer");
		$this->db->get("iop_operation_theater A");
		$query4 = $this->db->last_query();
		
		//union all table
		$query = $this->db->query($query1." UNION ALL ".$query2." UNION ALL ".$query3." UNION ALL ".$query4);
		return $query->result();
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
	
	
	
	
	
	
	
	
	
	
	
}