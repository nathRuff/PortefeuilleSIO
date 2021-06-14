<?php
	if($_GET['v'] == 'dk')
	{
		echo "<section class=''><br><br>";
		echo "Êtes vous sur de vouloir supprimer cette tâche?<br><a href='?suppr=".$_GET['suppr']."&v=o'>Oui</a> - <a href='?page=on'>Non</a>";
		echo "</section>";
	}	
	else if($_GET['v'] == 'o')
	{
		$id_tache = $_GET['suppr'];
		$connexion->exec("DELETE from tache WHERE id_tache='".$id_tache."'");
		$connexion->exec("DELETE from competence WHERE id_tache='".$id_tache."'");
		print ("<script language = \"JavaScript\">");
		print ("location.href = '?page=on';");
		print ("</script>");
	}
?>