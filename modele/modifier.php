<?php
$connexion->exec("UPDATE tache SET intitule='".$intitule."', date_debut='".$dated."', date_fin='".$datef."', description='".$desc."', modalite='".$modalite."', lieu='".$lieu."', c1='".$c1."', c2='".$c2."', c3='".$c3."', c4='".$c4."' WHERE id_tache='".$id_tache."'");
	$connexion->exec("DELETE from competence WHERE id_tache='".$id_tache."'");
	$resultats=$connexion->query("SELECT * FROM domaine"); 
	//Ex&eacute;cution de la requ?
	
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	while( $ligne = $resultats->fetch()) 
	{
		$id_domaine=$ligne->id_domaine;
		
		if(isset($_POST[$id_domaine]) && $_POST[$id_domaine] == "on")
		{
			
			$connexion->exec("INSERT INTO competence VALUES ('".$id_tache."','".$id_domaine."')");
		
		}

	}
?>