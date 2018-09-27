<?php
include_once('Modeles/Metiers/support.php');

Class conteneurSupport
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesSupports;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		$this->lesSupports = new arrayObject();
		}
	
	//METHODE AJOUTANT UN Support------------------------------------------------------------------------------
	public function ajouteUnSupport($unIdSupport, $unTitreSupport, $unRealisateurSupport, $uneImageSupport, $leGenreSupport)
		{
		$unSupport = new support($unIdSupport, $unTitreSupport, $unRealisateurSupport, $uneImageSupport, $leGenreSupport);
		$this->lesSupports->append($unSupport);
			
		}
		
	//METHODE RETOURNANT LE NOMBRE de Support-------------------------------------------------------------------------------
	public function nbSupports()
		{
		return $this->lesSupports->count();
		}	
	//METHODE RETOURNANT LA LISTE DES  films-----------------------------------------------------------------------------------------
	public function listeDesSupports()
		{
		$liste = '';
		foreach ($this->lesSupports as $unSupport)
			{	$liste = $liste.'Support N° : "'.$unSupport->getIdSupport().' -> Titre : '.$unSupport->getTitreSupport().' - '.$unSupport->getLeGenreDeSupport()->getLibelleGenre().'><br>';
			}
		return $liste;
		}
	public function listeDesSupportsIdGenre($idGenre)
	{	
		$liste = '';
		foreach ($this->lesSupports as $unSupport)
			{	
				if($unSupport->getLeGenreDeSupport()->getIdGenre() == $idGenre){
					$liste = $liste.'Support N° : "'.$unSupport->getIdSupport().' -> Titre : '.$unSupport->getTitreSupport().' - '.$unSupport->getLeGenreDeSupport()->getLibelleGenre().'><br>';
				}
			}
		return $liste;
	}
				//METHODE RETOURNANT LA LISTE DES supports DANS UNE BALISE <SELECT>------------------------------------------------------------------
	public function lesSupportsAuFormatHTML()
		{
		$liste = "<SELECT name = 'idSupport'>";
		foreach ($this->lesSupports as $unSupport)
			{
			$liste = $liste."<OPTION value='".$unSupport->getIdSupport()."'>".$unSupport->getTitreSupport()."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}		
	
//METHODE RETOURNANT UN Support A PARTIR DE SON NUMERO--------------------------------------------	
	public function donneObjetSupportDepuisNumero($unIdSupport)
		{
		//initialisation d'un booléen (on part de l'hypothèse que le Support n'existe pas)
		$trouve=false;
		$leBonSupport=null;
		//création d'un itérateur sur la collection lesEmpruntsFilms
		$iSupport = $this->lesSupports->getIterator();
		//TQ on a pas trouvé le support et que l'on est pas arrivé au bout de la collection
		while ((!$trouve)&&($iSupport->valid()))
			{
			//SI le numéro du support courant correspond au numéro passé en paramètre
			if ($iSupport->current()->getIdSupport()==$unIdSupport)
				{
				//maj du booléen
				$trouve=true;
				//sauvegarde le Support courant
				$leBonSupport = $iSupport->current();
				
				}
			//SINON on passe au Support suivant
			else
				$iSupport->next();
			}
			return $leBonSupport;
		}
		
	public function getTabSupports()
		{
			$nbSupport=$this->lesSupports->count();
			$tab = array();
			$i=0;
			for($i;$i<$nbSupport;$i++)
				{
						$tab[$i][0]= $this->lesSupports[$i]->getIdSupport();
						$tab[$i][1]= $this->lesSupports[$i]->getTitreSupport();
						$tab[$i][2]= $this->lesSupports[$i]->getRealisateurSupport();
						$tab[$i][3]= $this->lesSupports[$i]->getImageSupport();
						$tab[$i][4]= $this->lesSupports[$i]->getLeGenreDeSupport()->getIdGenre();
					
				}
			return $tab;
		}
	
	public function getTabSupportsIdGenre($unIdGenre)
		{
			$nbSupport=$this->lesSupports->count();
			$tab = array();
			$i=0;
			foreach ($this->lesSupports as $unSupport)
			{
				if($unSupport->getLeGenreDeSupport()->getIdGenre() == $unIdGenre)
				{
					
						$tab[$i][0]= $unSupport->getIdSupport();
						$tab[$i][1]= $unSupport->getLeGenreDeSupport()->getIdGenre();
						$tab[$i][2]= $unSupport->getImageSupport();
						$tab[$i][3]= $unSupport->getTitreSupport();
						$tab[$i][4]= $unSupport->getRealisateurSupport();
						
						$i++;
				}
			}
			return $tab;
		}
	
	
	}
	
?> 