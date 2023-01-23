<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Medicine_category_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('med_category_name','asc');
		$where = "(
				med_category_name like '%".$this->input->post('search')."%' or 
				med_category_desc like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("medicine_category", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('med_category_name','asc');
		$where = "(
				med_category_name like '%".$this->input->post('search')."%' or 
				med_category_desc like '%".$this->input->post('search')."%'
				) 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("medicine_category");
		return $query->num_rows();
	}
	
	public function validate_category_edit(){
		$this->db->where(array(
			'med_category_name'	=>		$this->input->post('category'),
			'cat_id !='			=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("medicine_category");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_category(){
		$this->db->where(array(
			'med_category_name'	=>		$this->input->post('category'),
			'InActive'		=>		0
		));
		$query = $this->db->get("medicine_category");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_save(){
		$this->data = array(
			'med_category_name'		=> strtoupper($this->input->post('category')),
			'med_category_desc'		=> $this->input->post('description')
		);	
		$this->db->where("cat_id",$this->input->post('id'));
		$this->db->update('medicine_category',$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'		=> 1
		);	
		$this->db->where("cat_id",$id);
		$this->db->update('medicine_category',$this->data);
	}
	
	public function save(){
		$this->data = array(
			'med_category_name'		=> strtoupper($this->input->post('category')),
			'med_category_desc'		=> $this->input->post('description'),
			'InActive'				=> 0
		);	
		$this->db->insert('medicine_category',$this->data);
	}
	
	public function getCategory(){
		$this->db->order_by("med_category_name","asc");
		$query = $this->db->get("medicine_category");
		return $query->row();	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}