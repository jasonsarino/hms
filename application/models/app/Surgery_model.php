<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Surgery_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('surgery_name','asc');
		$where = "(surgery_name like '%".$this->input->post('search')."%' or surgery_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("surgical_package", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('surgery_name','asc');
		$where = "(surgery_name like '%".$this->input->post('search')."%' or surgery_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("surgical_package");
		return $query->num_rows();
	}
	
	public function validate_surgery(){
		$this->db->where(array(
			'surgery_name'		=>		$this->input->post('surgery_name'),
			'InActive'			=>		0
		));
		$query = $this->db->get("surgical_package");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'surgery_name'	=>		$this->input->post('surgery_name'),
			'surgery_desc'	=>		$this->input->post('description'),
			'InActive'		=>		0
		);	
		$this->db->insert("surgical_package",$this->data);
	}
	
	public function getSurgery($id){
		$where = "surgery_name like '%".$this->input->post('search')."%' and surgery_id = '".$id."'";
		$this->db->where($where);	
		$query = $this->db->get("surgical_package");
		return $query->row();
	}
	
	public function validate_surgery_edit(){
		$this->db->where(array(
			'surgery_name'		=>		$this->input->post('surgery_name'),
			'surgery_id !='		=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("surgical_package");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_save(){
		$this->data = array(
			'surgery_name'	=>		$this->input->post('surgery_name'),
			'surgery_desc'	=>		$this->input->post('description'),
		);	
		$this->db->where('surgery_id',$this->input->post('id'));
		$this->db->update("surgical_package",$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'	=>		1
		);	
		$this->db->where('surgery_id',$id);
		$this->db->update("surgical_package",$this->data);
	}
	
	public function surgery_items($id){
		$this->db->select("B.particular_name,A.costs,A.cDesc,A.m_id");
		$this->db->order_by("B.particular_name","ASC");
		$this->db->join("bill_particular B","B.particular_id = A.surgery_item","left outer");
		$query = $this->db->get_where("surgical_package_t A",array(
			'A.surgery_id'	=>		$id,
			'A.InActive'		=>		0
		));	
		return $query->result();
	}
	
	public function validate_surgery2(){
		$this->db->where(array(
			'surgery_id'		=>		$this->input->post('surgery_id'),
			'surgery_item'		=>		$this->input->post('idparticular'),
			'InActive'			=>		0
		));
		$query = $this->db->get("surgical_package_t");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save_item(){
		$this->data = array(
			'surgery_id'	=>	$this->input->post('surgery_id'),
			'surgery_item'	=>	$this->input->post('particular'),
			'cDesc'			=>	$this->input->post('description'),
			'costs'			=>	$this->input->post('rate'),
			'InActive'		=>	0
		);	
		$this->db->insert("surgical_package_t",$this->data);
	}
	
	
	
	
	
	
	
	
}