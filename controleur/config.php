<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_nom_bd='0680008p_porte_feuille'; // le nom de votre base de données
$PARAM_utilisateur='web0680008p'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='$:JA*bJRS'; // mot de passe de l'utilisateur pour se connecter
try
{
	$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur, $PARAM_mot_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	echo 'Une erreur est survenue !';
	die();
} 
?>
