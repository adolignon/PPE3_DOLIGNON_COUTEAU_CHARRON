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
					while($j<$i+4 && $j<$nbG)
					{
						echo '<td>
									<div class="overlay">
									<a href="index.php?login='.$_SESSION['login'].'&password='.$_SESSION['password'].'&vue=genre&action=choixGenre&IdGenre='.$tabG[$j][0].'">
											<img class="images" src="Images\\'.$tabG[$j][0].'.jpg">
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