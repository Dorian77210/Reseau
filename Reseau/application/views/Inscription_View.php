<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="https://cdn.concisecss.com/concise-ui/concise-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/CSS/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/menu.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/password.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/JS/randomLogin.js"></script>
	<title>Inscription</title>
</head>
<body>
<nav>
	<span class="menu-mobile">Menu</span>
	<ul>	
			<li><a href="<?php echo base_url('home');?>"> 🏠  Accueil</a></li>
			<li><a href="<?php echo base_url('connect/inscription');?>" class="active"> 🔓  Inscription</a></li>
			<li><a href="<?php echo base_url('connect/connection') ;?>"> 🔒  Connexion</a></li>
	</ul>
</nav>
<article>
	<?php //message d'erreur si le login existe deja
	
		if(isset($message)){

			echo '<h3 class="error">'.$message.'</h3>';
		}
	?>		
	<div grid class="corps">
		<div column="8 +2">

			<?php echo '<h5 class="error">'.validation_errors().'</h5>';?>
			<form action="inscription" method="POST" enctype="multipart/form-data">
			<fieldset> 
				<legend>Formulaire d'inscription</legend>
					<label>Nom
						<input type="text" name="lastname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Nom*" <?php if(isset($lastname)) echo 'value="'.$lastname.'"';?>>
					</label><br/>

					<label>Prenom
						<input type="text" name="firstname" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ\s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Prénom*" <?php if(isset($firstname)) echo 'value="'.$firstname.'"';?>>
					</label><br/>

					<label>Email
						<input type="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="example@gmail.com*" <?php if(isset($email)) echo 'value="'.$email.'"';?>>
					</label>

					<i>Aucune idée de login ? Cliquez <span class="random" style="cursor: pointer;">ici</span> pour générer un login aléatoire ! </i>
					<label>Login
						<input type="text" name="login" pattern="[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ' \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Login*" class="login">
					</label><br/>

					<label>Mot de passe
						<input type="password" name="password" pattern="[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ \s-]+" title="N'utilisez pas de caractères spéciaux" placeholder="Motdepasse*" class="password">
					</label>
					<span class="confirmation"></span>
					<div class="progress-bar -small" style="width: 35%; margin-top: 1%;">
  					<span class="progress" style="width: 0%;"></span>
					</div>

					<label>Confirmer votre mot de passe
						<input type="password" name="password_confirmation" placeholder="Confirmation*">
					</label>
					<button class="-bordered -error">S'inscrire</button>
				</fieldset>
				<?php echo form_close();?>
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
