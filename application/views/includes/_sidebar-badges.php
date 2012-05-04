<div class="threecol last">
		<h2>Badges reçus</h2>
		<?php
		if ( $user_score >= 1 ) { ?>
		<div class="grade first">
			<img src="<?php echo base_url(); ?>images/lvl2.png" alt="lvl1" />
			<p><span>Initié</span>
			Tu as utilisé une poubelle de recyclage.</p>
		</div>
		<?php } if ( $user_score > 2 ) { ?>
		<div class="grade">
			<img src="<?php echo base_url(); ?>images/lvl1.png" alt="lvl2" />
			<p><span>Débutant</span>
			Tu as jeté 2 déchets durant les heures de cours.</p>
		</div>
		<?php } if ( $user_score > 4 ) { ?>
		<div class="grade">
			<img src="<?php echo base_url(); ?>images/lvl3.png" alt="lvl3" />
			<p><span>Explorateur</span>
			Tu as jeté plus de 4 déchets au total.</p>
		</div>
		<?php } if ( $user_score > 8 ) { ?>
		<div class="grade">
			<img src="<?php echo base_url(); ?>images/lvl4.png" alt="lvl4" />
			<p><span>Aventurier</span>
			Tu as jeté plus de 8 déchets au total.</p>
		</div>
		<?php } if ( $user_score > 12 ) { ?>
		<div class="grade">
			<img src="<?php echo base_url(); ?>images/lvl5.png" alt="lvl5" />
			<p><span>Mr. Propre</span>
			Tu as jeté plus de 12 déchets au total.</p>
		</div>
		<?php } ?>
</div>