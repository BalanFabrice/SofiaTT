<?php

require_once 'etudiant.php';
class EtudiantManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function getListeEtudiant()
  {
    $etudiants = [];

    $q = $this->_db->query('SELECT * FROM etudiant');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $etudiants[] = new Etudiant($donnees);
    }

    return $etudiants;
  }
  
  public function getIdConv($id)
  {
    
    $q = $this->_db->query('SELECT idConvention FROM etudiant where idEtudiant = "'.$id.'"');

    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
    return $donnees["idConvention"];
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}