<?php
include '../accesBD.php';
$maBd = new accesBD();
$idSerie = $_POST['idSerie'];

$lesSaisons = $maBd->getSaisons($idSerie);

$data = array();

// $data['success'] = true;
// $data['message'] = $idSerie;
var_dump($lesSaisons);

while($donnees=mysqli_fetch_array($lesSaisons))
{
	$data[$donnees["numSaison"]][] = $donnees["anneeSaison"];
}




// renvoit un tableau dynamique encodé en json*/
echo json_encode($data);
?>
