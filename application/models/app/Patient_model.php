<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Patient_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		

		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			C.cValue as 'gender',
			D.cValue as 'civil_status',
			A.age,
			A.date_entry
		",false);
		$where = "(
				A.lastname like '%".$this->session->userdata("search_patient_master")."%' or 
				A.firstname like '%".$this->session->userdata("search_patient_master")."%' or 
				A.middlename like '%".$this->session->userdata("search_patient_master")."%' or 
				C.cValue like '%".$this->session->userdata("search_patient_master")."%' or 
				D.cValue like '%".$this->session->userdata("search_patient_master")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$query = $this->db->get("patient_personal_info A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			C.cValue,
			D.cValue,
			A.age,
			A.date_entry
		",false);
		$where = "(
				A.lastname like '%".$this->session->userdata("search_patient_master")."%' or 
				A.firstname like '%".$this->session->userdata("search_patient_master")."%' or 
				A.middlename like '%".$this->session->userdata("search_patient_master")."%' or 
				C.cValue like '%".$this->session->userdata("search_patient_master")."%' or 
				D.cValue like '%".$this->session->userdata("search_patient_master")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->order_by('lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$query = $this->db->get("patient_personal_info A");
		return $query->num_rows();
	}
	
	public function lastPatientID(){
		$this->db->select("(cValue + 1) as patient_no");
		$this->db->where("cCode","patient_no");
		$query = $this->db->get("system_option");	
		return $query->row();
	}
	
	public function validate_email(){
		$this->db->where(array(
			'email_address'		=>		$this->input->post('email'),
			'InActive'			=>		0
		));
		$query = $this->db->get("patient_personal_info");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_patient(){
		$this->db->where(array(
			'lastname'		=>		$this->input->post('lastname'),
			'firstname'		=>		$this->input->post('firstname'),
			'birthday'		=>		$this->input->post('birthday'),
			'InActive'		=>		0
		));
		$query = $this->db->get("patient_personal_info");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$age = 0;
		$dob = strtotime($this->input->post('birthday'));
		$tdate = strtotime(date("Y-m-d"));
		while( $tdate > $dob = strtotime('+1 year', $dob))
        {
                ++$age;
        }
		
		$this->data = array(
			'patient_no'		=>		$this->input->post('patientID'),
			'title'				=>		$this->input->post('title'),
			'lastname'			=>		$this->input->post('lastname'),
			'firstname'			=>		$this->input->post('firstname'),
			'middlename'		=>		$this->input->post('middlename'),
			'gender'			=>		$this->input->post('gender'),
			'civil_status'		=>		$this->input->post('civil_status'),
			'birthday'			=>		$this->input->post('birthday'),
			'birthplace'		=>		$this->input->post('birthplace'),
			'fathers_name'		=>		$this->input->post('fathers_name'),
			'address2'			=>		$this->input->post('address2'),
			'age'				=>		$age,
			'religion'			=>		$this->input->post('religion'),
			'street'			=>		$this->input->post('noofhouse'),
			'subd_brgy'			=>		$this->input->post('brgy'),
			'province'			=>		$this->input->post('province'),
			'phone_no_office'	=>		$this->input->post('phone_office'),
			'phone_no'			=>		$this->input->post('phone'),
			'mobile_no'			=>		$this->input->post('mobile'),
			'email_address'		=>		$this->input->post('email'),
			'date_entry'		=>		date("Y-m-d h:i:s a"),
			'blood_group'		=>		$this->input->post('bloodGroup'),
			'Insurance_comp'	=>		$this->input->post('insurance_comp'),
			'insurance_no'		=>		$this->input->post('insurance_id'),
			'id_identifiers'	=>		$this->input->post('patient_iden'),
			'InActive'			=>		0
		);
		$this->db->insert("patient_personal_info",$this->data);
		
	}
	
	public function updateAutoNum(){
		$this->db->where(array(
			'cCode'			=>		'patient_no',
			'InActive'		=>		0
		));	
		$this->data = array('cValue'	=>		$this->input->post('userID2'));
		$this->db->update("system_option",$this->data);
	}
	
	public function getPatient($id){
		$query = $this->db->get_where("patient_personal_info", array('patient_no' => $id));	
		return $query->row();
	}
	
	public function validate_patient_edit(){
		$this->db->where(array(
			'lastname'		=>		$this->input->post('lastname'),
			'firstname'		=>		$this->input->post('firstname'),
			'patient_no !='	=>		$this->input->post('id'),
			'birthday'		=>		$this->input->post('birthday'),
			'InActive'		=>		0
		));
		$query = $this->db->get("patient_personal_info");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_email_edit(){
		$this->db->where(array(
			'email_address'		=>		$this->input->post('email'),
			'patient_no !='		=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("patient_personal_info");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function update(){
		$age = 0;
		$dob = strtotime($this->input->post('birthday'));
		$tdate = strtotime(date("Y-m-d"));
		while( $tdate > $dob = strtotime('+1 year', $dob))
        {
                ++$age;
        }
		
		$this->data = array(
			'title'				=>		$this->input->post('title'),
			'lastname'			=>		$this->input->post('lastname'),
			'firstname'			=>		$this->input->post('firstname'),
			'middlename'		=>		$this->input->post('middlename'),
			'gender'			=>		$this->input->post('gender'),
			'civil_status'		=>		$this->input->post('civil_status'),
			'birthday'			=>		$this->input->post('birthday'),
			'birthplace'		=>		$this->input->post('birthplace'),
			'age'				=>		$age,
			'religion'			=>		$this->input->post('religion'),
			'street'			=>		$this->input->post('noofhouse'),
			'subd_brgy'			=>		$this->input->post('brgy'),
			'province'			=>		$this->input->post('province'),
			'phone_no_office'	=>		$this->input->post('phone_office'),
			'phone_no'			=>		$this->input->post('phone'),
			'mobile_no'			=>		$this->input->post('mobile'),
			'email_address'		=>		$this->input->post('email'),
			'blood_group'		=>		$this->input->post('bloodGroup'),
			'Insurance_comp'	=>		$this->input->post('insurance_comp'),
			'insurance_no'		=>		$this->input->post('insurance_id'),
			'id_identifiers'	=>		$this->input->post('patient_iden')
		);
		$this->db->where("patient_no",$this->input->post('id'));
		$this->db->update("patient_personal_info",$this->data);
		
	}
	
	public function getPatientAttachment($id){
		$this->db->select("
			A.date_uploaded,
			A.attach_id,
			A.description,
			A.file_name,
			A.file_type,
			A.file_size,
			A.patient_no,
			concat(B.firstname,' ',B.lastname) as name
		",false);
		$this->db->where(array(
			'A.patient_no'	=>		$id,
			'A.InActive'		=>		0
		));
		$this->db->join("users B","B.user_id = A.uploaded_by","left outer");
		$query = $this->db->get("patient_attachment A");
		return $query->result();
	}
	
	
	public function uploadAttachment($image_data = array(),$emp_id){
		$this->data = array(
			'patient_no'		=>		$this->input->post('patient_no'),
			'date_uploaded'		=>		date("Y-m-d h:i:s a"),
			'uploaded_by'		=>		$this->session->userdata('user_id'),
			'description'		=>		$this->input->post('description'),
			'file_name'			=>		$image_data['file_name'],
			'file_type'			=>		$image_data['file_type'],
			'file_size'			=>		$image_data['file_size'],
			'InActive'			=>		0
		);
		$this->db->insert('patient_attachment',$this->data);
		

	}
	
	public function uploadImg($image_data = array(),$emp_id){
		$this->data = array(
			'picture'	=>		$image_data['file_name']
		);
		$this->db->where('patient_no',$emp_id);
		$this->db->update('patient_personal_info',$this->data);
		

	}
	
	public function getPatientHistory($id){
		$this->db->select("allergies,warnings,social_history,family_history,personal_history,past_medical_history");
		$this->db->where("patient_no",$id);
		$this->db->order_by('id','desc');
		$query = $this->db->get("patient_details_iop");
		return $query->row();
	}
	
	public function getPatientInfo($id){
		$this->db->select("
			A.patient_no,
			concat(B.cValue,' ',A.firstname,' ',A.middlename,' ',A.lastname) as 'name',
			A.picture,
			A.age,
			A.street,
			A.subd_brgy,
			A.province,
			A.phone_no,
			concat(A.street,' ',A.subd_brgy,' ',A.province) as 'address',
			A.birthday,
			A.birthplace,
			A.religion,
			C.cValue as 'gender',
			D.cValue as 'civil_status',
			A.age,
			A.date_entry,
			A.phone_no,
			A.phone_no_office,
			A.mobile_no,
			A.email_address,
			A.date_entry,
			A.blood_group,
			A.InActive,
			F.cValue as 'blood_group',
			A.Insurance_comp,
			A.insurance_no,
			A.id_identifiers,
			E.cValue as religion,
			G.company_name,
			A.picture
		",false);
		$this->db->where("A.patient_no",$id);
		$this->db->order_by('lastname','asc');
		$this->db->join("system_parameters B","B.param_id = A.title","left outer");
		$this->db->join("system_parameters C","C.param_id = A.gender","left outer");
		$this->db->join("system_parameters D","D.param_id = A.civil_status","left outer");
		$this->db->join("system_parameters E","E.param_id = A.religion","left outer");
		$this->db->join("system_parameters F","F.param_id = A.blood_group","left outer");
		$this->db->join("insurance_comp G","G.in_com_id = A.Insurance_comp","left outer");
		$query = $this->db->get("patient_personal_info A");
		return $query->row();
	}
	
	
	
	
	
	
}