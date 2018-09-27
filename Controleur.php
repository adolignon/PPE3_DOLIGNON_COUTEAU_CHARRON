<?php
//include du fichier GESTION pour les objets (Modeles)
include 'Modeles/gestionVideo.php';

//classe CONTROLEUR qui redirige vers les bonnes vues les bonnes informations
class Controleur
	{
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------ATTRIBUTS PRIVES-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private $maVideotheque;
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------CONSTRUCTEUR------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function __construct()
		{
		$this->maVideotheque = new gestionVideo();
		}
		
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------METHODE D'AFFICHAGE DE L'ENTETE-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function afficheEntete()
		{
		//appel de la vue de l'entête
		require 'Vues/entete.php';
		}
		
		
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	//---------------------------METHODE D'AFFICHAGE DU PIED DE PAGE------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function affichePiedPage()
		{
		//appel de la vue du pied de page
		require 'Vues/piedPage.php';
		}
		
		
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------METHODE D'AFFICHAGE DU MENU-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function afficheMenu()
		{
		//appel de la vue du menu
		require 'Vues/menu.php';
		}
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------METHODE D'AFFICHAGE DES VUES----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function affichePage($action,$vue)
		{
		//SELON la vue demandée
		switch ($vue)
			{
			case 'compte':
				$this->vueCompte($action);
				break;
			case 'film':
				$this->vueFilm($action);
				break;
			case 'serie':
				$this->vueSerie($action);
				break;
			case 'Videotheque':
				$this->vueRessource($action);
				break;
			case "accueil":
				session_destroy();
				break;
			}
		}
			
			
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------Mon Compte--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueCompte($action)
		{
			
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS visualisation de mes informations-------------------------------------------------------------------------------------------------
			case 'visualiser' :
				//ici il faut pouvoir avoir accès au information de l'internaute connecté
				require 'Vues/construction.php';
				break;
				
			//CAS enregistrement d'une modification sur le compte------------------------------------------------------------------------------
			case 'modifier' :
				// ici il faut pouvoir modifier le mot de passe de l'utilisateur
				require 'Vues/modifier.php';
				break;
			//CAS ajouter un utilisateur ------------------------------------------------------------------------------
			case 'nouveauLogin' :
				// ici il faut pouvoir recuperer un nouveau utilisateur
				$log = $_POST['login'];
				$resultat=$this->maVideotheque->verifExistLogin($log);
				if($resultat==1){
					require 'Vues/trouve.php';
				}
				else{
					$unIdClient = $this->maVideotheque->prochainClient();
					$unNomClient= $_POST['nomClient'];
					$unPrenomClient= $_POST['prenomClient'];
					$unEmailClient= $_POST['emailClient'];
					$uneDateNaissClient= $_POST['dateNaissClient'];
					$uneDateAbonnement= $_POST['dateAbonnementClient'];
					$login = $_POST['login'];
					$passwd = $_POST['password'];
					$this->maVideotheque->ajouteUnClient($unIdClient, $unNomClient, $unPrenomClient, $uneDateNaissClient, $unEmailClient, $login,$passwd,$uneDateAbonnement);
					require 'Vues/ajoutUtilisateur.php';
				}
				break;	
			//CAS verifier un utilisateur ------------------------------------------------------------------------------
			case 'verifLogin' :
				// ici il faut pouvoir vérifier un login un nouveau utilisateur
				//Je récupère les login et password saisi et je verifie leur existancerequire
				//pour cela je verifie dans le conteneurClient via la gestion.
				$unLogin=$_POST['login'];
				$unPassword=$_POST['password'];
				$resultat=$this->maVideotheque->verifLogin($unLogin, $unPassword);
						//si le client existe alors j'affiche le menu et la page visuGenre.php
						if($resultat==1)
						{
							
							if($this->maVideotheque->verifActif($unLogin,$unPassword)==1){
								require 'Vues/menu.php';
								echo $this->maVideotheque->listeLesGenres();
							}
							else{
								echo '<strong><p style="color:white">Votre chèque ne nous est pas encore parvenu. En attendant réception de celui-ci les vidéos vous sont innacessibles.</p></strong>';
								session_destroy();
							}
								
						}
						else
						{
							// destroy la session et je repars sur l'acceuil en affichant un texte pour prévenir la personne
							//des mauvais identifiants;
							session_destroy();
							echo "</nav>
									<div class='container h-100'>
										<div class='row h-100 justify-content-center align-items-center'>
											<span class='text-white'>Identifiants incorrects</span>
										</div>
									</div>
									<meta http-equiv='refresh' content='1;index.php'>";
						}
				break;	
				case 'modifMdp':
					require 'Vues/modifMdp.php';
					break;
				case 'nvMdp':
					$unMdp = $_POST['nvMdp'];
					$this->maVideotheque->updateMdp($unMdp,$_SESSION['login']);
					session_destroy();
					require 'Vues/okModifier.php';
					break;
					
				case "menu" : 
					if($this->maVideotheque->verifActif($_SESSION['login'],$_SESSION['password'])==1){
						require 'Vues/menu.php';
						echo $this->maVideotheque->listeLesGenres();
					}
					
					break;
			}
		}
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------Film--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueFilm($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS visualisation de tous les films-------------------------------------------------------------------------------------------------
			case "visualiser" :
				//ici il faut pouvoir visualiser l'ensemble des films 
				require 'Vues/construction.php';
				break;
				
			}
		}	

	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------Serie--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueSerie($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS visualisation de toutes les Series-------------------------------------------------------------------------------------------------
			case "visualiser" :
				//ici il faut pouvoir visualiser l'ensemble des Séries 
				require 'Vues/construction.php';
				break;
				
			}
		}			
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//----------------------------Vidéotheque-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	private function vueVideotheque($action)
		{
		//SELON l'action demandée
		switch ($action)
			{	
			
			//CAS Choix d'un genre------------------------------------------------------------------------------------------------
			case "choixGenre" :
				if ($this->maVideotheque->donneNbGenres()==0)
					{
					$message = "il n existe pas de genre";
					$lien = 'index.php?vue=ressource&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$_SESSION['lesRessources'] = $this->maMairie->listeLesRessources();
					require 'Vues/voirRessource.php';
					}
				break;
				
			//CAS enregistrement d'une ressource dans la base------------------------------------------------------------------------------
			case "enregistrer" :
				$nom = $_POST['nomRessource'];
				if (empty($nom))
					{
					$message = "Veuillez saisir les informations";
					$lien = 'index.php?vue=ressource&action=ajouter';
					$_SESSION['message'] = $message;
					$_SESSION['lien'] = $lien;
					require 'Vues/erreur.php';
					}
				else
					{
					$this->maMairie->ajouteUneressource($nom);
					require 'Vues/enregistrer.php';
					//$_SESSION['Controleur'] = serialize($this);
					}
				break;
			}
		}	

	}	
?>
