<?php

class Error_Controller extends CI_Controller{
	
	public function __construct(){

		parent::__construct();
	}

	########################################################
	#fonction pour afficher une erreur lors de l'inscription
	public function inscription(){

		$this->load->view('Error_View', array('message' => 'Erreur lors de votre inscription. Veuillez réessayer ulterieurment.'));
	}

	########################################################
	#fonction pour afficher une erreur lors des mails
	public function mail(){

		$this->load->view('Error_View', array('message' => 'Erreur lors de l\'envoie de votre nouveau mot de passe. Veuillez réessayer ulterieurment.'));
	}

	#########################################################
	#fonction pour afficher un message d'erreur pour les amis
	public function friends(){

		$this->load->view('Error_View', array('message' => 'Erreur lors de la creation de vos liaisons d\'amitié'));
	}

	##################################################################
	#fonction pour afficher une erreur en cas de non envoie de message
	public function message(){

		$this->load->view('Error_View', array('message' => 'Erreur lors de l\'envoi de votre message. Veuillez réessayer ulterieurment.'))
	}

}

?>