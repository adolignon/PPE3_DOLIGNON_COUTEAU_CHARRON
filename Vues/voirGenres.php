<div class="centrePage">
<br><br>

	<?php 

	$tabG = $_SESSION['tabGenre'];
	$nbG = $_SESSION['nbGenres'];
	echo '<div align="center">
			<table style="color:white;">';
				$i=0;
				while($i<$nbG)
				{
					$j=$i;
					echo '<tr>';
					while($j<$i+3 && $j<$nbG)
					{
						echo '<td>
									<div class="overlay">
									<a href="index.php?vue=genre&action=choixGenre&IdGenre='.$tabG[$j][0].'">
											<img class="images" src="Images\Genres\\'.$tabG[$j][0].'.png">
											<div class="text-clear">
												<div class="text">'.$tabG[$j][1].'</div>
											</div>
										</a>
									</div>
									
							</td>';
						$j++;
					}
					
					echo '</tr>';
					$i=$j;
					
				}
				
			echo '</table></div>';
	?>

	
</div>