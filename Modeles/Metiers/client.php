<?php

Class client
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $idClient;
	private $nomClient;
	private $prenomClient;
	private $dateNaissClient;
	private $emailClient;
	private $dateAbonnementClient;
	private $loginClient;
	private $pwdClient;
	private $estActifClient;
		
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct($unIdClient, $unNomClient, $unPrenomClient, $uneDateNaissClient, $unEmailClient, $uneDateAbonnement, $unLoginClient, $unPwdClient, $estActifClient)
		{
			$this->idClient = $unIdClient;
			$this->nomClient = $unNomClient;
			$this->prenomClient = $unPrenomClient;
			$this->dateNaissClient = $uneDateNaissClient;
			$this->emailClient = $unEmailClient;
			$this->dateAbonnementClient = $uneDateAbonnement;
			$this->loginClient = $unLoginClient;
			$this->pwdClient = $unPwdClient;
			$this->estActifClient = $estActifClient;
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
	public function getIdClient()
		{
		return $this->idClient;
		}
		
	public function getNomClient()
		{
		return $this->nomClient;
		}
	public function getPrenomClient()
		{
		return $this->prenomClient;
		}
	public function getEmailClient()
	{
		return $this->emailClient;
	}	
	public function getDateAbonnementClient()
	{
		return $this->dateAbonnementClient;
	}
	public function getLoginClient()
	{
		return $this->loginClient;
	}
	public function getPwdClient()
	{
		return $this->pwdClient;
	}
	
	public function getDateNaissClient(){
		return $this->dateNaissClient;
	}
	
	public function getEstActifClient(){
		return $this->estActifClient;
	}
	
	public function setPassword($unPassword){
		$this->pwdClient = $unPassword;
	}
	
	}
	
?>