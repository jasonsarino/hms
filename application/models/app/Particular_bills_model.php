<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Particular_bills_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->select("A.particular_id,A.particular_name,B.group_name,A.particular_desc,A.charge_amount");
		$this->db->order_by('A.particular_name','asc');
		$where = "(
				A.particular_name like '%".$this->session->userdata("search_particular_bill")."%' or 
				A.particular_desc like '%".$this->session->userdata("search_particular_bill")."%' or 
				B.group_name like '%".$this->session->userdata("search_particular_bill")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("bill_group_name B","B.group_id = A.group_id","left outer");
		$query = $this->db->get("bill_particular A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("A.particular_name,B.group_name,A.particular_desc,A.charge_amount");
		$this->db->order_by('A.particular_name','asc');
		$where = "(
				A.particular_name like '%".$this->session->userdata("search_particular_bill")."%' or 
				A.particular_desc like '%".$this->session->userdata("search_particular_bill")."%' or 
				B.group_name like '%".$this->session->userdata("search_particular_bill")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("bill_group_name B","B.group_id = A.group_id","left outer");
		$query = $this->db->get("bill_particular A");
		return $query->num_rows();
	}
	
	
	public function group_name(){
		$this->db->where("InActive","0");
		$this->db->order_by("group_name","ASC");
		$query = $this->db->get("bill_group_name");	
		return $query->result();
	}
	
	public function validate_particular_name_edit(){
		$this->db->where(array(
			'group_id'			=>		$this->input->post('group_name'),
			'particular_name'	=>		$this->input->post('partcular_name'),
			'particular_id !='	=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("bill_particular");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_particular_name(){
		$this->db->where(array(
			'group_id'			=>		$this->input->post('group_name'),
			'particular_name'	=>		$this->input->post('partcular_name'),
			'InActive'			=>		0
		));
		$query = $this->db->get("bill_particular");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'group_id'			=>		$this->input->post('group_name'),
			'particular_name'	=>		strtoupper($this->input->post('partcular_name')),
			'particular_desc'	=>		$this->input->post('description'),
			'charge_amount'		=>		$this->input->post('amount'),
			'InActive'			=>		0
		);	
		$this->db->insert("bill_particular",$this->data);
	}
	
	public function getBillName($id){
		$this->db->select("A.particular_id,A.particular_name,B.group_name,B.group_id,A.particular_desc,A.charge_amount");
		$this->db->where("A.particular_id",$id);
		$this->db->join("bill_group_name B","B.group_id = A.group_id","left outer");
		$query = $this->db->get("bill_particular A");
		return $query->row();
	}
	
	public function edit_save(){
		$this->data = array(
			'group_id'			=>		$this->input->post('group_name'),
			'particular_name'	=>		strtoupper($this->input->post('partcular_name')),
			'particular_desc'	=>		$this->input->post('description'),
			'charge_amount'		=>		$this->input->post('amount')
		);	
		$this->db->where("particular_id",$this->input->post('id'));
		$this->db->update("bill_particular",$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'			=>		1
		);	
		$this->db->where("particular_id",$id);
		$this->db->update("bill_particular",$this->data);
	}
	
	
	
	
	
	
	
}