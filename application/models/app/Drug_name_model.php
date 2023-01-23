<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Drug_name_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->select("
				A.drug_id,
				A.drug_name,
				D.med_category_name,
				B.cValue as 'cType',
				A.nPrice,
				A.drug_desc
		");
		$this->db->order_by('A.drug_name','asc');
		$where = "(
				A.drug_name like '%".$this->input->post('search')."%' or 
				A.drug_desc like '%".$this->input->post('search')."%' or 
				D.med_category_name like '%".$this->input->post('search')."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("system_parameters B","B.param_id = A.cType","left outer");
		$this->db->join("system_parameters C","C.param_id = A.uom","left outer");
		$this->db->join("medicine_category D","D.cat_id = A.med_cat_id","left outer");
		$query = $this->db->get("medicine_drug_name A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("
				A.drug_name,
				D.med_category_name,
				B.cValue,
				A.nPrice,
				A.drug_desc
		");
		$this->db->order_by('A.drug_name','asc');
		$where = "(
				A.drug_name like '%".$this->input->post('search')."%' or 
				A.drug_desc like '%".$this->input->post('search')."%' or 
				D.med_category_name like '%".$this->input->post('search')."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("system_parameters B","B.param_id = A.cType","left outer");
		$this->db->join("system_parameters C","C.param_id = A.uom","left outer");
		$this->db->join("medicine_category D","D.cat_id = A.med_cat_id","left outer");
		$query = $this->db->get("medicine_drug_name A");
		return $query->num_rows();
	}
	
	public function getType(){
		$this->db->where(array(
			'cCode'		=>		'type_medicine',
			'InActive'	=>		0
		));
		$this->db->order_by("cValue","ASC");
		$query = $this->db->get("system_parameters");	
		return $query->result();
	}
	
	public function getCategory(){
		$this->db->where("InActive","0");
		$this->db->order_by("med_category_name","ASC");
		$query = $this->db->get("medicine_category");	
		return $query->result();
	}
	
	public function getUOM(){
		$this->db->where(array(
			'cCode'		=>		'medicine_uom',
			'InActive'	=>		0
		));
		$this->db->order_by("cValue","ASC");
		$query = $this->db->get("system_parameters");	
		return $query->result();
	}
	
	public function validate_drugName_edit(){
		$this->db->where(array(
			'med_cat_id'	=>		$this->input->post('category'),
			'drug_name'		=>		$this->input->post('drug_name'),
			'drug_id !='		=>		$this->input->post('id'),
			'InActive'		=>		0
		));
		$query = $this->db->get("medicine_drug_name");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_drugName(){
		$this->db->where(array(
			'med_cat_id'	=>		$this->input->post('category'),
			'drug_name'		=>		$this->input->post('drug_name'),
			'InActive'		=>		0
		));
		$query = $this->db->get("medicine_drug_name");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'drug_name'			=> 	strtoupper($this->input->post('drug_name')),
			'med_cat_id'		=> 	$this->input->post('category'),
			'cType'				=> 	$this->input->post('cType'),
			'drug_desc'			=> 	$this->input->post('description'),
			'uom'				=> 	$this->input->post('uom'),
			're_order_level'	=> 	$this->input->post('reorder'),
			'nPrice'			=> 	$this->input->post('price'),
			'nStock'			=> 	$this->input->post('stock'),
			'InActive'			=> 	0
		);	
		$this->db->insert('medicine_drug_name',$this->data);
	}
	
	public function edit_save(){
		$this->data = array(
			'drug_name'			=> 	strtoupper($this->input->post('drug_name')),
			'med_cat_id'		=> 	$this->input->post('category'),
			'cType'				=> 	$this->input->post('cType'),
			'drug_desc'			=> 	$this->input->post('description'),
			'uom'				=> 	$this->input->post('uom'),
			're_order_level'	=> 	$this->input->post('reorder'),
			'nPrice'			=> 	$this->input->post('price'),
			'nStock'			=> 	$this->input->post('stock')
		);	
		$this->db->where("drug_id",$this->input->post('id'));
		$this->db->update('medicine_drug_name',$this->data);
	}
	
	public function delete($id){
		$this->data = array(
			'InActive'			=> 	1
		);	
		$this->db->where("drug_id",$id);
		$this->db->update('medicine_drug_name',$this->data);
	}
	
	public function getDrugName($id){
		$query = $this->db->get_where("medicine_drug_name",array('drug_id' => $id));	
		return $query->row();
	}
	
	
	
	
	
	
	
	
	
	
	
	
}