<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Billing extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/billing_model");
		$this->load->model("app/opd_model");
		$this->load->model("app/patient_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	
	public function pointOfSale(){
		
		$this->data['patientInfo'] = $this->billing_model->loadPatientInfo($this->input->post('patiIO_IDent'));
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		
		$this->load->view("app/billing/pos",$this->data);		
		
	}
	
	public function searchPatient(){
		// user restriction function
				$this->session->set_userdata('page_name','pos');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		$this->session->set_userdata(array(
				 'tab'			=>		'billing',
				 'module'		=>		'pos',
				 'subtab'		=>		'',
				 'submodule'	=>		''));	
		
		$this->data['patientLists'] = $this->billing_model->getOPDPatient();
		
		$this->load->view("app/billing/searchPatient",$this->data);		
	}
	
	public function getItem($id){
		$this->data['itemList'] = $this->billing_model->itemList($id);
		$this->data['particularName'] = $this->billing_model->particularName($id);
		$this->load->view("app/billing/itemList",$this->data);	
	}	
	
	
	
	public function getRate($id){
		$this->data['getRate'] = $this->billing_model->getRate($id);
		$this->load->view("app/billing/getRate",$this->data);	
	}	
	
	
	public function save_invoice(){
		
		//save header of invoice
		$this->billing_model->saveHeader();
		
		$num = $this->input->post('hdnrowcnt');
		for($i=1; $i<=$num; $i++){
			//save details of invoice
			$this->billing_model->saveDetails($i);
		}
		
		//update invoice series
		$this->billing_model->updateInvoiceNo();
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Transaction successfully Saved!</div>");
			
			
		redirect(base_url()."app/pos/saved/".$this->input->post('opd_no')."/".$this->input->post('patient_no')."/".$this->input->post('invoiceno'),$this->data);	
	}
	
	public function update_invoice(){
		
		
		//delete invoice
		$this->db->query("delete from iop_billing where invoice_no = '".$this->input->post('invoiceno')."'");
		$this->db->query("delete from iop_billing_t where invoice_no = '".$this->input->post('invoiceno')."'");
		
		//save header of invoice
		$this->billing_model->saveHeader();
		
		$num = $this->input->post('hdnrowcnt');
		for($i=1; $i<=$num; $i++){
			//save details of invoice
			$this->billing_model->saveDetails($i);
		}
		
		
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Invoice successfully Saved!</div>");
			
			
		redirect(base_url()."app/pos/saved/".$this->input->post('opd_no')."/".$this->input->post('patient_no')."/".$this->input->post('invoiceno'),$this->data);	
	}
	
	public function billingpdf(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		$InvNo = $this->uri->segment("6");
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$patientInfo = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['payment_type'] = $this->billing_model->payment_type();
		$this->data['insurance_company'] = $this->billing_model->insurance_company();
		$this->data['particular_cat'] = $this->billing_model->particular_cat();
		$this->data['invoice_no'] = $this->billing_model->invoice_no();
		
		$this->data['headerInv'] = $this->billing_model->headerInv2($InvNo);
		$this->data['detailsInv'] = $this->billing_model->detailsInv2($InvNo);
		
		$filename = $InvNo."_".date("mdY");
        
        $html = $this->load->view("app/opd/printInv2",$this->data,true);		
        pdf_create($html, $filename, TRUE);
		
		
	}
	
	public function drug_list($id){
		$this->data['drug_list'] = $this->billing_model->drug_list($id);
		$this->data['medicineName'] = $this->billing_model->medicineName($id);
		$this->load->view("app/billing/drug_list",$this->data);		
	}
	
	public function getDrugRate($id){
		$this->data['getDrugRate'] = $this->billing_model->getDrugRate($id);
		$this->load->view("app/billing/getDrugRate",$this->data);	
	}
	
	
	
	
	
	
}