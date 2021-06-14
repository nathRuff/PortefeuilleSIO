<?php
if(isset($_GET['deconnexion']))
{
	include('controleur/deconnexion.php');
}

if(isset($_POST['connexion']))
{
	include('controleur/connexion.php');
}

if(!(isset($_SESSION['login'])))
{
	print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
}
function dateTime($date)
{
  list($day, $month, $year) = explode('/', $date);
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  return $timestamp;
}
	
if(isset($_POST['envoyer']))
{
	include('controleur/envoyer.php');
	print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
}

if(isset($_POST['modifier']))
{
	include('controleur/modifier.php');
	print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
}

if(isset($_GET['suppr']))
{
	include('controleur/suppr.php');
print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
}
else
{
?>
<body>
<section class=''><br><br>
	<?php
	if($_SESSION['professeur']==1)
	{
		if(isset($_GET['suppruser']))
		{
			if(isset($_GET['v']) && $_GET['v'] == 'ok')
			{
				$id_tache = $_GET['suppruser'];
				$connexion->exec("DELETE from etudiant WHERE id=".$id_tache);
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'index.php';");
				print ("</script>");
			}	
			else
			{
				echo "<br><br>Êtes vous sur de vouloir supprimer cet étudiant?<br><a href='?suppruser=".$_GET['suppruser']."&v=ok'>Oui</a> - <a href='?page=on'>Non</a>";
				echo "</section>";
				echo "<section class=''><br><br>";
			}
		}
		if(isset($_GET['adddroit']))
		{
			if(isset($_GET['v']) && $_GET['v'] == 'ok')
			{
				$id_tache = $_GET['adddroit'];
				$connexion->exec("Update etudiant set professeur = 1 WHERE id=".$id_tache);
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'index.php';");
				print ("</script>");
			}	
			else
			{
				echo "<br><br>Êtes vous sur de vouloir donner des droits à cet utilisateur?<br><a href='?adddroit=".$_GET['adddroit']."&v=ok'>Oui</a> - <a href='?page=on'>Non</a>";
				echo "</section>";
				echo "<section class=''><br><br>";
			}
		}
		if(isset($_GET['supprdroit']))
		{
			if(isset($_GET['v']) && $_GET['v'] == 'ok')
			{
				$id_tache = $_GET['supprdroit'];
				$connexion->exec("Update etudiant set professeur = 0 WHERE id=".$id_tache);
				print ("<script language = \"JavaScript\">");
				print ("location.href = 'index.php';");
				print ("</script>");
			}	
			else
			{
				echo "<br><br>Êtes vous sur de vouloir retirer les droits de cet utilisateur?<br><a href='?supprdroit=".$_GET['supprdroit']."&v=ok'>Oui</a> - <a href='?page=on'>Non</a>";
				echo "</section>";
				echo "<section class=''><br><br>";
			}
		}
		if(isset($_GET['option']))
		{
			if(isset($_POST['modifierza']))
			{
				$id_tache = $_GET['option'];
				if(!(empty($_POST['mdp1'])) && !(empty($_POST['mdp2'])))
				{
					if($_POST['mdp1'] == $_POST['mdp2'])
					{
						$mdp = md5($_POST['mdp1']);
						$connexion->exec("Update etudiant set mdp = '".$mdp."' WHERE id=".$id_tache);
print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
					}
					else
					{
						echo"<script> alert ('Les mots de passe ne sont pas identiques!');</script>";
						print ("<script language = \"JavaScript\">");
						print ("location.href = '?option=".$_GET['option'].";");
						print ("</script>");
					}
				}
				if(!(empty($_POST['nom'])) && !(empty($_POST['prenom'])))
				{
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$annee = $_POST['annee'];
					$parcours = $_POST['parcours'];
					$connexion->exec("Update etudiant set nom = '".$nom."', prenom = '".$prenom."', AnneeExam = ".$annee.", parcours = '".$parcours."' WHERE id=".$id_tache);
print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
				}
				else
				{
					echo"<script> alert ('Nom et prénom sont à indiquer!');</script>";
					print ("<script language = \"JavaScript\">");
					print ("location.href = '?option=".$_GET['option'].";");
					print ("</script>");
				}
			}
			else
			{
				$id_tache = $_GET['option'];
				$req = $connexion->query("select * from etudiant WHERE id=".$id_tache);
				$lignes=$req->fetch(PDO::FETCH_OBJ);
				$annee = $lignes->AnneeExam;
				$spec = $lignes->parcours;
				$nom = $lignes->nom;
				$prenom = $lignes->prenom;
				?>
				<form method="POST" action="?option=<?php echo $id_tache; ?>">
					<table>			
						<tr><td><p><label for="name">Nom</label></p></td><td><p><label for="name">Prénom</label></p></td></tr>
						<tr><td><input type="text" name="nom" value="<?php echo $nom; ?>" required/></td><td><input type="text" value=<?php echo $prenom; ?> name="prenom" placeholder='Prénom' required/></td></tr>
						<tr><td><p><label for="name">Mot de passe</label></p></td><td><p><label for="name">Confirmation du mot de passe</label></p></td></tr>
						<tr><td><input type="password" name="mdp1" placeholder='********'/></td><td><input type="password" name="mdp2" placeholder='********'/></td></tr>
						<tr><td><p><label for="name">Année d'examen</label></p></td><td><select name="annee"><?php $datea = date('Y', time()); $dat = $datea+2; while($datea <= $dat) { ?> <option value="<?php echo $datea; ?>" <?php if($annee == $datea) { echo 'selected=selected'; } ?>><?php echo $datea; ?></option> <?php $datea++; } ?></select></td></tr>
						<tr><td><p><label for="name">Parcours</label></p></td><td><select name="parcours">
						<option value="SISR" <?php if($spec == "SISR") { echo 'selected=selected'; } ?>>SISR</option>
						<option value="SLAM" <?php if($spec == "SLAM") { echo 'selected=selected'; } ?>>SLAM</option>
						</select></td></tr>
						<tr><td align="center"></td><td align="center"><input type="submit" name="modifierza" value="Modifier"/></td></tr>
					</table>
				</form>
				<?php
				echo "</section><section class=''><br><br>";
			}
		}?>
			<form method='get' action=''>
				<select name="spe"><option value="0">Choisir spécialité</option><option value="SISR">SISR</option><option value="SLAM">SLAM</option><option value="Prof">Professeur</option></select> - 
				<select name="anneex"><option value="0">Choisir année d'examen</option><?php $datea = 2013; $dat = date('Y', time())+2; while($datea <= $dat) { echo "<option value=".$datea.">".$datea."</option>"; $datea++; } ?></select>
				<input type='submit' value='Filtrer'/>
			</form>
			<br>
		<?php
	}
	else
	{
		if(isset($_GET['sdfoption']))
		{
			if(isset($_POST['modifierxcza']))
			{
				if(!(empty($_POST['mdp1'])) && !(empty($_POST['mdp2'])))
				{
					if($_POST['mdp1'] == $_POST['mdp2'])
					{
						$mdp = md5($_POST['mdp1']);
						$connexion->exec("Update etudiant set mdp = '".$mdp."' WHERE id=".$_SESSION['id']);
print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
					}
					else
					{
						echo"<script> alert ('Les mots de passe ne sont pas identiques!');</script>";
						print ("<script language = \"JavaScript\">");
						print ("location.href = '?sdfoption=".$_GET['option'].";");
						print ("</script>");
					}
				}
				if(!(empty($_POST['nom'])) && !(empty($_POST['prenom'])))
				{
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$annee = $_POST['annee'];
					$parcours = $_POST['parcours'];
					$connexion->exec("Update etudiant set nom = '".$nom."', prenom = '".$prenom."', AnneeExam = ".$annee.", parcours = '".$parcours."' WHERE id=".$_SESSION['id']);
print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
				}
				else
				{
					echo"<script> alert ('Nom et prénom sont à indiquer!');</script>";
					print ("<script language = \"JavaScript\">");
					print ("location.href = '?option=".$_GET['option'].";");
					print ("</script>");
				}
			}
			else
			{
				$req = $connexion->query("select * from etudiant WHERE id=".$_SESSION['id']);
				$lignes=$req->fetch(PDO::FETCH_OBJ);
				$annee = $lignes->AnneeExam;
				$spec = $lignes->parcours;
				$nom = $lignes->nom;
				$prenom = $lignes->prenom;
				?>
				<a href='index.php'>Retour</a>
				<form method="POST" action="?sdfoption=<?php echo $_SESSION['id']; ?>">
					<table>			
						<tr><td><p><label for="name">Nom</label></p></td><td><p><label for="name">Prénom</label></p></td></tr>
						<tr><td><input type="text" name="nom" value="<?php echo $nom; ?>" required/></td><td><input type="text" value=<?php echo $prenom; ?> name="prenom" placeholder='Prénom' required/></td></tr>
						<tr><td><p><label for="name">Mot de passe</label></p></td><td><p><label for="name">Confirmation du mot de passe</label></p></td></tr>
						<tr><td><input type="password" name="mdp1" placeholder='********'/></td><td><input type="password" name="mdp2" placeholder='********'/></td></tr>
						<tr><td><p><label for="name">Année d'examen</label></p></td><td><select name="annee"><?php $datea = date('Y', time()); $dat = $datea+2; while($datea <= $dat) { ?> <option value="<?php echo $datea; ?>" <?php if($annee == $datea) { echo 'selected=selected'; } ?>><?php echo $datea; ?></option> <?php $datea++; } ?></select></td></tr>
						<tr><td><p><label for="name">Parcours</label></p></td><td><select name="parcours">
						<option value="SISR" <?php if($spec == "SISR") { echo 'selected=selected'; } ?>>SISR</option>
						<option value="SLAM" <?php if($spec == "SLAM") { echo 'selected=selected'; } ?>>SLAM</option>
						</select></td></tr>
						<tr><td align="center"></td><td align="center"><input type="submit" name="modifierxcza" value="Modifier"/></td></tr>
					</table>
				</form>
				<?php
				echo "</section><section class=''><br><br>";
			}
		} ?><br><br>
	<a href="?page=new_tache"><img src="vue/images/ajouter.png" width="23px" border="0"/> Ajouter une tâche</a>
	<?php
		$resultats=$connexion->query("SELECT * FROM tache where id_etudiant='".$_SESSION['id']."'");
	
		//Ex&eacute;cution de la requ?
		if($resultats->RowCount() > 0)
		{
			echo "<a href='portefeuille.php'><img src='vue/images/pdf.png' width='23px' border='0'/> Générer le portefeuille de compétences au format pdf</a>";
		}
	?>
	
	<?php
	}
	?>
	<br>
	
	<?php
	
	if($_SESSION['professeur']==1)
	{
		if(isset($_GET['spe']) and $_GET['spe'] == "Prof")
		{
			$resultats=$connexion->query('SELECT * FROM etudiant where professeur = 1 and id <> '.$_SESSION['id'].'');
			$ret = "Liste des professeurs";
		}
		else if(isset($_GET['spe']) and $_GET['spe'] != "0" and $_GET['anneex'] == "0")
		{
			$resultats=$connexion->query('SELECT * FROM etudiant where professeur<>1 and parcours = "'.$_GET['spe'].'"');
			$ret = "Liste des élèves en ".$_GET['spe'];
		}
		else if(isset($_GET['anneex']) and $_GET['anneex'] != "0" and $_GET['spe'] == "0")
		{
			$resultats=$connexion->query('SELECT * FROM etudiant where professeur<>1 and AnneeExam = "'.$_GET['anneex'].'"');
			$ret = "Liste des élèves examinés en ".$_GET['anneex'];
		}
		else if(isset($_GET['anneex']) and $_GET['anneex'] != "0" and isset($_GET['spe']) and $_GET['spe'] != "0")
		{
			$resultats=$connexion->query('SELECT * FROM etudiant where professeur<>1 and parcours = "'.$_GET['spe'].'" and AnneeExam = "'.$_GET['anneex'].'"');
			$ret = "Liste des élèves en ".$_GET['spe']." examinés en ".$_GET['anneex'];
		}
		else
		{
			$resultats=$connexion->query('SELECT * FROM etudiant where professeur<>1');
			$ret = "Liste des élèves";
		}
		$resultats->setFetchMode(PDO::FETCH_OBJ);
	?>
	<center>
	<fieldset id="formulaire">
	<legend><?php echo $ret; ?></legend>
	<br>
	<?php
		while($ligne = $resultats->fetch()) 
        {  
			$id_etuditant=$ligne->id;
			$pprofesseur = $ligne->professeur;
			$nom=$ligne->nom;
			$pprenom=$ligne->prenom;
			if($pprofesseur == 0)
			{
				$parcours=$ligne->parcours;
				$retou = $nom." ".$pprenom." (Parcours ".$parcours.") <a href='?adddroit=".$id_etuditant."' title='Ajouter les droits'><img src='vue/images/adduser.png'></img></a> <a href='?option=".$id_etuditant."' title='Modifier le compte'><img src='vue/images/option.png' height='28px' width='28px'></img></a> <a href='?suppruser=".$id_etuditant."' title='Supprimer le compte'><img src='vue/images/delete.png'></img></a>";
			}
			else
			{
				$retou = $nom." ".$pprenom." <a href='?supprdroit=".$id_etuditant."' title='Retirer les droits'><img src='vue/images/deleteuser.png'></img></a> 
				<a href='?suppruser=".$id_etuditant."' title='Supprimer le compte'><img src='vue/images/delete.png'></img></a>";
			}
			
			?><h3><?php echo $retou;?></h3><?php
			$resultats2=$connexion->query('SELECT * FROM tache WHERE id_etudiant="'.$id_etuditant.'"');
			if($resultats2->RowCount() > 0)
			{
			?>
			<table>
				<tr>
					<th>Intitulé</td>
					<th>Date début</td>
					<th>Date fin</td>
					<th>Modalite</td>
					<th>Lieu</td>
					<th>Choix</td>
				</tr>
			<?php
			
			
			$resultats2->setFetchMode(PDO::FETCH_OBJ);
			$compeur =0;
			while( $ligne2 = $resultats2->fetch()) 
			{ 
				if($compeur % 2 == 0)
				{
					$type="pair";
				
				}
				else
				{
					$type="impair";
				
				}
			?>
                
                
				<tr class="<?php  echo $type; ?>">
				<td><?php echo $ligne2->intitule; ?></td>
				<td><?php echo date('d/m/y',$ligne2->date_debut); ?></td>
				<td><?php echo date('d/m/y',$ligne2->date_fin); ?></td>
				<td><?php echo $ligne2->modalite; ?></td>
				<td><?php echo $ligne2->lieu; ?></td>
				<td><a href="?page=afficher_tache&id_tache=<?php echo $ligne2->id_tache; ?>"><img src="vue/images/loupe.png" width="23px" border="0"/><a href="?page=modifier_tache&id_tache=<?php echo $ligne2->id_tache; ?>"><img src="vue/images/modifier.png" width="23px" border="0"/></a></td>
				</tr>
			<?php
				$compeur++;
			}
			?>
			</table>
			<?php
			$resultats3=$connexion->query("SELECT COUNT(c1) as nb_c1 FROM tache where id_etudiant='".$id_etuditant."' and c1=1"); 
			$lignes3=$resultats3->fetch(PDO::FETCH_OBJ);
			$nb_c1=$lignes3->nb_c1;
			
			$resultats4=$connexion->query("SELECT COUNT(c2) as nb_c2 FROM tache where id_etudiant='".$id_etuditant."' and c2=1"); 
			$lignes4=$resultats4->fetch(PDO::FETCH_OBJ);
			$nb_c2=$lignes4->nb_c2;
			
			$resultats4=$connexion->query("SELECT COUNT(c3) as nb_c3 FROM tache where id_etudiant='".$id_etuditant."' and c3=1"); 
			$lignes4=$resultats4->fetch(PDO::FETCH_OBJ);
			$nb_c3=$lignes4->nb_c3;
			
			$resultats4=$connexion->query("SELECT COUNT(c4) as nb_c4 FROM tache where id_etudiant='".$id_etuditant."' and c4=1"); 
			$lignes4=$resultats4->fetch(PDO::FETCH_OBJ);
			$nb_c4=$lignes4->nb_c4;
			
			if($nb_c1 > 0)
			{
				$c1="valider";
			}
			else
			{
				$c1="pas_valider";
			}
			
			if($nb_c2 > 0)
			{
				$c2="valider";
			}
			else
			{
				$c2="pas_valider";
			}
			
			if($nb_c3 > 0)
			{
				$c3="valider";
			}
			else
			{
				$c3="pas_valider";
			}
			
			if($nb_c4 > 0)
			{
				$c4="valider";
			}
			else
			{
				$c4="pas_valider";
			}
	
			?>
			<table>
			<tr>
			<td id="<?php echo $c1; ?>">C1</td>
			<td id="<?php echo $c2; ?>">C2</td>
			<td id="<?php echo $c3; ?>">C3</td>
			<td id="<?php echo $c4; ?>">C4</td>
			</tr>
			</table>
			<?php
			}
			else
			{
				if($pprofesseur == 0)
				{
					echo "Aucune compétence...";
				}
			}
		}
	
	
	}
	else
	{
	?>
	<fieldset id="formulaire">
	<legend>Liste de vos compétences</legend>
	<br>
	<center>	
	<?php
		$resultats=$connexion->query("SELECT * FROM tache where id_etudiant='".$_SESSION['id']."'");
	
		//Ex&eacute;cution de la requ?
		if($resultats->RowCount() == 0)
		{
			echo "Aucune compétence...";
		}
		else
		{
			?>
			<table>
		<tr>
			<th>Intitulé</td>
			<th>Date Début</td>
			<th>Date Fin</td>
			<th>Modalité</td>
			<th>Lieu</td>
			<th>Choix</td>
		</tr>
			<?php
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			$compeur =0;
			while( $ligne = $resultats->fetch()) 
			{   
           		if($compeur % 2 == 0)
				{
					$type="pair";
				}
				else
				{
					$type="impair";	
				}
			?>
				<tr class="<?php  echo $type; ?>">
				<td><?php echo stripslashes($ligne->intitule); ?></td>
				<td><?php echo date('d/m/y',$ligne->date_debut); ?></td>
				<td><?php echo date('d/m/y',$ligne->date_fin); ?></td>
				<td><?php echo $ligne->modalite; ?></td>
				<td><?php echo stripslashes($ligne->lieu); ?></td>
				<td><a href="?page=afficher_tache&id_tache=<?php echo $ligne->id_tache; ?>"><img src="vue/images/loupe.png" width="23px" border="0"/><a href="?page=new_tache&id_tache=<?php echo $ligne->id_tache; ?>"><img src="vue/images/modifier.png" width="23px" border="0"/></a><a href="?page=on&suppr=<?php echo $ligne->id_tache; ?>&v=dk"><img src="vue/images/supprimer.png" width="23px" border="0"/></a></td>
				</tr>
	<?php	
		}
		?>
		</table>
	
	
	<br><br>
	<?php
		$resultats=$connexion->query("SELECT COUNT(c1) as nb_c1 FROM tache where id_etudiant='".$_SESSION['id']."' and c1=1"); 
		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		$nb_c1=$lignes->nb_c1;
		
		$resultats=$connexion->query("SELECT COUNT(c2) as nb_c2 FROM tache where id_etudiant='".$_SESSION['id']."' and c2=1"); 
		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		$nb_c2=$lignes->nb_c2;
		
		$resultats=$connexion->query("SELECT COUNT(c3) as nb_c3 FROM tache where id_etudiant='".$_SESSION['id']."' and c3=1"); 
		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		$nb_c3=$lignes->nb_c3;
		
		$resultats=$connexion->query("SELECT COUNT(c4) as nb_c4 FROM tache where id_etudiant='".$_SESSION['id']."' and c4=1"); 
		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		$nb_c4=$lignes->nb_c4;
		
		if($nb_c1 > 0)
		{
			$c1="valider";
		}
		else
		{
			$c1="pas_valider";
		}
		
		if($nb_c2 > 0)
		{
			$c2="valider";
		}
		else
		{
			$c2="pas_valider";
		}
		
		if($nb_c3 > 0)
		{
			$c3="valider";
		}
		else
		{
			$c3="pas_valider";
		}
		
		if($nb_c4 > 0)
		{
			$c4="valider";
		}
		else
		{
			$c4="pas_valider";
		}
	
	?>
	<table >
	<tr>
	<td id="<?php echo $c1; ?>">C1</td>
	<td id="<?php echo $c2; ?>">C2</td>
	<td id="<?php echo $c3; ?>">C3</td>
	<td id="<?php echo $c4; ?>">C4</td>
	</tr>
	</table>
		<?php
		}
		
	}
	
	?>
	</center><br>
	</fieldset>
	</section>
	<?php
}
?>

</body>