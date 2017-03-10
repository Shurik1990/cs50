<div id="game_body">
	<form id="game_form">
		<?php
		for($row=0; $row<3; $row++)
		{
			?>
			<div class="row">
			<?php
			for($cell=0; $cell<3; $cell++)
			{
				?>
				<span class="cell <?php echo $area[$row][$cell]==1 ? 'user1' : ( $area[$row][$cell]==2 ? 'user2' : 'free' ) ?>" data-cell="<?php echo $cell; ?>" data-row="<?php echo $row; ?>">
					<?php echo $area[$row][$cell]; ?>
				</span>
				<?php
			}
			?>
			</div>
			<?php
		}
		?>

	</form>
	<div id="step_result"></div>
</div>

