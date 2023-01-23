<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Complain_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('complain_name','asc');
		$where = "(
				complain_name like '%".$this->input->post('search')."%' or 
				complain_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("complain", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('complain_name','asc');
		$where = "(
				complain_name like '%".$this->input->post('search')."%' or 
				complain_desc like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("complain");
		return $query->num_rows();
	}
	
	public function validate_complain_edit(){
		$this->db->where(array(
			'complain_name'		=>		$this->input->post('complain'),
			'complain_id !='	=>		$this->input->post('id'),
			'InActive'			=>		0
		));
		$query = $this->db->get("complain");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_complain(){
		$this->db->where(array(
			'complain_name'	=>		$this->input->post('complain'),
			'InActive'			=>		0
		));
		$query = $this->db->get("complain");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'		=> 1
		);	
		$this->db->where("complain_id", $id);
		$this->db->update('complain',$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'complain_name'		=> strtoupper($this->input->post('complain')),
			'complain_desc'		=> $this->input->post('description')
		);	
		$this->db->where("complain_id", $this->input->post('id'));
		$this->db->update('complain',$this->data);
	}
	
	public function save(){
		$this->data = array(
			'complain_name'		=> strtoupper($this->input->post('complain')),
			'complain_desc'		=> $this->input->post('description'),
			'InActive'			=> 0
		);	
		$this->db->insert('complain',$this->data);
	}
	
	public function getComplain($id){
		$query = $this->db->get_where("complain", array("complain_id" => $id));
		return $query->row();
	}
	
	
	
	


	
}
