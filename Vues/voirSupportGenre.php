<div class="centrePage">
<br><br>

	<?php 
	
	$leTabSupportIdGenre = $_SESSION['tabSupportsIdGenre'];
	$nbS = count($leTabSupportIdGenre);
	
	echo '<div align="center">
		<table style="color:white;">';
				$i=0;
				while($i<$nbS)
				{
					$j=$i;
					echo '<tr>';
					while($j<$i+3 && $j<$nbS)
					{
							echo '<td>
								<div class="overlay">
									<a href="index.php?vue=support&action=detailsSupport&IdSupport='.$leTabSupportIdGenre[$j][0].'">
										<img class="images" src="Images\\'.$leTabSupportIdGenre[$j][2].'">
										<div class="text-clear">
											<div class="text">'.$leTabSupportIdGenre[$j][3].'</div>
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