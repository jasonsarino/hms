<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Room_category_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('category_name','asc');
		$where = "(category_name like '%".$this->input->post('search')."%' or category_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("room_category", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('category_name','asc');
		$where = "(category_name like '%".$this->input->post('search')."%' or category_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("room_category");
		return $query->num_rows();
	}
	
	public function validate_room(){
		$this->db->where(array(
			'category_name'	=>		$this->input->post('category'),
			'InActive'		=>		0
		));
		$query = $this->db->get("room_category");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_room_edit(){
		$this->db->where(array(
			'category_name'		=>		$this->input->post('category'),
			'category_id !='	=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("room_category");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'category_name'		=>		$this->input->post('category'),
			'category_desc'		=>		$this->input->post('description'),
			'InActive'			=>		0
		);	
		$this->db->insert("room_category",$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'category_name'		=>		$this->input->post('category'),
			'category_desc'		=>		$this->input->post('description')
		);	
		$this->db->where("category_id",$this->input->post('id'));
		$this->db->update("room_category",$this->data);
	}
	
	public function getRoom($id){
		$this->db->where("category_id",$id);
		$query = $this->db->get("room_category");
		return $query->row();
	}
	
	public function delete($id){
		$this->db->where("category_id",$id);
		$this->data = array(
			'InActive'	=>		1
		);
		$this->db->update("room_category",$this->data);
	}
	
	
	
	
	
	
	
	
	
	
	
}