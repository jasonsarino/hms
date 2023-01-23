<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Room_master_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAll($limit = 10, $offset = 0){
		$this->db->select("A.room_master_id,A.room_name,C.floor_name,B.category_name,A.room_rates");
		$this->db->order_by('A.room_name','asc');
		$where = "(
				A.room_name like '%".$this->session->userdata("search_room_master")."%' or 
				C.floor_name like '%".$this->session->userdata("search_room_master")."%' or 
				B.category_name like '%".$this->session->userdata("search_room_master")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("room_category B","B.category_id = A.category_id","left outer");
		$this->db->join("floor C","C.floor_id = A.floor","left outer");
		$query = $this->db->get("room_master A", $limit, $offset);
		return $query->result();
	}
	
	public function count_all(){
		$this->db->select("A.room_master_id,A.room_name,C.floor_name,B.category_name,A.room_rates");
		$this->db->order_by('A.room_name','asc');
		$where = "(
				A.room_name like '%".$this->session->userdata("search_room_master")."%' or 
				C.floor_name like '%".$this->session->userdata("search_room_master")."%' or 
				B.category_name like '%".$this->session->userdata("search_room_master")."%'
				) 
				and A.InActive = 0";
		$this->db->where($where);
		$this->db->join("room_category B","B.category_id = A.category_id","left outer");
		$this->db->join("floor C","C.floor_id = A.floor","left outer");
		$query = $this->db->get("room_master A");
		return $query->num_rows();
	}
	
	public function validate_room_edit(){
		$this->db->where(array(
			'room_name'				=>		$this->input->post('room_name'),
			'category_id'			=>		$this->input->post('roomType'),
			'floor'					=>		$this->input->post('floor'),
			'room_master_id !='		=>		$this->input->post('id'),
			'InActive'				=>		0
		));
		$query = $this->db->get("room_master");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function validate_room(){
		$this->db->where(array(
			'room_name'		=>		$this->input->post('room_name'),
			'category_id'	=>		$this->input->post('roomType'),
			'floor'			=>		$this->input->post('floor'),
			'InActive'		=>		0
		));
		$query = $this->db->get("room_master");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function save(){
		$this->data = array(
			'category_id'	=>		$this->input->post('roomType'),
			'room_name'		=>		$this->input->post('room_name'),
			'floor'			=>		$this->input->post('floor'),
			'room_rates'	=>		$this->input->post('room_rates'),
			'InActive'		=>		0
		);	
		$this->db->insert("room_master",$this->data);
		
		
		
	}
	
	public function getRoom($id){
		$this->db->where("room_master_id",$id);
		$query = $this->db->get("room_master");
		return $query->row();	
	}
	
	
	public function edit_save(){
		$this->data = array(
			'category_id'	=>		$this->input->post('roomType'),
			'room_name'		=>		$this->input->post('room_name'),
			'room_rates'	=>		$this->input->post('room_rates'),
			'floor'			=>		$this->input->post('floor')
		);	
		$this->db->where("room_master_id",$this->input->post('id'));
		$this->db->update("room_master",$this->data);
	}
	
	
	public function delete($id){
		$this->data = array(
			'InActive'	=>	1
		);	
		$this->db->where("room_master_id",$id);
		$this->db->update("room_master",$this->data);
	}

	
	public function no_of_beds($id){
		$this->db->select("count(room_master_id) as room_beds");
		$this->db->where("room_master_id",$id);
		$query = $this->db->get("room_beds");
		return $query->row();	
	}
	
	public function getRoomInfo($id){
		$this->db->select("A.room_master_id,B.category_name,A.room_name,C.floor_name,A.room_rates");
		$this->db->where(array('A.room_master_id'=>$id));
		$this->db->join("room_category B","B.category_id = A.category_id","left outer");
		$this->db->join("floor C","C.floor_id = A.floor","left outer");
		$query = $this->db->get("room_master A");
		return $query->row();
	}
	
	public function getRoomBed($id){
		$this->db->select("A.bed_name, A.nStatus");
		$this->db->where("A.room_master_id",$id);
		$this->db->join("room_master B","B.room_master_id = A.room_master_id","left outer");
		$this->db->join("floor C","C.floor_id = B.floor","left outer");
		$this->db->join("room_category D","D.category_id = B.category_id","left outer");
		$this->db->order_by('A.bed_name','asc');
		$query = $this->db->get("room_beds A");
		return $query->result();
	}
	
	
	public function getPriceHistory($id){
		$this->db->select("A.price, A.dDate, concat(B.firstname,' ',B.lastname) as name",false);
		$this->db->where("A.nRef_ID",$id);
		$this->db->join("users B","B.user_id = A.updatedBy","left outer");
		$this->db->order_by("A.dDate","DESC");
		$query = $this->db->get("price_history A");
		return $query->result();	
	}
	
}