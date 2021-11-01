<?php

require_once 'attestation.php';
class AttestationManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add($etudiant,$convention,$message)
  {
    $q = $this->_db->prepare('INSERT INTO attestation(idEtudiant,idConvention,message) VALUES(:etudiant,:convention,:message)');

    $q->bindValue(':etudiant', $etudiant);
    $q->bindValue(':convention', $convention);
    $q->bindValue(':message', $message);
	
    return $q->execute();
  }

  public function verif($id)
  {
    $q = $this->_db->query('SELECT * FROM attestation WHERE idEtudiant = "'. $id . '"');
	$i = 0 ;

    while ($q->fetch(PDO::FETCH_ASSOC))
    {
       $i = 1 ;
	   break ;
    }

    return ($i == 0) ;
  }
  
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}