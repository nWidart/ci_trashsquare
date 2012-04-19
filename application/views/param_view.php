<div class="container">
	<div class="row">
		<?php if(isset($user_sidebar)) echo $user_sidebar; ?>

		<div class="sixcol">
			<h2>Profil</h2>
			<div class="param">
				<?php echo ( !is_null($error_msg) ) ? $error_msg : ''; ?>
				<?php echo validation_errors(); ?>
				<?php echo form_open('Admin/param'); ?>
				<fieldset>
					<legend>Profil</legend>
					<?php echo form_label('Nom: ', 'nom'); ?>
					<?php echo form_input('nom', $user->nom, 'id="nom" alt="Nom" title="Entrez votre nom de famille"');?>
					<?php echo form_label('Prénom: ', 'prenom'); ?>
					<?php echo form_input('prenom', $user->prenom, 'id="prenom" alt="Prenom" title="Entrez votre prénom."');?>
					<?php echo form_label('Classe: ', 'classe'); ?>
					<?php echo form_input('classe', $user->classe, 'id="classe" alt="Classe" title="Entrez votre Classe"');?>
				</fieldset>
				<fieldset>
					<legend>Champs fixes</legend>
					<?php echo form_label('Login: ', 'login'); ?>
					<?php echo form_input('login', $user->login, 'id="login" alt="Login" disabled');?>
					<?php echo form_label('Mot de passe: ', 'password'); ?>
					<?php echo form_input('password', $user->password, 'id="password" alt="Mot de passe" disabled');?>
				</fieldset>
				<fieldset>
					<legend>Votre score!</legend>
				</fieldset>
				<?php echo form_submit('submit', 'Mettre à jour'); ?>

				<?php form_close(); ?>
			</div>
		</div>
		<?php if(isset($badges_sidebar)) echo $badges_sidebar; ?>
	</div>
</div>