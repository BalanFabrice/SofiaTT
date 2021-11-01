<?php

require_once 'convention.php';
class ConventionManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function getListeConvention()
  {
    $conv = [];

    $q = $this->_db->query('SELECT * FROM convention');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $conv[] = new Convention($donnees);
    }

    return $conv;
  }
  
  public function getConvention($id)
  {
	$q = $this->_db->query('SELECT nom, nbHeur FROM convention WHERE IdConvention = "'. $id . '" ');
	$donnees = $q->fetch(PDO::FETCH_ASSOC) ;
	return $donnees;
  }


  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}