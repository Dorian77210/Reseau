<?php

class User_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	#############################################
	#fonction qui permet de recuperer un utilisateur
	#@Param : login -> login de l'utilisateur	
	public function get_user_by_login($login){

		$this->db->select('*')
				 ->from('Reseau_User')
				 ->where('Reseau_User.login', $login)
				 ->limit(1);

		$query = $this->db->get();
		//le login n'existe pas
		if($this->db->affected_rows() == 0) return false;
		return $query->row();
	}

	#################################################################
	#fonction qui permets de verifier que le mot de passe est correct
	#@Param : login -> login de l'utilisateur, password -> mdp
	public function is_password_correct($login, $password){

		$this->db->select('*')
				 ->from('Reseau_User')
				 ->where('login', $login)
				 ->limit(1);

		$query = $this->db->get();
		if($this->db->affected_rows() == 0) return false;
		return password_verify($password, $query->row()->password);
	}

	#################################################################
	#fonction pour modifier le compte d'un utilisateur
	#@Param : fieldname -> champs a modifier
	#		  $value 	-> nouvelle valeur du champs
	#		  $login 	-> login de l'utilisateur
	public function update_account($fieldname, $value, $login){

		$this->db->where('Reseau_User.login', $login)
				 ->update('Reseau_User', array(
				 		$fieldname			=>		$value
				 	)
				 );
		if($this->db->affected_rows() > 0) return true;
		return false;
	}

	###########################################################
	#fonction qui permet de recuperer les amis d'un utilisateur
	#@Param : login -> utilisateur
	public function get_friends_by_login($login){

		$this->db->select('*')
				 ->from('Reseau_Friend')
				 ->where('friend1', $login)
				 ->or_where('friend2 = ', $login);

		$query = $this->db->get();
		if($this->db->affected_rows() == 0) return null;
		return $query->result();
	}
}

?>
