<div class="container">
	<div class="row">
		<div class="threecol"></div>
		<div class="sixcol last">
			<h2>Classement général</h2>
			<div class="scores">
				<table>
					<tr>
						<th><img src="<?php echo base_url(); ?>images/icn_trash.png" alt="Trash" /></th>
						<th><img src="<?php echo base_url(); ?>images/icn_badge.png" alt="Badge" /></th>
						<th><img src="<?php echo base_url(); ?>images/icn_stat.png" alt="Stat" /></th>
					</tr>
				<?php $n = 1; ?>
				<?php foreach ($global_rank as $row) { ?>
					<tr>
						<td><?php echo $n; ?></td>
						<?php if ( $row->last_name == "" || $row->first_name == "")  {  ?>
							<td>N/A</td>
						<?php } else { ?>
							<td><?php echo $row->last_name . " " . substr($row->first_name,0,1) . "." ; ?></td>
						<?php } ?>
						<td><?php echo $row->count; ?></td>
						<td><?php echo $row->classe; ?></td>

						<?php if ($n == $the_user->id) : ?>
						<td>
							<a href="https://twitter.com/share" class="twitter-share-button" data-text="I scored <?php echo $user_score; ?> on trashsquare! I'm <?php echo get_user_rank($user_score); ?>!" data-via="trashsquare" data-hashtags="trashsquare">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</td>
					<?php endif; ?>
						<?php $n++; ?>
					</tr>
				<?php } ?>
				</table>

			</div><!-- end #scores -->
		</div>
	</div>
</div>