<span class="poubelle">Votre Score</span>
<?php
	if ( $user_score <= 10 ) {
		$bar_width = $user_score . "0";
	} else {
		$bar_width = "100";
	}

?>
<div class="ui-progress-bar ui-container" id="progress_bar">
	<div class="ui-progress" style="width: <?php echo $bar_width; ?>%;">
		<span class="ui-label">
			<b class="value"><?php echo $user_score; ?></b>
		</span>
	</div>
</div><!-- end progress bar -->