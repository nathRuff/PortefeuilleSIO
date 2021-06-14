<header> <!-- HTML5 header tag -->
		<div id="headercontainer">
    		<h1><a class="introlink anchorLink" href="#intro">Porte<span class="titrebold">feuille</span> de compétences</a></h1>
    		<nav> <!-- HTML5 navigation tag -->
    			<ul>
				<?php if(isset($_SESSION['login']))
				{ 
					if($_SESSION['professeur']==1)
					{
						$me = "Bonjour ".ucfirst(strtolower($_SESSION['prenomalzzke']))." ".ucfirst(strtolower($_SESSION['login']))." (Professeur ".$_SESSION['parcours'].") <a href='?option=".$_SESSION['id']."' title='Modifier le compte'><img src='vue/images/option.png' height='28px' width='28px'></img></a>";		
					}
					else
					{
						$me = "Bonjour ".ucfirst(strtolower($_SESSION['prenomalzzke']))." ".ucfirst(strtolower($_SESSION['login']))." (".$_SESSION['parcours'].") année d'examen : ".$_SESSION['annee']." <a href='?sdfoption=".$_SESSION['id']."' title='Modifier le compte'><img src='vue/images/option.png' height='28px' width='28px'></img></a>";	
					}?>
					<li><?php echo $me; ?></li>
    				<li><a href="?deconnexion=oui"><img src="vue/images/deconnexion.png" border="0"/> Déconnexion</a></li>
				<?php 
				}
				else
				{
				?>
    				<li><a class="introlink anchorLink" href="#intro">Connexion</a></li>
    				<li><a class="portfoliolink anchorLink" href="#portfolio">Inscription</a></li>
    			<?php
				}
				?>
				</ul>				
    		</nav>
    	
    	</div>
    
</header>