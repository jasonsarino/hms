<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Billing_history extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/bill_history_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
			// user restriction function
				$this->session->set_userdata('page_name','billing_history');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
				
		//$this->session->set_userdata(array('tab'=>'configuration', 'module'=>'roles'));
		$this->session->set_userdata(array(
				 'tab'			=>		'billing',
				 'module'		=>		'bill_history',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
		
		$this->billList();
	}
	
	public function billList($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$roles = $this->bill_history_model->getAll($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/billing_history/index/';
 		$config['total_rows'] = $this->bill_history_model->count_all();
 		$config['per_page'] = $this->limit;
		
		
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<ul class="pagination pagination no-margin pull-right">';
		$config['full_tag_close'] = '</ul><!--pagination-->';

		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$this->data['pagination'] = $this->pagination->create_links();
	
		$tmpl = array('table_open' => '<table class="table table-hover table-striped">');
        $this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Invoice No.','Patient No.','IOP No.','Patient Name','Date','Amount','');
		$i = 0 + $offset;
		
		
		
		$imgPrint = "<i class='fa fa-print'></i>";
		$imgdownload = "<i class='fa fa-download'></i>";
		
		foreach ($roles as $roles)
		{	
				if($roles->receipt_no == ""){
					$a = anchor('app/pos/saved/'.$roles->iop_id.'/'.$roles->patient_no.'/'.$roles->invoice_no,'Payment','target="_blank" title="Payment"');
				}else{
					$a = "PAID";
				}
				
				
				$this->table->add_row( 
									anchor('app/billing_history/view/'.$roles->invoice_no,$roles->invoice_no),
									//$roles->receipt_no, 
									$roles->patient_no, 
									$roles->iop_id, 
									$roles->patient, 
									date("M d, Y", strtotime($roles->dDate)), 
									number_format($roles->total_amount,2),
									anchor('app/opd/printInv/'.$roles->iop_id.'/'.$roles->patient_no.'/'.$roles->invoice_no,'Print','target="_blank" title="Print"').'&nbsp;&nbsp; | '.
									$a
			);
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['table'] = $this->table->generate();

		$this->load->view('app/billing_history/index',$this->data);	
	}
	
	
	public function view($invoiceno){
		
		$this->data['header'] = $this->bill_history_model->getHeader($invoiceno);
		$this->data['details'] = $this->bill_history_model->details($invoiceno);
		$this->data['patientInfo'] = $this->bill_history_model->patientInfo($invoiceno);
		
		$this->load->view('app/billing_history/view',$this->data);	
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}