<div class="centrePage">
<br><br>

	<?php 
	
	$leTypeSupport = $_SESSION['typeSupport'];
	$support = $_GET['IdSupport'];

	if($leTypeSupport == "F")
	{
		$leFilm = $_SESSION['infosFilm'];
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
		$laSerie = $_SESSION['infosSerie'];
		echo '<table>
			<tr>
				<td>
					<div class="overlay" style="text-align:left;">
						<img class="images" src="Images\\'.$laSerie->getUneImageDeLaSerie().'">
					</div>
				</td>
				<td>
					<div class="textTitre">
						'.$laSerie->getTitreSerie().'
					</div>
					<br><br>
					<div class="textContenu">
						Réalisateur : '.$laSerie->getRealisateurSerie().'
					</div>
					<br><br>
					<a class="menu-link" id="lesSaisons">Voir les saisons disponibles</a>
				</td>
			</tr>
		</table>';
	}
	?>
	
</div>

