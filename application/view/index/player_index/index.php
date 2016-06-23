<div class="container">
	<?php $this->renderFeedbackMessages(); ?>
	<div class="player-sview">
		<h1>All players are listed here</h1>
		<table>
			<tr>
				<td>Voornaam</td>
				<td>Achternaam</td>
				<td>Positie</td>
				<td>Tweede positie</td>
			</tr>
		<?php foreach ($this->players as $player) { ?>
			<tr>
				<td><?=$player->firstname;?></td>
				<td><?=$player->lastname;?></td>
				<td><?=$player->position;?></td>
				<td><?=$player->Second_position;?></td>
			</tr>
		<?php } ?>


		</table>
	</div>
</div>