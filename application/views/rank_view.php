<div class="container">
	<div class="row">
		<?php echo (isset($user_sidebar)) ? $user_sidebar : '<div class="threecol"></div>'; ?>

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

						<?php $n++; ?>
					</tr>
				<?php } ?>
				</table>

			</div><!-- end #scores -->
		</div>
		<?php echo (isset($badges_sidebar)) ? $badges_sidebar : '<div class="threecol"></div>'; ?>
	</div>
</div>