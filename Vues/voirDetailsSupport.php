<div class="centrePage">
<br><br>

	<?php 
	
	// $leSupport = $_SESSION['supportIdSupport'];
	$leTypeSupport = $_SESSION['typeSupport'];
	$leFilm = $_SESSION['infosFilm'];
	// $leTypeSupport2 = $_SESSION['typeSupport2'];

	if($leTypeSupport == "F")
	{
		echo '<table>
			<tr>
				<td>
					<div class="overlay" style="text-align:left;">
						<img class="images" src="Images\\'.$leFilm->getImageFilm().'">
					</div>
				</td>
				<td>
					<div class="textTitre">
						'.$leFilm->getTitreFilm().'
					</div>
					<br><br>
					<div class="textContenu">
						Réalisateur : '.$leFilm->getRealisateurFilm().'
					</div>
					<div class="textContenu">
						Durée : '.$leFilm->getDureeFilm().'
					</div>
				</td>
			</tr>
		</table>';
	}
	else
	{
		
	}
	?>
	
</div>