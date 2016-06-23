<div class="container">
	<?php $this->renderFeedbackMessages(); ?>
	<h3>Spelers toevoegen</h3>
        <p>
            Voeg nieuwe spelers toe
        </p>
        <p>
            <form method="post" action="<?php echo Config::get('URL');?>player/create">
                <label>Voornaam Speler: </label><input type="text" name="Player_name"/></br>
                <label>Achternaam Speler: </label><input type="text" name="Player_surame"/>
                </br>
                <input type="submit" value='Voeg speler toe' autocomplete="off" />
            </form>
        </p>
	<div class="player-view">
		<h1>All players are listed here</h1>
		<table>
			<tr>
				<td>Voornaam</td>
				<td>Achternaam</td>
			</tr>
		<?php if ($this->players) { ?>
			<?php foreach ($this->players as $key => $value) { ?>
				<tr>
					<td><?php echo $value->player_name;?></td>
					<td><?php echo $value->player_surname;?></td>
					<td><a href="<?= Config::get('URL') . 'player/edit/' . $value->player_id; ?>">Edit</a></td>
				</tr>
			<?php } 
		} else { 
			echo "No players yet, please add some."; 
		} ?>


		</table>
	</div>
</div>