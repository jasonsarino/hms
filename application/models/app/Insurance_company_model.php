<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Insurance_company_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('company_name','asc');
		$where = "(
				company_name like '%".$this->input->post('search')."%' or 
				company_address like '%".$this->input->post('search')."%' or 
				email_address like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("insurance_comp", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('company_name','asc');
		$where = "(
				company_name like '%".$this->input->post('search')."%' or 
				company_address like '%".$this->input->post('search')."%' or 
				email_address like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("insurance_comp");
		return $query->num_rows();
	}
	
	
	public function validate_company_edit(){
		$this->db->where(array(
			'company_name'	=>		$this->input->post('company_name'),
			'in_com_id !='	=>		$this->input->post('id'),
			'InActive'		=>		0
		));
		$query = $this->db->get("insurance_comp");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_company(){
		$this->db->where(array(
			'company_name'	=>		$this->input->post('company_name'),
			'InActive'		=>		0
		));
		$query = $this->db->get("insurance_comp");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'			=>		1
		);	
		$this->db->where("in_com_id",$id);
		$this->db->update("insurance_comp",$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'company_name'			=>		$this->input->post('company_name'),
			'company_address'		=>		$this->input->post('address'),
			'phone_no'				=>		$this->input->post('phone_no'),
			'fax_no'				=>		$this->input->post('fax_no'),
			'email_address'			=>		$this->input->post('email_address'),
			'contact_person'		=>		$this->input->post('contact_person'),
			'contact_no_person'		=>		$this->input->post('contact_no_person'),
			'contact_email'			=>		$this->input->post('contact_email'),
			'notes'					=>		$this->input->post('remarks')
		);	
		$this->db->where("in_com_id",$this->input->post('id'));
		$this->db->update("insurance_comp",$this->data);
	}
	
	public function save(){
		$this->data = array(
			'company_name'			=>		$this->input->post('company_name'),
			'company_address'		=>		$this->input->post('address'),
			'phone_no'				=>		$this->input->post('phone_no'),
			'fax_no'				=>		$this->input->post('fax_no'),
			'email_address'			=>		$this->input->post('email_address'),
			'contact_person'		=>		$this->input->post('contact_person'),
			'contact_no_person'		=>		$this->input->post('contact_no_person'),
			'contact_email'			=>		$this->input->post('contact_email'),
			'notes'					=>		$this->input->post('remarks'),
			'InActive'				=>		0
		);	
		$this->db->insert("insurance_comp",$this->data);
	}
	
	public function getInsurance_company($id){
		$query = $this->db->get_where("insurance_comp",array("in_com_id"=>$id));	
		return $query->row();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}