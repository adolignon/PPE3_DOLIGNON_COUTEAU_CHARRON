<div class="centrePage">
<br><br>

	<?php 
	
	$leSupport = $_SESSION['supportIdSupport'];
	$leTypeSupport = $_SESSION['typeSupport'];
	echo $leTypeSupport;
	echo '<table>
			<tr>
				<td>
					<div class="overlay" style="text-align:left;">
						<img class="images" src="Images\\'.$leSupport->getImageSupport().'">
					</div>
				</td>
				<td>
					<div class="textTitre">
						'.$leSupport->getTitreSupport().'
					</div>
					<br><br>
					<div class="textContenu">
						Réalisateur : '.$leSupport->getRealisateurSupport().'
					</div>
					<div class="textContenu">
						Durée :
					</div>
				</td>';
	
	// echo '<div align="center">
		// <table style="color:white;">';
				// $i=0;
				// while($i<$nbS)
				// {
					// $j=$i;
					// echo '<tr>';
					// while($j<$i+4 && $j<$nbS)
					// {
							// echo '<td>
								// <div class="overlay">
										// <img class="images" src="Images\\">
										// <div class="text-clear">
											// <div class="text">'.$leTabSupportIdGenre[$j][3].'</div>
										// </div>
								// </div>
							// </td>';
							// $j++;
						// }
				// echo '</tr>';
				// $i=$j;
				// }
			
	// echo '</table></div>';
	
	?>
	
</div>