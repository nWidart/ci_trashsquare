<div class="container contenu">
	<div class="row">
		<?php echo ( isset($message) ) ? $message : ''; ?>
		<?php echo form_open('Su/checkin', 'classe="check"'); ?>

			<?php echo form_label('Poubelle', 'poubelle'); ?>

			<?php //echo form_dropdown('poubelle', $options); ?>
			<?php $this->firephp->log($this->data['options']); ?>

			<?php echo form_label('Utilisateur: ', 'username'); ?>
			<?php echo form_input($username);?>

			<?php echo form_label('Mot de passe: ', 'password'); ?>
			<?php echo form_input($password); ?>

			<?php echo form_submit('submit', 'Envoyer'); ?>

		<?php echo form_close(); ?>
	</div>
</div>