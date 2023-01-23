<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Surgeries_model extends CI_Model{
	
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
		return $query->result();
	}
	
	
}