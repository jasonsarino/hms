<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Ipd_print extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/ipd_model");
		$this->load->model("app/opd_model");
		$this->load->model("app/billing_model");
		$this->load->model("general_model");
		$this->load->model("app/patient_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function print_diagnosis(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientDiagnosis'] = $this->ipd_model->patientDiagnosis($iop_no);
		
		$this->data['reports_title'] = "Patient Diagnosis Reports";
		$this->load->view("app/ipd_reports/print_diagnosis",$this->data);	
	}
	
	public function pdf_diagnosis(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientDiagnosis'] = $this->ipd_model->patientDiagnosis($iop_no);
		
		$this->data['reports_title'] = "Patient Diagnosis Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_diagnosis', $this->data, true);
        pdf_create($html, 'diagnosis', TRUE);
	}
	
	public function print_medication(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientMedication'] = $this->opd_model->patientMedication($iop_no);
		
		$this->data['reports_title'] = "Patient Medication Reports";
		$this->load->view("app/ipd_reports/print_medication",$this->data);	
	}
	
	public function pdf_medication(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patientMedication'] = $this->opd_model->patientMedication($iop_no);
		
		$this->data['reports_title'] = "Patient Medication Reports";
		$this->load->view("app/ipd_reports/print_medication",$this->data);	
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_medication', $this->data, true);
        pdf_create($html, 'medication', TRUE);
		
	}
	
	public function print_complain(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['patientComplain'] = $this->opd_model->patientComplain($iop_no);
		
		$this->data['reports_title'] = "Patient Complaints Reports";
		$this->load->view("app/ipd_reports/print_complain",$this->data);	
	}
	
	public function pdf_complain(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		
		$this->data['patientComplain'] = $this->opd_model->patientComplain($iop_no);
		
		$this->data['reports_title'] = "Patient Complaints Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_complain', $this->data, true);
        pdf_create($html, 'complain', TRUE);
	}
	
	public function print_progress_note(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getProgressNote'] = $this->opd_model->getProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
			$this->data['reports_title'] = "Patient Progress Note Reports";
			$this->load->view("app/ipd_reports/print_progress_note",$this->data);	
	}
	
	public function pdf_progress_note(){
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getProgressNote'] = $this->opd_model->getProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
			$this->data['reports_title'] = "Patient Progress Note Reports";
			
			$this->load->helper('file');
        	$this->load->helper('dompdf');  
       
        	$html = $this->load->view('app/ipd_reports/print_progress_note', $this->data, true);
        	pdf_create($html, 'progress_note', TRUE);
	}
	
	public function print_intake(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
		$this->data['getIntake'] = $this->ipd_model->getIntake($iop_no);
		
		$this->data['reports_title'] = "Patient Intake Record Reports";
		$this->load->view("app/ipd_reports/print_intake",$this->data);	
	}
	
	public function pdf_intake(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
		$this->data['getIntake'] = $this->ipd_model->getIntake($iop_no);
		
		$this->data['reports_title'] = "Patient Intake Record Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_intake', $this->data, true);
        pdf_create($html, 'intake', TRUE);
	}
	
	
	public function print_output(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
		$this->data['getOutput'] = $this->ipd_model->getOutput($iop_no);
		
		$this->data['reports_title'] = "Patient Output Record Reports";
		$this->load->view("app/ipd_reports/print_output",$this->data);	
	}
	
	public function pdf_output(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
		
		$this->data['getOutput'] = $this->ipd_model->getOutput($iop_no);
		
		$this->data['reports_title'] = "Patient Output Record Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_output', $this->data, true);
        pdf_create($html, 'output', TRUE);
	}
	
	public function print_nurse_note(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getNurseProgressNote'] = $this->opd_model->getNurseProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
			$this->data['reports_title'] = "Patient Nurse Progress Note Reports";
			$this->load->view("app/ipd_reports/print_nurse_note",$this->data);	
	}
	
	public function pdf_nurse_note(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['getNurseProgressNote'] = $this->opd_model->getNurseProgressNote($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);	
			
			$this->data['reports_title'] = "Patient Nurse Progress Note Reports";
			
			$this->load->helper('file');
        	$this->load->helper('dompdf');  
       
        	$html = $this->load->view('app/ipd_reports/print_nurse_note', $this->data, true);
        	pdf_create($html, 'nurse_progress_note', TRUE);
	}
	
	public function print_vital(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
			$this->data['getVital'] = $this->opd_model->getVital($iop_no);
			$this->data['reports_title'] = "Patient Vital Sign Reports";
		
			$this->load->view("app/ipd_reports/print_vital",$this->data);	
	}
	
	public function pdf_vital(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
			$this->data['getVital'] = $this->opd_model->getVital($iop_no);
			$this->data['reports_title'] = "Patient Vital Sign Reports";
		
			
			$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_vital', $this->data, true);
        pdf_create($html, 'vital_sign', TRUE);
	}
	
	public function print_room_transfer(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['room_transfer'] = $this->ipd_model->room_transfer($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			$this->data['reports_title'] = "Patient IP Room Transfer Reports";
			$this->load->view("app/ipd_reports/print_room_transfer",$this->data);	
	}
	
	public function pdf_room_transfer(){
		$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['room_transfer'] = $this->ipd_model->room_transfer($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			$this->data['reports_title'] = "Patient IP Room Transfer Reports";
			
			
			$this->load->helper('file');
        	$this->load->helper('dompdf');  
       
       	 	$html = $this->load->view('app/ipd_reports/print_room_transfer', $this->data, true);
        	pdf_create($html, 'room_transfer', TRUE);
	}
	
	public function print_operation_theater(){
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			
			$this->data['reports_title'] = "Patient Operation Transfer Reports";
			$this->load->view("app/ipd_reports/print_operation_theater",$this->data);	
	}
	
	public function pdf_operation_theater(){
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->opd_model->getOPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			$this->data['medicine_cat'] = $this->billing_model->medicine_cat();
			
			$this->data['getOperationTheater'] = $this->opd_model->getOperationTheater($iop_no);
			$this->data['room_category'] = $this->general_model->room_category();
			
			
			$this->data['reports_title'] = "Patient Operation Transfer Reports";
			
			$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_operation_theater', $this->data, true);
        pdf_create($html, 'operation_theater', TRUE);	
	}
	
	public function print_patient_history(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['reports_title'] = "Patient History Reports";
		$this->load->view("app/ipd_reports/print_patient_history",$this->data);	
	}
	
	public function pdf_patient_history(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['reports_title'] = "Patient History Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_patient_history', $this->data, true);
        pdf_create($html, 'patient_history', TRUE);
	}
	
	public function print_discharge_summary(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['get_discharge_summary'] = $this->opd_model->get_discharge_summary($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['getConditionDis'] = $this->general_model->getConditionDis();
		
		$this->data['reports_title'] = "Patient Discharge Summary Reports";
		$this->load->view("app/ipd_reports/print_discharge_summary",$this->data);	
	}
	
	public function pdf_discharge_summary(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['get_discharge_summary'] = $this->opd_model->get_discharge_summary($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);		
		$this->data['getConditionDis'] = $this->general_model->getConditionDis();
		
		$this->data['reports_title'] = "Patient Discharge Summary Reports";
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_discharge_summary', $this->data, true);
        pdf_create($html, 'discharge_summary', TRUE);
	}
	
	public function print_services(){
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['getServices'] = $this->opd_model->getServices($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			
			$this->data['reports_title'] = "Patient Bed Side Procedure Reports";
			$this->load->view("app/ipd_reports/print_services",$this->data);		
	}
	
	public function pdf_services(){
			$iop_no = $this->uri->segment("4");
			$patient_no = $this->uri->segment("5");
		
			$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
			$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['getServices'] = $this->opd_model->getServices($iop_no);
			
			$this->data['particular_cat'] = $this->billing_model->particular_cat();
			
			$this->data['reports_title'] = "Patient Bed Side Procedure Reports";
			
			$this->load->helper('file');
        	$this->load->helper('dompdf');  
       
        	$html = $this->load->view('app/ipd_reports/print_services', $this->data, true);
        	pdf_create($html, 'services', TRUE);	
	}
	
	
	
	
	public function print_laboratory(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patient_lab'] = $this->opd_model->patient_lab($iop_no);
		
		$this->data['reports_title'] = "Patient Laboratory Reports";
		$this->load->view("app/ipd_reports/print_laboratory",$this->data);	
	}
	
	public function pdf_laboratory(){
		$iop_no = $this->uri->segment("4");
		$patient_no = $this->uri->segment("5");
		
		$this->data['getOPDPatient'] = $this->ipd_model->getIPDPatient($iop_no);
		$this->data['patientInfo'] = $this->patient_model->getPatientInfo($patient_no);
		$this->data['patient_lab'] = $this->opd_model->patient_lab($iop_no);
		
		$this->data['reports_title'] = "Patient Laboratory Reports";
		$this->load->view("app/ipd_reports/print_laboratory",$this->data);	
		
		$this->load->helper('file');
        $this->load->helper('dompdf');  
       
        $html = $this->load->view('app/ipd_reports/print_laboratory', $this->data, true);
        pdf_create($html, 'laboratory', TRUE);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}