<body>
<section class=''>
<?php 
if(isset($_SESSION['login']))
{
	if(isset($_GET['id_tache']))
	{
		$id_tache=$_GET['id_tache'];
		$resultats=$connexion->query("SELECT * FROM tache where id_tache='".$id_tache."'"); 
		$lignes=$resultats->fetch(PDO::FETCH_OBJ);
		
		$date_debut=date('d/m/y',$lignes->date_debut);
		$date_fin=date('d/m/y',$lignes->date_fin);
		$intitule=stripslashes($lignes->intitule);
		$lieu=stripslashes($lignes->lieu);
		$modalite=$lignes->modalite;
		$description=stripslashes($lignes->description);
		$c1=$lignes->c1;
		$c2=$lignes->c2;
		$c3=$lignes->c3;
		$c4=$lignes->c4;
?>
		<br><br><fieldset id="formulaire">
			<legend>T&acirc;che N&ordm;<?php echo $id_tache?></legend>
			<a href="index.php">Retour</a>
				<h3>Intitul&eacute; : <?php echo $intitule; ?></h3>
				<h3>Date d&eacute;but : <?php echo $date_debut; ?> - Date fin : <?php echo $date_fin; ?></h3>
				<h3>Lieu : <?php echo $lieu; ?> - Modalit&eacute; : <?php echo $modalite; ?></h3>
				<h3>Description : <?php echo $description; ?></h3><br>
				
				<table>
				<tr>
				<th>Libelle comp&eacute;tence</th>
				<th>Acquis</th>
				</tr>
				<tr>
				<td>Participation &agrave; un projet d&acute;&eacute;volution d&acute;un SI (solution applicative et d&acute;infrastructure portant prioritairement sur le domaine de sp&eacute;cialit&eacute; du candidat)</td>
				<td  align=center><?php if($c1==1){ echo '<img src="vue/images/valider.png" width="23px" border="0"/>'; }else{ echo '<img src="vue/images/croix_rouge.png" width="23px" border="0"/>'; }?></td>
				</tr>
				<tr>
				<td>Prise en charge d&acute;incidents et de demandes d&acute;assistance li&eacute;s au domaine de sp&eacute;cialit&eacute; du candidat</td>
				<td  align=center><?php if($c2==1){ echo '<img src="vue/images/valider.png" width="23px" border="0"/>'; }else{ echo '<img src="vue/images/croix_rouge.png" width="23px" border="0"/>'; }?></td>
				</tr>
				<tr>
				<td>Elaboration de documents relatifs &agrave; la production et &agrave; la fourniture de services</td>
				<td  align=center><?php if($c3==1){ echo '<img src="vue/images/valider.png" width="23px" border="0"/>'; }else{ echo '<img src="vue/images/croix_rouge.png" width="23px" border="0"/>'; }?></td>
				</tr>
				<tr>
				<td>Productions relatives &agrave; la mise en place d&acute;un dispositif de veille technologique et &agrave; l&acute;&eacute;tude d&acute;une technologie, d&acute;un composant, d&acute;un outil ou d&acute;une m&eacute;thode</td>
				<td  align=center><?php if($c4==1){ echo '<img src="vue/images/valider.png" width="23px" border="0"/>'; }else{ echo '<img src="vue/images/croix_rouge.png" width="23px" border="0"/>'; }?></td>
				</tr>
				</table><br>
			
			<h3>T&acirc;ches d&eacute;j&agrave; acquises :</h3>
			<center>
			<?php
				
				$resultats=$connexion->query("SELECT * FROM competence where id_tache='".$id_tache."'"); 
				if($resultats->RowCount() == 0)
				{
					echo "Aucune tâche!";
				}
				else
				{
				?>
	<table>
			
				<tr>
				<th>Num&eacute;ro</th>
				<th>Libelle activit&eacute;</th>
				</tr>
				<?php
				//Ex&eacute;cution de la requ?
				
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
						
						$resultats2=$connexion->query("SELECT * FROM domaine where id_domaine='".$ligne->id_activite."'"); 
						$lignes2=$resultats2->fetch(PDO::FETCH_OBJ);
		
						?>
							
							
							<tr class="<?php  echo $type; ?>">
							<td><?php echo $lignes2->puce_act; ?></td>
							<td><?php echo $lignes2->libelle_act; ?></td>
							</tr>
						<?php
						$compeur=$compeur+1;
				}

					?>
				
			
				
			</table>
			<?php } ?>
			</center>
		</fieldset>
	<?php
	}
	else
	{
		echo "Erreur: aucune tâche à afficher!";
	}
}
else
{
	echo "Erreur : vous devez être connecté!";
	print ("<script language = \"JavaScript\">");
		print ("location.href = 'index.php';");
		print ("</script>");	
}
?>
</section>
</body>