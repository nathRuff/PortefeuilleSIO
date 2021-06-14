<body>
<section class=''>
<?php 
if(!(isset($_SESSION['login'])))
{
	print ("<script language = \"JavaScript\">");
	print ("location.href = 'index.php';");
	print ("</script>");
}
if(isset($_SESSION['login']))
{
?>
<fieldset id="formulaire">
<legend>Nouvelle tâche</legend>
<a href="?page=on">Retour</a>
	<?php
	$id_tache=$_GET['id_tache'];
	$resultats=$connexion->query("SELECT * FROM tache where id_tache='".$id_tache."'"); 
	$lignes=$resultats->fetch(PDO::FETCH_OBJ);
	$date_debut=date('d/m/y',$lignes->date_debut);
	$date_fin=date('d/m/y',$lignes->date_fin);
	$intitule=$lignes->intitule;
	$lieu=$lignes->lieu;
	$modalite=$lignes->modalite;
	$description=$lignes->description;
	$c1=$lignes->c1;
	$c2=$lignes->c2;
	$c3=$lignes->c3;
	$c4=$lignes->c4;
	$text = 'Modifier';
	$na = 'modifier';
	?>
<form method="POST" action="index.php" accept-charset="UTF-8">
<center>
<table>
<tr><td><p><label for="name">Date début (jj/mm/aaaa)</label></p></td><td><input type="text" name="dated" required value="<?php echo $date_debut; ?>"/></td></tr>
<tr><td><p><label for="name">Date fin (jj/mm/aaaa)</label></p></td><td><input type="text" name="datef" required value="<?php echo $date_fin; ?>"/></td></tr>
<tr><td><p><label for="name">Intitulé</label></p></td><td><input type="text" value="<?php echo $intitule; ?>" required name="intitule"></td></tr>
<tr><td><p><label for="name">Lieu</label></p></td><td><input type="text" required value="<?php echo $lieu; ?>" name="lieu"></td></tr>
<tr><td><p><label for="name">Modalité</label></p></td><td><input type="radio" name="modalite" checked value="Individuelle" <?php if($modalite =="individuelle"){ echo "checked=true";} ?>><span>Individuelle</span><input type="radio" name="modalite" <?php if($modalite =="equipe"){ echo "checked=true";} ?> value="Equipe"><span>En équipe</span></td></tr>
<tr><td><p><label for="name">Description</label></p></td><td><textarea name="desc" required cols="35" rows="5"><?php echo $description; ?></textarea></td></tr>
</table>
<table id="tableau_competence">
<tr>
<th>Libelle compétence</th>
<th>Acquis</th>
</tr>
<tr>
<td>C1.Participation à un projet d’évolution d’un SI (solution applicative et d’infrastructure portant prioritairement sur le domaine de spécialité du candidat)</td>
<td  align=center><input type="checkbox" <?php if($c1==1){ echo "checked";} ?> name="c1" /></td>
</tr>
<tr>
<td>C2.Prise en charge d’incidents et de demandes d’assistance liés au domaine de spécialité du candidat</td>
<td  align=center><input type="checkbox" <?php if($c2==1){ echo "checked";} ?> name="c2" /></td>
</tr>
<tr>
<td>C3.Elaboration de documents relatifs &agrave; la production et à la fourniture de services</td>
<td  align=center><input type="checkbox" <?php if($c3==1){ echo "checked";} ?> name="c3" /></td>
</tr>
<tr>
<td>C4.Productions relatives à la mise en place d’un dispositif de veille technologique et à l’étude d’une technologie, d’un composant, d’un outil ou d’une méthode</td>
<td  align=center><input type="checkbox" <?php if($c4==1){ echo "checked";} ?> name="c4" /></td>
</tr>
</table><br>

<table id="tableau_competence">
<tr>
<th>Numéro</th>
<th>Libelle activité</th>
<th>Acquis</th>
</tr>
<?php

	if($_SESSION['parcours'] == "SISR")
	{
		$resultats=$connexion->query("SELECT * FROM domaine WHERE SISR=1"); 
	}
	else
	{
		$resultats=$connexion->query("SELECT * FROM domaine WHERE SLAM=1"); 
	}
	
	//Exécution de la requête
	
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
			$select="";
			if($text == 'Modifier')
			{
				$resultats2=$connexion->query("SELECT COUNT(id_tache) as comp_valider FROM competence where id_tache='".$id_tache."' AND id_activite='".$ligne->id_domaine."'"); 
					$lignes2=$resultats2->fetch(PDO::FETCH_OBJ);
					$comp_valider=$lignes2->comp_valider;
					
					if($comp_valider>0)
					{
						$select='checked="checked"';
					}
			}
			?>
                
                
				<tr class="<?php  echo $type; ?>">
				<td align=center><?php echo $ligne->puce_act; ?></td>
				<td><?php echo $ligne->libelle_act; ?></td>
				<td align=center><input type="checkbox" <?php echo $select;?> name="<?php echo $ligne->id_domaine; ?>"/></td>
				</tr>
			<?php
			$compeur=$compeur+1;
		}

?>
</table><br>
<input type="hidden" name="id_tache" value="<?php echo $id_tache; ?>"/>
<input type="submit" name="<?php echo $na; ?>" value="<?php echo $text; ?>"/></center>

</form>
</fieldset>
<?php
}
else
{
	echo "Erreur : vous devez être connecté!";
}
?>
</section>
</body>