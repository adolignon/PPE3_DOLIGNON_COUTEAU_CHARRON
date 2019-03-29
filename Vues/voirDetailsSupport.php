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
		$lesSaisons = json_encode($_SESSION['tabSaisons']);
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
		/*foreach($lesSaisons as $saison)
		{
			echo '<table>
				<thead>
				Saison '.$saison->getIdSaison().'
				</thead>
				<tbody>
					<tr>
						<td>
							Année :
						</td>
						<td>
							'.$saison->getAnneeSaison().'
						</td>
					</tr>
					<tr>
						<td>
							Nombre d\'épisodes :
						</td>
						<td>
							'.$saison->getNbrEpisodeSaison().'
						</td>
					</tr>
				</tbody>
		
			</table>';
		};*/
	}
	?>
	
</div>

<script type="text/javascript" charset="utf-8">
$( document ).ready(function() {
	
var idS = <?php  print $support; ?>;

$('#lesSaisons').click(function(){
	var x = $.ajax({
		url: "Modeles/ajax/test.php",
		timeout: 4000,
		dataType : "json",
		encode: true,
		type: "POST",
		data: {'idSerie' : idS},
		
	});
	x.done(function (data){
		if(data.success)
		{
			// Je charge les données dans box
			alert(idS);
		}
		else
		{
		alert('ko');
		}
		});
	x.fail(function(jqXHR, textStatus)
			{
			// traitement des erreurs ajax	
     			if (jqXHR.status === 0){alert("Not connect.n Verify Network.");}
    			else if (jqXHR.status == 404){alert("Requested page not found. [404]");}
				else if (jqXHR.status == 500){alert("Internal Server Error [500].");}
				else if (textStatus === "parsererror"){alert("Requested JSON parse failed.");}
				else if (textStatus === "timeout"){alert("Time out error.");}
				else if (textStatus === "abort"){alert("Ajax request aborted.");}
				else{alert("Uncaught Error.n" + jqXHR.responseText);}
			});

	})
});
</script>

