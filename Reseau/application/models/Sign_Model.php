<?php

class Sign_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	#######################################################
	#fonction qui permet de verifier si un login est unque
	#@Param : login -> login a verifier
	#@Return : true -> le login est unique
	#		   false -> le login n'est pas unique
	public function is_login_unique($login){

		$this->db->select('login')
				 ->from('Reseau_User')
				 ->where('Reseau_User.login', $login)
				 ->limit(1);
		if($this->db->affected_rows() > 1) return false;
		return true;
	}

	#######################################################
	#fonction qui permet de creer un nouvel utilisateur
	#@Param : user -> nouvel utiliseteur
	public function create_new_user($user){

		return $this->db->insert('Reseau_User', $user);
	}	

	
}

?>