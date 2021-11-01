<?php

class Convention
{
	private $Id	;
	private $Nom ;    		 
	private $NbHeur ;	 
	
	public function __construct(array $donnee)
	{
		$this->hydrate($donnee);
	}
	
	public function getId()
	{
		return $this->Id;
	}

	public function getNom()	
	{
		return $this->Nom;
	}
	public function getNbHeur()	
	{
		return $this->NbHeur;
	}
	
	public function setId($donnee)
	{
		$this->Id = $donnee ;
	}
	public function setNom($donnee)
	{
		$this->Nom = $donnee ;
	} 
	
	public function setNbHeur($donnee)
	{
		$this->NbHeur = $donnee ;
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