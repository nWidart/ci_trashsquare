<div class="container">
	<div class="row">
		<h1>Login</h1>

		<?php echo $message;?>
		<?php echo form_open('auth/login'); ?>

		<ul>
			<li><?php echo form_label('Email/Username:', 'identity'); ?></li>
			<li><?php echo form_input($identity); ?></li>
			<li><?php echo form_label('Password', 'password'); ?></li>
			<li><?php echo form_password($password); ?></li>
		</ul>
		<p>
			<?php echo form_submit('submit', 'Login'); ?>
		</p>
		<?php echo form_close(); ?>

	</div>
</div>