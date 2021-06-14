	<?php 
	if(isset($_POST['login']))
	{
		include('controleur/connexion.php');
	}
	?>
	<section id="intro">
    		<form method="post" action=""> 

    			<p><label for="name">Nom</label></p> 
    			<input type="text" name="login" placeholder="Nom de compte" required /> 
    			 
    			<p><label for="email">Mot de passe</label></p> 
    			<input type="password" name="pass" placeholder="*******" required />  <br>   			 
    			<input type="submit" id="submit" value="Connexion!" /> 
    			 
    		</form> 
    				
    	</section>
<section id="portfolio"> <!-- HTML5 section tag for the portfolio 'section' -->
			<form method="POST" action="?page=inscription">
<table>			
		<tr><td><p><label for="name">Nom</label></p></td><td><p><label for="name">Prénom</label></p></td></tr>
		<tr><td><input type="text" name="nom" placeholder='Nom' required/></td><td><input type="text" name="prenom" placeholder='Prénom' required/></td></tr>
		<tr><td><p><label for="name">Mot de passe</label></p></td><td><p><label for="name">Confirmation du mot de passe</label></p></td></tr>
		<tr><td><input type="password" name="mdp1" required placeholder='********'/></td><td><input type="password" name="mdp2" required placeholder='********'/></td></tr>
		<tr><td><p><label for="name">Année d'examen</label></p></td><td><select name="annee"><?php $datea = date('Y', time()); $dat = $datea+2; while($datea <= $dat) { echo "<option value=".$datea.">".$datea."</option>"; $datea++; } ?></select></td></tr>
		<tr><td><p><label for="name">Parcours</label></p></td><td><select name="parcours">
				<option value="SISR">SISR</option>
				<option value="SLAM">SLAM</option>
				</select></td></tr>
<?php
if(!(empty($_SESSION['erreur'])))
	{
		echo '<font color="red"><b>'.$_SESSION['erreur'].'</b></font>';
		$_SESSION['erreur'] = '';
	}
?><tr><td align="center"><input type="submit" action="cancel" name="inscription" value="Annuler"/></td><td align="center"><input type="submit" name="inscription" value="S'inscrire!"/></td></tr>
</table>
</form>
    				
    	</section>