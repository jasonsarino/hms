<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Diagnosis_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('diagnosis_name','asc');
		$where = "(
				diagnosis_name like '%".$this->input->post('search')."%' or 
				diagnosis_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("diagnosis", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('diagnosis_name','asc');
		$where = "(
				diagnosis_name like '%".$this->input->post('search')."%' or 
				diagnosis_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("diagnosis");
		return $query->num_rows();
	}
	
	public function validate_diagnosis_edit(){
		$this->db->where(array(
			'diagnosis_name'	=>		$this->input->post('diagnosis'),
			'diagnosis_id !='	=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("diagnosis");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_diagnosis(){
		$this->db->where(array(
			'diagnosis_name'	=>		$this->input->post('diagnosis'),
			'InActive'			=>		0
		));
		$query = $this->db->get("diagnosis");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'diagnosis_name'	=> strtoupper($this->input->post('diagnosis')),
			'diagnosis_desc'	=> $this->input->post('description'),
			'InActive'			=> 0
		);	
		$this->db->insert('diagnosis',$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'	=> 1
		);	
		$this->db->where("diagnosis_id",$id);
		$this->db->update('diagnosis',$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'diagnosis_name'	=> strtoupper($this->input->post('diagnosis')),
			'diagnosis_desc'	=> $this->input->post('description')
		);	
		$this->db->where("diagnosis_id",$this->input->post('id'));
		$this->db->update('diagnosis',$this->data);
	}
	
	
	public function getDiagnosis($id){
		$query = $this->db->get_where("diagnosis",array('diagnosis_id' => $id));	
		return $query->row();
	}
	
	
	
}