<body>
<section class=''>
<br><br>
<?php
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2']))
	{
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$mdp1=$_POST['mdp1'];
		$mdp2=$_POST['mdp2'];
		$parcours=$_POST['parcours'];
		$annee=$_POST['annee'];
				
		if($mdp1==$mdp2)
		{
			
			$connexion->exec("INSERT INTO etudiant VALUES ('','".$nom."','".$prenom."','".md5($mdp1)."','".$parcours."',0,".$annee.")");
			echo "Votre inscription à bien été prise en compte.<br><a href='index.php'>Retour</a>";
			
		}
		else
		{
			echo "Les mots de passes doivent être identiques !<br><a href='index.php'>Retour</a>";
		}
	}
	else
	{
		echo "Vous devez remplir tous les champs!<br><a href='index.php'>Retour</a>";
	}
?>
</section>
</body>