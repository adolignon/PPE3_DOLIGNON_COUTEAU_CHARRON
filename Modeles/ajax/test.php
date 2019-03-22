<?php
include_once('Modeles/gestionVideo.php');

$gestionVideo = new gestionVideo();
$lesSaisons = $gestionVideo->getSaisons()->getSaisonsSerie();

$data = array();
$data['success'] = true;
$data['message'] = 'coucou';

// renvoit un tableau dynamique encodé en json*/
echo json_encode($data);
?>
