<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<title>Accueil</title>
</head>
<nav>
	<span class="menu-mobile">Menu</span>
	<ul>	
			<li><a href="<?php echo base_url('user/home');?>" class="active"> 🏠 Accueil</a></li>
			<li><a href="<?php echo base_url('user/profil');?>"> 👤 Mon profil</a></li>
			<li><a href="<?php echo base_url('user/invitation') ;?>"> ✉️ Envoyer une invitation </a></li>
			<li><a href="<?php echo base_url('user/my_invitations');?>"> 📩 Mes invitations </a></li>
			<li><a href="<?php echo base_url('user/deconnection');?>"> 🔓 Se deconnecter </a></li>
	</ul>
</nav>
<body>
	<article>
		<?php echo '<h3>Bienvenue '.$firstname.' '.$lastname.' ! Aujourd\'hui nous sommes le '.$actual_date.'</h3>';
		if(isset($friends)){
			
			echo '<ul><center>Liste de vos amis : </center>';
			foreach($friends as $friend){

				$my_friend = $friend->friend1;
				if($login == $my_friend) $my_friend = $friend->friend2;

				$url = base_url('user/send_message/'.$my_friend);
				echo '<center><li>Vous êtes amis avec '.$my_friend.' depuis '.$friend->date.'. Vous pouvez discuter avec lui <a href="'.$url.'"> ici .</a></li></center>';
			}

			echo '</ul>';
		}  
		else{

			echo '<center><h5>Vous n\'avez pas encore d\'amis. Ajoutez en pour créer des discussions ! </h5></center>';
		}


		?>
	</article>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<footer>

	<div id="under_footer">

		<div id="contact">
			<h6>Me retrouver sur : </h6>
			<ul>
				<li><a href="https://www.instagram.com/">Sur instagram</a></li>
				<li><a href="https://www.facebook.com/" >Sur facebook</a></li>
				<li><a href="http://dwarves.iut-fbleau.fr/~terbah/">Mon site personnel</a></li>
			</ul>
		</div>

		<div id="me_contacter">

			<h6>Un avis ? Un conseil ? Une recommendation ? <br/>Un problème ? Contactez-moi ! </h6>
			<ul>
				<li><a href="mailto:dorian.terb@gmail.com">Par mail</a></li>
				<li><a href="http://dwarves.iut-fbleau.fr/~terbah/contact.html">Depuis mon site</a></li>
			</ul>
		</div>
	</div>
	<center><h5 style="color: white;">Pensé et créé par Dorian Terbah - Année 2018 - Tous droits réservés</h5></center>
</footer>
</body>
</html>