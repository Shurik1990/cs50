<ul id="games">
	<?php
	foreach($games as $game)
	{
	?>
		<li>
			<a href="/?user=2&game_id=<?php echo $game['id']; ?>" title="Присоединиться к игре">#<?php echo $game['id']; ?></a>
		</li>
	<?php
	}
	?>
</ul>