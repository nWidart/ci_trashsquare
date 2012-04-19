<div class="threecol">
<?php
	if ( isset($user) ) {
		if ( $user->nom == "" && $user->prenom == "" ) {
			echo '<span class="error_msg">Tu n\'as pas encore entrer ton nom et prenom. Entre <a href="param.php">ton nom et prenom ici.</a></span>';
		}
?>
		<h2 class="nom">
			<?php
			if ( !empty($user->prenom) && !empty($user->nom) ) {
				echo $user->prenom . " " . $user->nom;
			}
			?>
		</h2>

		<h3>
			<?php
			if ( !empty($user->classe) ) {
				echo $user->classe;
			}
			?>
		</h3>
	<ul class="profile_menu">
		<li class="param"><?php echo anchor('Admin/param', 'Paramètres'); ?></li>
		<li class="logout"><?php echo anchor('Admin/logout', 'Déconnection'); ?></li>
	</ul>
	<?php } ?>
</div>