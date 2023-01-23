<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Parameters_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function param_list(){
		$this->db->select("distinct cCode as cCode",false);
		$query = $this->db->get("system_parameters");
		return $query->result();	
	}
	
	public function lists($module){
		$query = $this->db->get_where("system_parameters",array(
			'cCode'		=>		$module,
			'InActive'	=>		0
		));	
		return $query->result();
	}
	
	public function validate_param_edit(){
		$this->db->where(array(
			'cCode'			=>		$this->input->post('module'),
			'cValue'		=>		$this->input->post('cValue'),
			'param_id !='	=>		$this->input->post('id'),
			'InActive'		=>		0
		));	
		$query = $this->db->get("system_parameters");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function validate_param(){
		$this->db->where(array(
			'cCode'			=>		$this->input->post('module'),
			'cValue'		=>		$this->input->post('cValue'),
			'InActive'		=>		0
		));	
		$query = $this->db->get("system_parameters");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}
	
	public function save(){
		$this->data = array(
			'cCode'			=>		$this->input->post('module'),
			'cValue'		=>		$this->input->post('cValue'),
			'cDesc'			=>		$this->input->post('cDesc'),
			'InActive'		=>		0
		);	
		$this->db->insert("system_parameters",$this->data);
	}
	
	public function update(){
		$this->data = array(
			'cValue'		=>		$this->input->post('cValue'),
			'cDesc'			=>		$this->input->post('cDesc')
		);	
		$this->db->where('param_id',$this->input->post('id'));
		$this->db->update("system_parameters",$this->data);
	}
	
	public function delete($id){
		$this->data = array('InActive'=>'1');
		$this->db->where('param_id',$id);	
		$this->db->update("system_parameters",$this->data);
	}
	
	public function getParam($id){
		$query = $this->db->get_where("system_parameters",array('param_id'=>$id));	
		return $query->row();
	}
	
	
	
	
	
	
	
	
	
}