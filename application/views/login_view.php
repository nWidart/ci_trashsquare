<div class="container">
	<div class="row">
		<h1>Login</h1>

		<?php echo validation_errors(); ?>
		<?php echo form_open('Admin'); ?>

		<ul>
			<li><?php echo form_label('Login', 'login'); ?></li>
			<li><?php echo form_input('login', set_value('login'), 'id="input_login" placeholder="Entrez votre login..." autofocus'); ?></li>
			<li><?php echo form_label('Password', 'password'); ?></li>
			<li><?php echo form_password('password', '', 'id="input_password" placeholder="et mot de passe."'); ?></li>
		</ul>
		<p>
			<?php echo form_submit('submit', 'Login'); ?>
		</p>
		<?php echo form_close(); ?>

	</div>
</div>