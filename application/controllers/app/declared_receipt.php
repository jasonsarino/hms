<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'controllers/general.php'; 

class Declared_receipt extends General{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->load->model("app/reports_model");
		if(General::is_logged_in() == FALSE){
            redirect(base_url().'login');    
        }
		General::variable();	
	}
	
	public function index(){
		if(isset($_POST['btnView'])){
			
			$this->data['daily_sales'] = $this->reports_model->daily_sales();
			$this->data['total_sales'] = $this->reports_model->total_sales();
			
			$this->data['reports_title'] = "Daily Sales Reports";
			$this->load->view('app/reports_result/daily_sales',$this->data);	
			
		}else{
		
			// user restriction function
			$this->session->set_userdata('page_name','declared_receipt');
			$page_id = $this->general_model->getPageID();
			$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
			if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
				redirect(base_url().'access_denied');
			}
			// end of user restriction function
			$this->session->set_userdata(array(
				 'tab'			=>		'admin',
				 'module'		=>		'declared_receipt',
				 'subtab'		=>		'',
				 'submodule'	=>		''));
	
				
			$this->receiptList();
		
		}	
	}
	
	public function receiptList($offset = 0){
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		$roles = $this->reports_model->getORList($this->limit, $offset);
		
		$config['base_url'] = base_url().'app/declared_receipt/index/';
 		$config['total_rows'] = $this->reports_model->count_all_OR();
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
		$this->table->set_heading('Receipt No.','Date','Patient No.','Patient Name','Sub-total','Discount','Total','');
		$i = 0 + $offset;
		
		
		
		$imgPrint = "<i class='fa fa-print'></i>";
		$imgdownload = "<i class='fa fa-download'></i>";
		
		foreach ($roles as $roles)
		{		
				
				$this->table->add_row( 
									anchor('app/declared_receipt/view_receipt_print/'.$roles->receipt_no,$roles->receipt_no,"target=_blank"),
									date("M d, Y", strtotime($roles->dDate)), 
									$roles->patient_no, 
									$roles->patient, 
									number_format($roles->subtotal,2),
									number_format($roles->discount,2),
									number_format($roles->total_amount,2),
									anchor('app/declared_receipt/delete/'.$roles->id,'Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete?')"))
			);
		}
		
		$this->data['table'] = $this->table->generate();
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view('app/declared_receipt/index',$this->data);
	}
	
	
	public function view_receipt(){
		$this->data['ORList'] = $this->reports_model->ORList();
		$this->load->view('app/declared_receipt/view_receipt',$this->data);
	}
	
	public function view_receipt_print($or_no){
		$this->data['OR_details'] = $this->reports_model->OR_details($or_no);
		$this->load->view('app/declared_receipt/view_receipt_print',$this->data);
	}
	
	public function add($receipt_no){
		$this->data['ORList'] = $this->reports_model->getReceiptDetails($receipt_no);
		$this->load->view('app/declared_receipt/add',$this->data);
	}
	
	public function validate_receipt(){
		if($this->reports_model->validate_receipt()){
			$this->form_validation->set_message("validate_receipt","Receipt No. Already Exists.");
			return false;
		}else{
			return true;
		}
	}
	
	public function save(){
		$this->form_validation->set_rules("receipt_no","Receipt No.","trim|xss_clean|required|callback_validate_receipt");
		$this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissable'><i class='fa fa-warning'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>","</div>");
		
		if($this->form_validation->run()){
			$this->data = array(
				'receipt_no'		=>		$this->input->post('receipt_no'),
				'invoice_no'		=>		$this->input->post('invoice_no'),
				'old_receipt_no'	=>		$this->input->post('old_receipt_no'),
				'dDate'				=>		$this->input->post('dDate'),
				'iop_id'			=>		$this->input->post('iop_id'),
				'patient_no'		=>		$this->input->post('patient_no'),
				'payment_type'		=>		$this->input->post('payment_type'),
				'discount'			=>		$this->input->post('discount'),
				'subtotal'			=>		$this->input->post('subtotal'),
				'total_amount'		=>		$this->input->post('total_amount'),
				'amountPaid'		=>		$this->input->post('amountPaid'),
				'change'			=>		$this->input->post('change'),
				'total_purchased'	=>		$this->input->post('total_purchased'),
				'InActive'			=>		0
			);
			$this->db->insert("declaredor",$this->data);
		
			$value = $this->input->post('receipt_no');
			General::logfile('Declared Receipt','INSERT',$value);
			
			$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable' id='table1'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Declared Receipt successfully Added!</div>");
			
			//redirect
			redirect(base_url().'app/declared_receipt',$this->data);
		}else{
			$this->add($this->input->post('old_receipt_no'));
		}
		
		
	}
	
	public function delete($id){
				// user restriction function
				$this->session->set_userdata('page_name','delete_delaredOR');
				$page_id = $this->general_model->getPageID();
				$userRole = $this->general_model->getUserLoggedIn($this->session->userdata('username'));
				if(General::has_rights_to_access($page_id->page_id,$userRole->user_role) == FALSE){
					redirect(base_url().'access_denied');
				}
				// end of user restriction function
			
		$this->db->query("update declaredor set InActive = 1 where id = '".$id."'");
		
		$value = $id;
		General::logfile('Declared Receipt','DELETE',$value);
				
		$this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Declared Receipt successfully Deleted!</div>");
			
		//redirect
		redirect(base_url().'app/declared_receipt',$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}