<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Reports extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/reports_model");
		$this->load->model("app/general_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function daily_sales(){
		
		if(isset($_POST['btnView'])){
			
			$this->data['daily_sales'] = $this->reports_model->daily_sales();
			$this->data['total_sales'] = $this->reports_model->total_sales();
			
			$this->data['reports_title'] = "Daily Sales Reports";
			
			
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/daily_sales',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result/daily_sales', $this->data, true);
        		pdf_create($html, 'daily_sales', TRUE);
			}
			
		}else{
		
			// user restriction function
			$this->session->set_userdata('page_name','daily_reports');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			$this->session->set_userdata(array(
				 'tab'			=>		'reports',
				 'module'		=>		'daily_reports',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
	
			
			$this->load->view('app/reports/daily_sales',$this->data);	
		
		}
	}
	
	public function patient_list(){
		if(isset($_POST['btnView'])){
			$this->data['patient_list'] = $this->reports_model->patient_list();
			$this->data['reports_title'] = "Patient Masterlist Reports";
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/patient_list',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result_pdf/patient_list', $this->data, true);
        		pdf_create($html, 'patient_list', TRUE);
			}
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','patient_list_report');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			$this->session->set_userdata(array(
				 'tab'			=>		'reports',
				 'module'		=>		'patient_list_report',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
				 
			$this->data['patient_list'] = $this->reports_model->patient_list();
			$this->load->view('app/reports/patient_list',$this->data);	
		}
	}
	
	public function opdLists($id = NULL,$cType = ''){
		
		$this->data['showPatients'] = $this->general_model->opdLists($id,$cType);
		$this->load->view("app/reports/showOPD",$this->data);
		
	}
	
	public function patient_visited(){
		if(isset($_POST['btnView'])){
			$this->data['reports_title'] = "OPD Patient Diagnosis Reports";
			$this->data['patientInfo'] = $this->reports_model->patientInfo();
			$this->data['patientvisited'] = $this->reports_model->patientvisited();	
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports/patient_visited_result',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result_pdf/patient_visited_result', $this->data, true);
        		pdf_create($html, 'patient_visited', TRUE);
			}
			
			
		}else{
		// user restriction function
		$this->session->set_userdata('page_name','patient_visited_report');
		$page_id = $this->general_model->getPageID();
		$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
		if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
			redirect(base_url().'access_denied');
		}
		// end of user restriction function
				 
		$this->session->set_userdata(array(
				 'tab'			=>		'reports',
				 'module'		=>		'patient_visited_report',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
				 
		$this->data['patient_list'] = $this->reports_model->patient_list();
		
		$this->load->view('app/reports/patient_visited',$this->data);	
		}
	}
	
	
	public function outpatient(){
		if(isset($_POST['btnView'])){
			
			$this->data['reports_title'] = "Out Patient Reports";
			$this->data['outpatient'] = $this->reports_model->outpatient();
			
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/outpatient',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result/outpatient', $this->data, true);
        		pdf_create($html, 'outpatient', TRUE);
			}
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','outpatient_report');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
				 
			$this->session->set_userdata(array(
				 'tab'			=>		'reports',
				 'module'		=>		'outpatient_report',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
				 
			$this->data['patient_list'] = $this->reports_model->patient_list();
		
			$this->load->view('app/reports/outpatient',$this->data);	
		}
	}
	
    
    public function inpatient(){
        if(isset($_POST['btnView'])){
            
			$this->data['reports_title'] = "Admitted Patient Reports";
			$this->data['inpatient'] = $this->reports_model->inpatient();
				
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/inpatient',$this->data);
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result/inpatient', $this->data, true);
        		pdf_create($html, 'inpatient', TRUE);
			}
			
        }else{
            // user restriction function
            $this->session->set_userdata('page_name','inpatient_report');
            $page_id = $this->general_model->getPageID();
            $userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
            if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
                redirect(base_url().'access_denied');
            }
            // end of user restriction function
                 
            $this->session->set_userdata(array(
                 'tab'            =>        'reports',
                 'module'        =>        'inpatient_report',
                 'subtab'        =>        '',
                 'submodule'    =>        ''));
                 
            $this->data['patient_list'] = $this->reports_model->patient_list();
        
            $this->load->view('app/reports/inpatient',$this->data);        
        }
    }
	
	public function discharged_patient(){
		if(isset($_POST['btnView'])){
			
			$this->data['reports_title'] = "Discharged Patient Reports";
			$this->data['discharged_patient'] = $this->reports_model->discharged_patient();
			
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/discharged_patient',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result/discharged_patient', $this->data, true);
        		pdf_create($html, 'discharged_patient', TRUE);
			}
			
			
		}else{
			 // user restriction function
            $this->session->set_userdata('page_name','discharged_patient_report');
            $page_id = $this->general_model->getPageID();
            $userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
            if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
                redirect(base_url().'access_denied');
            }
            // end of user restriction function
                 
            $this->session->set_userdata(array(
                 'tab'            =>        'reports',
                 'module'        =>        'discharged_patient_report',
                 'subtab'        =>        '',
                 'submodule'    =>        ''));
                 
            $this->data['patient_list'] = $this->reports_model->patient_list();
        
            $this->load->view('app/reports/discharged_patient',$this->data);        	
		}
	}
	
	public function declared_receipt(){
		if(isset($_POST['btnView'])){
			
			$this->data['daily_sales2'] = $this->reports_model->daily_sales2();
			$this->data['total_sales2'] = $this->reports_model->total_sales2();
			
			$this->data['reports_title'] = "Daily Sales Reports";
			
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/declared_receipt',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result/declared_receipt', $this->data, true);
        		pdf_create($html, 'declared_receipt', TRUE);
			}
			
		}else{
			// user restriction function
            $this->session->set_userdata('page_name','declared_receipt_report');
            $page_id = $this->general_model->getPageID();
            $userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
            if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
                redirect(base_url().'access_denied');
            }
            // end of user restriction function
                 
            $this->session->set_userdata(array(
                 'tab'            =>        'reports',
                 'module'        =>        'discharged_patient_report',
                 'subtab'        =>        '',
                 'submodule'    =>        ''));
                 
            $this->data['patient_list'] = $this->reports_model->patient_list();
        
            $this->load->view('app/reports/declared_receipt',$this->data);        	
		}
	}
	
	
	
	public function doctorFeeReport(){
		if(isset($_POST['btnView'])){
			$this->data['doctor_fee_report'] = $this->reports_model->doctor_fee_report();
			$this->data['reports_title'] = "Doctor's Fee Reports";
			
			if($this->input->post('cType') == "browser"){
				$this->load->view('app/reports_result/doctor_fee_report',$this->data);	
			}else{
				$this->load->helper('file');
        		$this->load->helper('dompdf');  
       
        		$html = $this->load->view('app/reports_result_pdf/doctor_fee_report', $this->data, true);
        		pdf_create($html, 'doctor_fee_report', TRUE);
			}
			
		}else{
			// user restriction function
			$this->session->set_userdata('page_name','doctor_fee_report');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			$this->session->set_userdata(array(
				 'tab'			=>		'reports',
				 'module'		=>		'doctor_fee_report',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
				 
			$this->load->view('app/reports/doctor_fee_report',$this->data);	
		}
	}
	
	
	
	
}