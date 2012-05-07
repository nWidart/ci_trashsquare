<div class="container">
	<div class="row">
		<h2>Admin home page</h2>
		<p>Choissisez ce que vous voulez faire...</p><br />
		<?php echo anchor('Su/checkin', 'Checkin') . ' | ' . anchor('Su/add_user', 'Ajouter un compte') .' | ' . anchor('Su/user_list', 'Liste des utilisateurs');?>
	</div>
</div>