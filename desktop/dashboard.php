		<div class="container">
			
			<img src="https://graph.facebook.com/<?= $fbid; ?>/picture">
			<strong><?= $fullname; ?></strong>
			
			<form action="index.php" method="post">
				
				<div class="row">
					Charity <select name="charity">
						<option value="0" <? if($_POST['charity'] == "" || $_POST['charity'] == 0 ) echo 'selected="selected"'; ?>>Select a Charity</option>
						<?
							$i = 0;
							while( $i < mysql_num_rows($query) )
							{
								echo '<option value="'.mysql_result($query, $i, "id").'"';
								if( $_POST['charity'] == mysql_result($query,$i,"id") ) {
									echo ' selected="selected"';
								}
								echo '>'.mysql_result($query, $i, "name").'</option>';
								$i++;
							}
						?>
					</select>
					<? if( isset($charityErr) ) : ?>
					<div class="error"><?= $charityErr; ?></div>
					<? endif; ?>
				</div>

				<div class="row">
					<label>Goal</label>
					<input type="text" name="goal" value="<?= $_POST['goal']; ?>">
					<? if( isset($goalErr) ) : ?>
					<div class="error"><?= $goalErr; ?></div>
					<? endif; ?>
				</div>

				<div class="row">
					<label>About</label>
					<textarea name="about" rows="3" cols="40"><?= $_POST['about']; ?></textarea>
					<? if( isset($aboutErr) ) : ?>
					<div class="error"><?= $aboutErr; ?></div>
					<? endif; ?>
				</div>

				<button type="submit">Save</button>
				
			</form>
		</div>
		
