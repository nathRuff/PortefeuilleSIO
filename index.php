<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <?php
	include('vue/head.php');
	include('controleur/config.php');
	?>

<body>
	<?php include('vue/header.php'); ?>
    <section id="contentcontainer"> <!-- HTML5 section tag for the content 'section' -->
    <?php 
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
		if($page=='connexion' || $page=='inscription' || $page == 'new_tache' || $page=='afficher_tache' || $page=='modifier_tache' || $page == 'on')
		{
			include('vue/'.$page.'.php');
		}
		else
		{
			include('vue/404.php');
		}
	}
	else if(isset($_SESSION['login']))
	{
		include('vue/on.php');
	}
	else
	{
		include('vue/off.php');
	}
	?>
    </section>
    
</body>

</html>