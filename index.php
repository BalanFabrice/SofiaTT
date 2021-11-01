<?php 
	require_once 'Php/attestation_man.php';
	require_once 'Php/convention_man.php';
	require_once 'Php/etudiant_man.php';
	
	$conn = new PDO("mysql:host=sql4.freemysqlhosting.net;dbname=sql4448173", 'sql4448173', '8c9iP8zKix' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$maBDDEtudiant = new EtudiantManager($conn);
	$listeEtudiant = $maBDDEtudiant->getListeEtudiant()  ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<title>Ajouter une attestation</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
   
<script src="index.js"></script>

</script>
</head>	
<body>
 
<div class="row m-5">

<form id="form_save" class="container" enctype="multipart/form-data" action="#" method="post">

<div class="form-group mb-5">
        <div class="text-center"> <h1> SOFTIA </h1></div>
      </div>
	  
<div class="form-row">
    
	<div class="form-group col-12">
      <label for="listeEtudiant">Etudiant</label>
 
    <select class="form-control" id="listeEtudiant" >
    <option value="-1"></option> 
  <?php 
	  foreach ($listeEtudiant as $etudiant)
	  {
		echo '<option value="'.$etudiant->getId().'">'.$etudiant->getNom().' '.$etudiant->getPrenom().' </option> ' ;
	  }
	?>
	  
    </select>
	</div>
    
	<div class="form-group col-12">
      <label for="convention">Convention</label>
      <input type="text" class="form-control" id="convention" name="convention" readonly required>
    </div>
    
	<div class="form-group col-12">
      <label for="message">Message</label>
      <textarea rows="10" class="form-control" id="message" name="message" required> </textarea> 
    </div>
</div>
 
<div class="col-md-12 text-center"> 
<button type="submit" name="valider" id="enregistrer" class="btn">Enregistrer attestation</button>
</div>
</form>

</div>

</body>
</html> 