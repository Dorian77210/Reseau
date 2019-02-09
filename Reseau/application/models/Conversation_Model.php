<?php 

class Conversation_Model extends CI_Model{

	public function __construct(){

		parent::__construct();
	}

	################################
	#fonction pour creer un message
	#@Param : message -> message
	public function send_message($message){

		return $this->db->insert('Reseau_Message', $message);
	}

	######################################################################
	#fonction qui permet de recuperer les messages entre deux utilisateurs
	#@Param : friend1 -> premier ami
	#		: friend2 -> deuxieme ami
	public function get_messages_by_friends($friend1, $friend2){

		$this->db->select('*')
				 ->from('Reseau_Message')
				 ->where('sender', $friend1)
				 ->where('receiver = ', $friend2)
				 ->or_where('sender', $friend2)
				 ->where('receiver', $friend1)
				 ->order_by('date', 'ASC')
				 ->order_by('hour', 'ASC');

		$query = $this->db->get();
		if($this->db->affected_rows() == 0) return null;
		return $query->result();
	}
}

?>