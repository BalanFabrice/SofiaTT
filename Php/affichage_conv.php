<?php
	require_once 'convention_man.php'; 
	require_once 'etudiant_man.php';
	
$conn = new PDO("mysql:host=sql4.freemysqlhosting.net;dbname=sql4448173", 'sql4448173', '8c9iP8zKix' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$maBDDConv = new ConventionManager($conn);
$maBDDEtu = new EtudiantManager($conn);

$id = $maBDDEtu->getIdConv($_POST['id']) ;

echo json_encode($maBDDConv->getConvention($id));
?>