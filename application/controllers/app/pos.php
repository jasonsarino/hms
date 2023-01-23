<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Pos extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/general_model");
		$this->load->model("app/billing_model");
		$this->load->model("app/opd_model");
		$this->load->model("app/patient_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
		// user restriction function
				$this->session->set_userdata('page_name','pos');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function		 
				
		$this->posPage();
	}
	
	function posPage(){
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		
		$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
		
		
		$this->data['reason_dicount'] = $this->general_model->reason_dicount();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		$this->data['receipt_no2'] = $this->billing_model->receipt_no();
		
		$this->load->view("app/pos/index",$this->data);
	}

	function pos_patient($patient_no){
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
		$this->data['reason_dicount'] = $this->general_model->reason_dicount();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		$this->data['receipt_no2'] = $this->billing_model->receipt_no();
		
		$this->data['direct'] = TRUE;
		$this->data['patient_rows'] = $this->patient_model->getPatientInfo($patient_no);
		$this->load->view("app/pos/index",$this->data);
	}
	
	function test(){
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		//$this->data['itemList'] = $this->billing_model->itemList();
		
		$this->load->view("app/pos/test",$this->data);
	}
	
	public function showPatients($val = NULL){
		//$cFrom = $this->uri->segment("4");
		//$cTo = $this->uri->segment("5");
		
		$this->data['showPatients'] = $this->billing_model->showPatients($val);
		$this->load->view("app/pos/showPatients",$this->data);
		
	}
	
	public function patientDetials($id){
		
		$this->data['patientDetials'] = $this->billing_model->loadPatientInfo($id);
		$this->load->view("app/pos/patientDetials",$this->data);
		
	}

	public function getDoctorFee($invoiceno)
	{

		$result = $this->db->query("select * from doctors_fee where invoice_no = '".$invoiceno."'");
		$aso_arr = $result->row_array(); // assoc. array w/o numeric indexes
		$user_id = $aso_arr[ 'user_id' ];
		$feeType = $aso_arr[ 'feeType' ];
		$value = $aso_arr[ 'value' ];
		$totalFee = $aso_arr[ 'totalFee' ];
		$notes = $aso_arr[ 'notes' ];
		echo json_encode($aso_arr);

	}

	public function saveDoctorFee($invoiceno)
	{

		$isExist = $this->db->query("select * from doctors_fee where user_id = '".$this->input->post('doctor')."' and invoice_no = '".$invoiceno."'");

		if($isExist->num_rows == 0)
		{
			$this->data = array(
				'user_id'			=>	$this->input->post('doctor'),
				'date'				=>	date("Y-m-d"),
				'invoice_no'		=>	$invoiceno,
				'completeDate'		=>	date("Y-m-d h:i:s a"),
				'feeType'			=>	$this->input->post('cType'),
				'value'				=>	$this->input->post('valueFee'),
				'totalFee'			=>	$this->input->post('totalFee'),
				'notes'				=>	$this->input->post('notes')
			);
			$this->db->insert('doctors_fee',$this->data);
		}
		else
		{
			$this->db->query("UPDATE doctors_fee SET 
							`date` = '".date("Y-m-d")."',
							`completeDate` = '".date("Y-m-d h:i:s a")."',
							`feeType` = '".$this->input->post('cType')."',
							`value` = '".$this->input->post('valueFee')."',
							`totalFee` = '".$this->input->post('totalFee')."',
							`notes` = '".$this->input->post('notes')."' 
							WHERE user_id = '".$this->input->post('doctor')."' 
							and invoice_no = '".$invoiceno."'");
		}

		// echo $isExist->num_rows;

		

	}
	
	public function saved(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		$invoiceno = $this->uri->segment("6");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientDetials'] = $this->billing_model->loadPatientInfo($iop_no);
		
		$this->data['headerInv'] = $this->billing_model->headerInv($iop_no,$invoiceno);
		$this->data['detailsInv'] = $this->billing_model->detailsInv($iop_no,$invoiceno);
		
		$this->data['receipt_no2'] = $this->billing_model->receipt_no();
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
		
		$this->data['reason_dicount'] = $this->general_model->reason_dicount();
		
		if($this->billing_model->getOR($invoiceno)){
			$this->data['hasOR'] = "1";
			$OR_num = $this->billing_model->OR_num($invoiceno);
			$this->data['OR_number'] = $OR_num->receipt_no;
		}else{
			$this->data['hasOR'] = "0";
			$this->data['OR_number'] = "-";
		}
		
		
		$this->load->view("app/pos/saved",$this->data);	
		
	}
	
	public function save_payment(){
		$iop_no = $this->input->post("opd_no");
		$patient_no = $this->input->post("patient_no");
		$invoiceno = $this->input->post("invoiceno");
		
		$this->data = array(
			'receipt_no'		=>	$this->input->post('receiptno'),
			'invoice_no'		=>	$this->input->post('invoiceno'),
			'dDate'				=>	date("Y-m-d h:i:s a"),
			'iop_id'			=>	$this->input->post('opd_no'),
			'patient_no'		=>	$this->input->post('patient_no'),
			'payment_type'		=>	$this->input->post('paymentType'),
			'total_amount'		=>	$this->input->post('totalAmount'),
			'change'			=>	$this->input->post('change'),
			'amountPaid'		=>	$this->input->post('amountPaid'),
			'total_purchased'	=>	$this->input->post('totalItem'),
			'discount'			=>	$this->input->post('discount'),
			'subtotal'			=>	$this->input->post('nGross'),
			'creditCardNo'		=>	'',
			'creditCardHolder'	=>	'',
			'insurance_company'	=>	'',
			'remarks'			=>	'',
			'InActive'			=>	0
		);
		$this->db->insert('iop_receipt',$this->data);
		
		$this->db->query("update iop_billing set receipt_no = '".$this->input->post('receiptno')."' where invoice_no = '".$this->input->post('invoiceno')."'");
		$this->db->query("update system_option set cValue = '".$this->input->post('receipt_no2')."' where cCode = 'receipt_no'");
		
		redirect(base_url().'app/pos/saved/'.$iop_no.'/'.$patient_no.'/'.$invoiceno,$this->data);
	}
	
	public function getPatientMedication($patientNo,$iopNo){
		$this->data['patientMedication']  = $this->billing_model->patientMedication($patientNo,$iopNo);
		$this->load->view("app/pos/getpatientMedication",$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}