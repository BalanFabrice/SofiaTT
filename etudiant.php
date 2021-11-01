<?php

class Etudiant
{
	private $IdEtudiant	;
	private $Nom ;    		 
	private $Prenom ;		 
	private $Mail ;
	private $IdConvention ;
	
	public function __construct(array $donnee)
	{
		$this->hydrate($donnee);
	}
	
	public function getId()
	{
		return $this->IdEtudiant;
	}

	public function getNom()	
	{
		return $this->Nom;
	}
	public function getPrenom()	
	{
		return $this->Prenom;
	}
	
	public function getMail()	
	{
		return $this->Mail;
	}

	public function getIdConvention()	
{
		return $this->IdConvention;
	}
	
	public function setIdEtudiant($donnee)
	{
		$this->IdEtudiant = $donnee ;
	}
	public function setNom($donnee)
	{
		$this->Nom = $donnee ;
	} 
	
	public function setPrenom($donnee)
	{
		$this->Prenom = $donnee ;
	}	 
	
	public function setMail($donnee)
	{
		$this->Mail = $donnee ;
	}
	
	public function setIdConvention($donnee)
	{
		$this->IdConvention = $donnee ;
	}

public function hydrate(array $donnees)
	{
			
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
				   
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
}
?>