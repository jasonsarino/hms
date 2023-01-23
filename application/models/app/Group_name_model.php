<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Group_name_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('group_name','asc');
		$where = "(
				group_name like '%".$this->input->post('search')."%' or 
				group_desc like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("bill_group_name", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('group_name','asc');
		$where = "(
				group_name like '%".$this->input->post('search')."%' or 
				group_desc like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("bill_group_name");
		return $query->num_rows();
	}
	
	public function validate_group_name_edit(){
		$this->db->where(array(
			'group_name'	=>		$this->input->post('group_name'),
			'group_id !='		=>		$this->input->post('id'),
			'InActive'		=>		0
		));
		$query = $this->db->get("bill_group_name");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_group_name(){
		$this->db->where(array(
			'group_name'	=>		$this->input->post('group_name'),
			'InActive'		=>		0
		));
		$query = $this->db->get("bill_group_name");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'group_name'	=> strtoupper($this->input->post('group_name')),
			'group_desc'	=> $this->input->post('description'),
			'InActive'		=> 0
		);	
		$this->db->insert('bill_group_name',$this->data);
	}
	
	public function getGroupName($id){
		$query = $this->db->get_where("bill_group_name",array('group_id' =>  $id));	
		return $query->row();
	}
	
	
	public function edit_save(){
		$this->data = array(
			'group_name'	=> strtoupper($this->input->post('group_name')),
			'group_desc'	=> $this->input->post('description')
		);	
		$this->db->where("group_id",$this->input->post('id'));
		$this->db->update('bill_group_name',$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'	=>  1
		);	
		$this->db->where("group_id",$id);
		$this->db->update('bill_group_name',$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}