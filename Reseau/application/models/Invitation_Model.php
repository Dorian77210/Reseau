<?php

class Invitation_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}


	#####################################
	#fonction pour envoyer une invitation
	#@Param : sender -> envoyeur
	#		: receiver -> receveur
	public function send_friend_invitation($sender, $receiver){

		 return $this->db->insert('Reseau_Invitation', array(
				'sender'			=>		$sender,
				'receiver'			=>		$receiver,
				'date'				=>		mdate('%Y-%m-%d')
			)
		);
	}

	#########################################################
	#fonction qui permet de verifier qu'une invitation existe
	#@Param : sender -> envoyeur
	#		: receiver -> receveur
	public function is_invitation_exist($sender, $receiver){

		$this->db->select('*')
				 ->from('Reseau_Invitation')
				 ->where('sender', $sender)
				 ->where('receiver = ', $receiver)
				 ->limit(1);

		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return false;
		return true;
	}

	######################################################
	#fonction qui permets de recuperer ses invitations
	#@Param : login -> utilisateur
	#		: accept -> invitations acceptees ou pas
	public function get_invitations_by_login($login, $accept = false){

		$is_accepted = 0;
		if($accept) $is_accepted = 1;

		$this->db->select('*')
				 ->from('Reseau_Invitation')
				 ->where('receiver', $login)
				 ->where('accept = ', $is_accepted);

		$query = $this->db->get();

		if($this->db->affected_rows() == 0) return null;
		return $query->result();		 
	}

	####################################################
	#fonction pour ajouter des amis
	#@Param : friend1 -> premier ami
	#		: friend2 -> deuxieme ami
	public function add_friends($friend1, $friend2){

		return $this->db->insert('Reseau_Friend', array(
				'friend1'			=>		$friend1,
				'friend2'			=>		$friend2,
				'date'				=>		mdate('%Y-%m-%d')
			)
		);
	}

	###################################################
	#fonction pour supprimer des invitations d'amis
	#@Param : friend1 -> sender || receiver
	#		: friend2 -> sender || receiver
	public function delete_invitations_by_friends($friend1, $friend2){

		//premier cas
		$this->db->where('sender', $friend1)
				 ->where('receiver = ', $friend2)
				 ->delete('Reseau_Invitation');

		//deuxieme cas
		$this->db->where('sender', $friend2)
				 ->where('receiver = ', $friend1)
				 ->delete('Reseau_Invitation');

	}

	##############################################################
	#fonction qui verifie la liaison d'amitie entre deux personnes
	#@Param : friend1 -> premier ami
	#		: friend2 -> deuxieme ami
	public function are_friends($friend1, $friend2){

		//premier cas
		$this->db->select('*')
				 ->from('Reseau_Friend')
				 ->where('friend1', $friend1)
				 ->where('friend2 = ', $friend2)
				 ->limit(1);

		$query = $this->db->get();
		if($this->db->affected_rows() == 1) return true;

		//deuxieme cas
		$this->db->select('*')
				 ->from('Reseau_Friend')
				 ->where('friend1', $friend2)
				 ->where('friend2 = ', $friend1)
				 ->limit(1);

		$query = $this->db->get();
		if($this->db->affected_rows() == 1) return true;

		return false;
	}

	
}

?>