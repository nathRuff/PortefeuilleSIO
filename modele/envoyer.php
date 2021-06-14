<?php	
	$connexion->exec("INSERT INTO tache VALUES ('','".$intitule."','".$dated."','".$datef."','".$desc."','".$modalite."','".$lieu."','".$_SESSION['id']."','".$c1."','".$c2."','".$c3."','".$c4."')");
	
	$resultats=$connexion->query("SELECT MAX(id_tache) as max_id_tache FROM tache"); 
	$lignes=$resultats->fetch(PDO::FETCH_OBJ);
	
	$max_id_tache=$lignes->max_id_tache;
	
	$resultats=$connexion->query("SELECT * FROM domaine"); 
	//Ex&eacute;cution de la requête
	
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	while( $ligne = $resultats->fetch()) 
	{
		$id_domaine=$ligne->id_domaine;
		
		if(isset($_POST[$id_domaine]) && $_POST[$id_domaine] == "on")
		{
			
			$connexion->exec("INSERT INTO competence VALUES ('".$max_id_tache."','".$id_domaine."')");
		
		}
	
	}
	?>