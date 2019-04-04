<?php
include '../accesBD.php';
$maBd = new accesBD();

$idSerie = $_POST['idSerie'];
$idSaison = $_POST['idSaison'];

$requete = "SELECT * FROM EPISODE WHERE IDSERIE = ".$idSerie." AND NUMSAISON = ".$idSaison.";";
$lesEpisodes = $maBd->getConn()->query($requete);

$data = array();

if($lesEpisodes)
	{

			while($donnees=$lesEpisodes->fetch(PDO::FETCH_OBJ))
			{

				$data[$donnees->numEpisode][] = $donnees->titreEpisode;
				$data[$donnees->numEpisode][] = $donnees->duree;
			}
			$data['success'] = true;

	}
else
{
	$data['success'] = false;
}

// renvoit un tableau dynamique encodé en json*/
echo json_encode($data);
?>
