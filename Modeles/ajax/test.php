<?php
include '../accesBD.php';
$maBd = new accesBD();

$idSerie = $_POST['idSerie'];
$requete = "SELECT * FROM SAISON WHERE IDSERIE = ".$idSerie.";";
$lesSaisons = $maBd->getConn()->query($requete);
/*
var_dump($lesSaisons);
var_dump($idSerie);*/

$data = array();

if($lesSaisons)
	{

			while($donnees=$lesSaisons->fetch(PDO::FETCH_OBJ))
			{
				$data[$donnees->numSaison][] = $donnees->anneeSaison;
				$data[$donnees->numSaison][] = $donnees->nbrEpisodesPrevus;
			}
			$data['success'] = true;

	}
else
{
	$data['success'] = false;
}
// $data['message'] = $idSerie;



// renvoit un tableau dynamique encodé en json*/
echo json_encode($data);
?>
