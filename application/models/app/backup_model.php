<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Backup_model extends CI_Model{
	
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
	
	
}