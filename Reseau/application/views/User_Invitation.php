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
	<title>Invitation</title>
</head>
<body>
<nav>
	<span class="menu-mobile">Menu</span>
	<ul>

			<li><a href="<?php echo base_url('user/home');?>"> 🏠 Accueil</a></li>
			<li><a href="<?php echo base_url('user/profil');?>"> 👤 Mon profil</a></li>
			<li><a href="<?php echo base_url('user/invitation') ;?>" class="active"> ✉️ Envoyer une invitation </a></li>
			<li><a href="<?php echo base_url('user/my_invitations');?>"> 📩 Mes invitations </a></li>
			<li><a href="<?php echo base_url('user/deconnection');?>"> 🔓 Se deconnecter </a></li>

	</ul>
</nav>
<article>
	<?php if(isset($message)) echo '<center><h3>'.$message.'</h3></center>';?>
	<div grid>
		<div column="8 +2">
			<?php echo form_open('user/invitation');?>
				<fieldset>
					<legend>Rechercher un utilisateur</legend>
					<label>Utilisateur
						<input type="text" name="login">
					</label>
					<button class="-bordered -error">Envoyer</button>
				</fieldset>

			</form>
		</div>
	</div>
</article>
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