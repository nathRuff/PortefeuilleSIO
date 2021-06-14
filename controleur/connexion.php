<?php
$login= $_POST['login'];//identifiant de connexion
$pass=md5($_POST['pass']);//mot de passe de connexion
$resultats=$connexion->query("SELECT * FROM etudiant WHERE nom=".$connexion->quote($login, PDO::PARAM_STR)." AND mdp=".$connexion->quote($pass, PDO::PARAM_STR).""); 



	if(isset($_POST['login']))
	{
		

		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		//on stock dans une variable de session le nombre de lignes que renvoie la requ?
		$login=$resultats->RowCount();

		
		if ($login > 0)//si la requete renvoie une ligne
		{
			$_SESSION['login']=$lignes->nom; //on stocke l'identifiant dans une variable de session (C'EST CETTE VARIABLE QUI, SI ELLE EST NON VIDE, SIGNIFIE QUE L'ON EST CONNECTE)
			$_SESSION['id']=$lignes->id;
			$_SESSION['annee'] = $lignes->AnneeExam;
			$_SESSION['prenomalzzke']=$lignes->prenom;
			$_SESSION['parcours']=$lignes->parcours;
			$_SESSION['professeur']=$lignes->professeur;
			echo "ici : ".$_SESSION['professeur'];
			
			//redirection vers la page index.php
			header("Location:index.php");
		}
		else //si la requete ne renvoie pas de ligne
		{
			//si erreur=true(mot de passe ou login incorrect alors on affiche un message d'erreur)
			echo"<script> alert ('Login ou Mot De Passe Incorrect !');</script>";
			// et redirection vers la page d'accueil
			print ("<script language = \"JavaScript\">");
			print ("location.href = 'index.php';");
			print ("</script>");
		} 
	}
	?>