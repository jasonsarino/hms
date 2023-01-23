<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Department_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('dept_name','asc');
		$where = "(dept_name like '%".$this->input->post('search')."%' or dept_code like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("department", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('dept_name','asc');
		$where = "(dept_name like '%".$this->input->post('search')."%' or dept_code like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("department");
		return $query->num_rows();
	}
	
	public function validate_department_edit(){
		//$this->db->select("designation");
		$this->db->where(array(
			'dept_code'			=>		$this->input->post('code'),
			'dept_name'			=>		$this->input->post('department'),
			'department_id !='	=>		$this->input->post('id'),		
			'InActive'			=>		0
		));
		$query = $this->db->get("department");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_department(){
		//$this->db->select("designation");
		$this->db->where(array(
			'dept_code'	=>		$this->input->post('code'),
			'dept_name'	=>		$this->input->post('department'),
			'InActive'		=>		0
		));
		$query = $this->db->get("department");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_save(){
		$this->data = array(
			'dept_code'	=>		$this->input->post('code'),
			'dept_name'	=>		$this->input->post('department')
		);	
		$this->db->where('department_id',$this->input->post('id'));
		$this->db->update("department",$this->data);
	}
	
	public function save(){
		$this->data = array(
			'dept_code'	=>		$this->input->post('code'),
			'dept_name'	=>		$this->input->post('department'),
			'InActive'		=>		0
		);	
		$this->db->insert("department",$this->data);
	}
	
	public function getDepartment($id){
		$this->db->where('department_id',$id);	
		$query = $this->db->get("department");
		return $query->row();
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'	=>		1
		);	
		$this->db->where('department_id',$id);
		$this->db->update("department",$this->data);
	}
	
	
	
	
	
	
	
	
	
}