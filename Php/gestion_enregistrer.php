<?php 

require_once("etudiant_man.php");
require_once("attestation_man.php");
 

$conn = new PDO("mysql:host=sql4.freemysqlhosting.net;dbname=sql4448173", 'sql4448173', '8c9iP8zKix' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$maBDDEtu = new EtudiantManager($conn);
$maBDDAtt = new AttestationManager($conn);


$idEtu = $_POST['id'] ;
$idConv = $maBDDEtu->getIdConv($idEtu) ;
$message = $_POST['message'] ;


if($maBDDAtt->verif($idEtu))
{
	$maBDDAtt->add($idEtu,$idConv,$message) ;
	echo "Succès" ;
}

else
	echo "Déjà enregistré";


?>