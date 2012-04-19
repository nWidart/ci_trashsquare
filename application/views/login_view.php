<div class="container">
	<div class="row">
		<h1>Login</h1>

		<?php echo validation_errors(); ?>
		<?php echo form_open('Admin'); ?>
		<p>
			<?php
				echo form_label('Login', 'login');
				echo form_input('login', set_value('login'), 'id="login" autofocus');
			?>
		</p>
		<p>
			<?php
				echo form_label('Password', 'password');
				echo form_password('password', '', 'id="password"');
			?>
		</p>
		<p>
			<?php echo form_submit('submit', 'Login'); ?>
		</p>
		<?php echo form_close(); ?>
	</div>
</div>