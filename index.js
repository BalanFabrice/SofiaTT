$(document).ready(function(){

$('select').on('change', function() {
	if(this.value != -1)
	{
		$.ajax({		
			url : "Php/affichage_conv.php",
			type : "POST",
			data : {id : this.value},
			dataType : "json",
			success: function( data) 
			{
				if(data)
				{			
					$('#convention').val(data.nom);
					$('#message').val(
						"Bonjour " + $("select option:selected").text() + "," +
						"\r\n \r\n" +
						"Vous avez suivi "+data.nbHeur+"h de formation chez FormationPlus. \r\n" +
						"Pouvez-vous nous retourner ce mail avec la pièce jointe signée."+
						"\r\n \r\n"+
						"Cordialement,\r\n"+
						"FormationPlus" 
						); 
					}
				}
			});
	}

	else
	{
		$('#convention').val(" ");
		$('#message').val(" ");
	}

});

 $('#form_save').submit(function()
 {
	if($('select').val() != -1 )
	{
		$.ajax(
		{
			url: "Php/gestion_enregistrer.php",
			data: {id: $("#listeEtudiant").val(), message : $('#message').val() },
			type: "POST",
			success : function(data){
					alert(data);			
				} 
			}); 	
		}
	
	else 
		alert("Aucun étudiant sélectionné");

		return false ;  
 }) ;
}); 
