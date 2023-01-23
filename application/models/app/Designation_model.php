<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Designation_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('designation','asc');
		$where = "(designation like '%".$this->input->post('search')."%' or description like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("designation", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('designation','asc');
		$where = "(designation like '%".$this->input->post('search')."%' or description like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("designation");
		return $query->num_rows();
	}
	
	public function validate_designation_edit(){
		//$this->db->select("designation");
		$this->db->where(array(
			'designation'			=>		$this->input->post('designation'),
			'designation_id !='		=>		$this->input->post('id')
		));
		$query = $this->db->get("designation");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_designation(){
		//$this->db->select("designation");
		$this->db->where(array(
			'designation'	=>		$this->input->post('designation'),
			'InActive'		=>		0
		));
		$query = $this->db->get("designation");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'designation'	=>		$this->input->post('designation'),
			'description'	=>		$this->input->post('description'),
			'InActive'		=>		0
		);	
		$this->db->insert("designation",$this->data);
	}
	
	public function getDesignation($id){
		$this->db->where('designation_id',$id);	
		$query = $this->db->get("designation");
		return $query->row();
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'	=>		1
		);	
		$this->db->where('designation_id',$id);
		$this->db->update("designation",$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'designation'	=>		$this->input->post('designation'),
			'description'	=>		$this->input->post('description')
		);	
		$this->db->where('designation_id',$this->input->post('id'));
		$this->db->update("designation",$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
}