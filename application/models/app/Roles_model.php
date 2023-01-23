<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Roles_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->order_by('role_name','asc');
		$where = "(role_name like '%".$this->input->post('search')."%' or role_description like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("user_roles", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->order_by('role_name','asc');
		$where = "(role_name like '%".$this->input->post('search')."%' or role_description like '%".$this->input->post('search')."%') 
				and InActive = 0";
		$this->db->where($where);
		$query = $this->db->get("user_roles");
		return $query->num_rows();
	}
	
	public function save(){
		$this->data = array(
			'module'				=>		$this->input->post('module'),
			'role_name'				=>		$this->input->post('role_name'),
			'role_description'		=>		$this->input->post('role_description'),
			'InActive'				=>		0
		);	
		
		$query = $this->db->insert("user_roles",$this->data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}	
	
	public function getRole($id){
		$this->db->where('role_id',$id);
		$query = $this->db->get('user_roles');
		return $query->row();		
	}
	
	public function update(){
		$this->data = array(
			'module'				=>		$this->input->post('module'),
			'role_name'				=>		$this->input->post('role_name'),
			'role_description'		=>		$this->input->post('role_description')
		);	
		
		$this->db->where('role_id',$this->input->post('id'));
		$query = $this->db->update("user_roles",$this->data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}	
	
	public function delete($id){
		$this->data = array('InActive' =>  1);
		$this->db->where('role_id',$id);
		$query =  $this->db->update("user_roles",$this->data);	
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	public function getPageModule(){
		$query = $this->db->query("select distinct page_module as page_module from pages where InActive = 0 order by page_module asc");	
		return $query->result();
	}
	
	public function getPageByPageModule($pageModule){
		$this->db->where('page_module', $pageModule);	
		$this->db->order_by('page_name','asc');
		$query = $this->db->get("pages");
		return $query->result();
	}
	
	public function getRole_AccessLevel($page_id,$role_id){
		$this->db->where(array(
			'role_id'	=>		$role_id,
			'page_id'	=>		$page_id
		));
		$query = $this->db->get("user_roles_pages");
		return $query->row();
	}
	

	
	
	
}