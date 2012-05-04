<div class="threecol">
<?php
	if ( isset($the_user) ) {
		if ( $the_user->first_name == "" && $the_user->last_name == "" ) {
			echo '<span class="error_msg">Tu n\'as pas encore entrer ton nom et prenom. Entre <a href="param.php">ton nom et prenom ici.</a></span>';
		}
?>
		<h2 class="nom">
			<?php
			if ( !empty($the_user->last_name) && !empty($the_user->first_name) ) {
				echo $the_user->last_name . " " . $the_user->first_name;
			}
			?>
		</h2>

		<h3>
			<?php
			if ( !empty($the_user->classe) ) {
				echo $the_user->classe;
			}
			?>
		</h3>
	<ul class="profile_menu">
		<li class="param"><?php echo anchor('Site/param', 'Paramètres'); ?></li>
		<li class="logout"><?php echo anchor('auth/logout', 'Déconnection'); ?></li>
	</ul>
	<?php } ?>
</div>