<div class="container contenu">
	<div class="row">
		<?php echo form_open('Su/add_user'); ?>
		<fieldset>
			<?php echo form_label('Prénom', 'prenom'); ?>
			<?php echo form_input($first_name); ?>

			<?php echo form_label('Nom: ', 'nom'); ?>
			<?php echo form_input($last_name);?>

			<?php echo form_label('Classe: ', 'classe'); ?>
			<?php echo form_input($classe);?>

			<?php echo form_label('Email: ', 'email'); ?>
			<?php echo form_input($email);?>

			<?php echo form_label('Groupe: ', 'group'); ?>
			<?php echo form_dropdown('group', $options, 2); ?>
		</fieldset>
			<?php echo form_submit('submit', 'Envoyer'); ?>

		<?php echo form_close(); ?>
		<?php echo ( isset($message) ) ? $message : ''; ?>
	</div>
</div>