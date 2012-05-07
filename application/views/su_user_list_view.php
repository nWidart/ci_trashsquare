<div class="container">
	<div class="row liste_utilisateur">
		<div class="eightcol">
			<h2>Liste des utilisateurs</h2>
			<table>
				<tr>
					<th>id</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Classe</th>
					<th>Login</th>
					<th>Actions</th>
				</tr>
				<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->first_name; ?></td>
					<td><?php echo $user->last_name; ?></td>
					<td><?php echo $user->classe; ?></td>
					<td><?php echo $user->username; ?></td>
					<td>
						<?php echo anchor('Su/user_list/' . $user->id, 'Edit', 'attributs'); ?>
						<?php echo anchor('Su/delete_user/' . $user->id, 'x', 'id="del"'); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="fourcol last">
			<p>
				<?php echo ( isset($message) ) ? $message : ''; ?>
			</p>
			<?php if ($edit_user_form) : ?>
				<?php echo form_open('Su/user_list/' . $this->uri->segment(3)); ?>
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
					<?php echo form_dropdown('group', $options, $user_group); ?>
				</fieldset>
				<?php echo form_submit('submit', 'Envoyer'); ?>

				<?php echo form_close(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>