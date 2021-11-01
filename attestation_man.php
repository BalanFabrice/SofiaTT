<?php

require_once 'attestation.php';
class AttestationManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  //ajouter a la base de donnee a faire
  public function add($etudiant,$convention,$message)
  {
    $q = $this->_db->prepare('INSERT INTO attestation VALUES(:etudiant,:convention,:message)');

    $q->bindValue(':etudiant', $etudiant);
    $q->bindValue(':convention', $convention);
    $q->bindValue(':message', $message);
	
    return $q->execute();
  }

 

  //recuperer liste commentaire a partir nom film
  public function getListeCommentaire($Titre)
  {
    $comments = [];

    $q = $this->_db->query('SELECT * FROM commentaire WHERE Titre = "'. $Titre . '" ORDER BY DateNote desc');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($donnees);
    }

    return $comments;
  }
  
  //a tester 
   public function getNoteFilm($Titre)
  {
    $note = 0;
	$donnees = [] ;
	
    $q = $this->_db->query('SELECT avg(NoteUtilisateur) FROM commentaire WHERE Titre = "'. $Titre . '" ');

	$donnees = $q->fetch(PDO::FETCH_ASSOC) ;

	if(isset($donnees))
		$note = $donnees['avg(NoteUtilisateur)'] ; 

    return (double)$note;
  }

 

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}