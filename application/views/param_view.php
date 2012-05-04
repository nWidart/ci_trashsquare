<div class="container">
	<div class="row">
		<?php if(isset($user_sidebar)) echo $user_sidebar; ?>

		<div class="sixcol">
			<h2>Profil</h2>
			<div class="param">
				<?php echo ( !is_null($message) ) ? $message : ''; ?>
				<?php echo form_open('Site/param'); ?>
				<fieldset>
					<legend>Profil</legend>
					<!-- Last name -->
					<?php echo form_label('Nom: ', 'last_name'); ?>
					<?php echo form_input($last_name);?>
					<!-- First name -->
					<?php echo form_label('Prénom: ', 'first_name'); ?>
					<?php echo form_input($first_name);?>
					<!-- Classe name -->
					<?php echo form_label('Classe: ', 'classe'); ?>
					<?php echo form_input($classe);?>
					<!-- Email name -->
				</fieldset>
				<fieldset>
					<legend>Champs fixes</legend>
					<?php echo form_label('Login: ', 'username'); ?>
					<?php echo form_input($username);?>
					<?php echo form_label('Mot de passe: ', 'password'); ?>
					<?php //echo form_input('password', $user->password, 'id="password" alt="Mot de passe" disabled');?>
				</fieldset>
				<fieldset>
					<legend>Votre score!</legend>
					<p>Vous avez jeté <?php echo $user_score; ?> déchets. Vous etes : <span><?php echo get_user_rank($user_score); ?> </span>!</p>
				</fieldset>
				<?php echo form_submit('submit', 'Mettre à jour'); ?>

				<?php form_close(); ?>
			</div>
		</div>
		<?php if(isset($badges_sidebar)) echo $badges_sidebar; ?>
	</div>
</div>