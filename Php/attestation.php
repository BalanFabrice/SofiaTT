<?php

class Attestation
{
	private $Id	;
	private $Etudiant ;    		 
	private $Message ; 
	private $Convention ;
	
	public function __construct(array $donnee)
	{
		$this->hydrate($donnee);
	}
	
	public function getId()
	{
		return $this->Id;
	}

	public function getEtudiant()	
	{
		return $this->Etudiant;
	}
	public function getMessage()	
	{
		return $this->Message;
	}

	public function getConvention()	
	{
		return $this->Convention;
	}
	
	public function setId($donnee)
	{
		$this->Id = $donnee ;
	}
	public function setEtudiant($donnee)
	{
		$this->Etudiant = $donnee ;
	} 
	
	public function setMessage($donnee)
	{
		$this->Message = $donnee ;
	}	 
	
	public function setConvention($donnee)
	{
		$this->Convention = $donnee ;
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