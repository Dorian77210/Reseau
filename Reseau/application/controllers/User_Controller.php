<?php

class User_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		//helper
		$this->load->helper('date');

		//librairies
		$this->load->library('form_validation');

		//modeles
		$this->load->model('User_Model');
		$this->load->model('Invitation_Model');
		$this->load->model('Conversation_Model');
	}

	##########################################
	#fonction qui dirige l'utilisateur sur son home
	public function home(){

		//recuperation des amis de l'utilisateur
		$friends = $this->User_Model->get_friends_by_login($this->session->login);
		$this->load->view('User_Home', array(
				'login'			=>		$this->session->login,
				'lastname'		=>		$this->session->lastname,
				'firstname'		=>		$this->session->firstname,
				'email'			=>		$this->session->email,
				'actual_date'	=>		mdate('%d-%m-%Y'),
				'friends'		=>		$friends
			)
		);
	}

	###############################################
	#fonction qui deconnecte l'utilisateur
	public function deconnection(){

		$this->session->sess_destroy();
		redirect('home');
	}

	#################################################
	#fonction qui dirige l'utilisateur sur son profil
	public function profil(){

		$this->load->view('User_Profil', array(
				'login'			=>		$this->session->login,
				'lastname'		=>		$this->session->lastname,
				'firstname'		=>		$this->session->firstname,
				'email'			=>		$this->session->email,
				'date'			=>		$this->session->date
			)
		);
	}

	##############################################################
	#fonction qui dirige l'utilisateur pour envoyer une invitation
	public function invitation(){

		//Regles pour le login
		$this->form_validation->set_rules('login', 'Login', 'trim|required', array(
				'required'			=>		'Vous n\'avez pas renseigné de login à rechercher.'
			)
		);

		if(!$this->form_validation->run()) $this->load->view('User_Invitation');
		else{
			//recuperation du login
			$login = $this->input->post('login', true);

			//on verifie que l'utilisateur mis dans le formulaire existe
			if(!$this->User_Model->get_user_by_login($login)){

				$this->load->view('User_Invitation', array('message' => 'L\'utilisateur mentionné n\'existe pas.'));
				return false;
			}

			//on verifie qu'une invitation n'existe pas deja
			if($this->Invitation_Model->is_invitation_exist($this->session->login, $login)){

				$this->load->view('User_Invitation', array('message' => 'Vous avez déjà envoyé une invitation à '.$login));
				return false;
			}

			//on verifie qu'ils ne sont pas amis
			if($this->Invitation_Model->are_friends($this->session->login, $login)){

				$this->load->view('User_Invitation', array('message' => 'Vous êtes déjà amis avec '.$login));
				return false;
			}

			//verification de l'envoie de l'invitation
			if(!$this->Invitation_Model->send_friend_invitation($this->session->login, $login)){

				$this->load->view('User_Invitation', array('message' => 'Erreur lors de l\'envoi de l\'invitation. Veuillez réessayer ulterieurement.'));
				return false;
			}
			
			//redirection
			$this->load->view('User_Invitation', array('message' => 'Votre invitation a bien été envoyée.'));
		}
	}

	######################################################
	#fonction qui dirige l'utilisateur sur ses invitations
	public function my_invitations(){

		$invitations = $this->Invitation_Model->get_invitations_by_login($this->session->login);

		//Regles pour les invitations
		$this->form_validation->set_rules('invitations[]', 'Invitations', 'trim');
		if(!$this->form_validation->run()) $this->load->view('User_My_Invitation', array('invitations' => $invitations));
		else{
			//recuperation des invitations
			$invitations = $this->input->post('invitations[]');
			foreach($invitations as $new_friend){

				//creation de la liaison d'amitie
				if(!$this->Invitation_Model->add_friends($this->session->login, $new_friend)) redirect('error/friends');

				//on supprime la ou les invitations
				$this->Invitation_Model->delete_invitations_by_friends($this->session->login, $new_friend);
			}

			$this->load->view('User_My_Invitation', array('message' => 'Vos invitations ont bien été pris en compte.'));
		}
	}

	###########################################################
	#fonction qui dirige l'utilisateur sur une conversation
	#@Param : receiver -> destinataire
	public function send_message($receiver){

		//Regle pour le message
		$this->form_validation->set_rules('message', 'Message', 'trim|required', array(
				'required'			=>		'Vous n\'avez pas spécifié de message.'
			)
		);

		$messages = $this->Conversation_Model->get_messages_by_friends($this->session->login, $receiver);
		if(!$this->form_validation->run()) $this->load->view('User_Message', array(
				'receiver'			=>		$receiver,
				'messages'			=>		$messages,
				'login'				=>		$this->session->login
			)
		);
		else{
			//traitement du message
			$message = $this->input->post('message', true);
			if(!$this->Conversation_Model->send_message(array(
					'sender'			=>		$this->session->login,
					'receiver'			=>		$receiver,
					'date'				=>		mdate('%Y-%m-%d'),
					'hour'				=>		mdate('%h-%i'),
					'content'			=>		$message		
					)
				)
			){

				redirect('error/message');
			}

			redirect('user/send_message/'.$receiver);
		}
	}

}	

?>