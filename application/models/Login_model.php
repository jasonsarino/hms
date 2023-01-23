<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Login_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function validate_login(){
		$this->db->select("username,password");
		 $this->db->where(array(
                'username'      =>      $this->input->post('username'),
                'password'      =>      md5($this->input->post('password')),
				'InActive'		=>		0
        ));
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
	}
	
	public function getMyModule($user_id){
		$this->db->select("B.module");
		$this->db->where("user_id",$user_id);
		$this->db->join("user_roles B","B.role_id = A.user_role","left outer");
		$query = $this->db->get("users A");
		return $query->row();	
	}
	
	
}