<?php
include("vues/v_inscription.php");
if(isset($_POST['nom']))
{
	// Occurences Table Formation
	$login = $_POST['ID'];
	$nomAssoc = $_POST['nomA'];
	$mdp = $_POST['mdp'];
	$numICOM = $_POST['icom'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email =$_POST['email'];
	$date =$_POST['ddn'];
	$adresse=$_POST['email'];
	$telephone = $_POST['telephone'];
	$fonction =$_POST['fonction'];
	$statut = $_POST['statut'];
	
	// var_dump($pdo->recuperationID($_SESSION['id']));
	$stagiaire = $pdo->inscription($login,$nomAssoc,$mdp,$numICOM,$nom,$prenom,$email,$date,$adresse,$telephone,$fonction);
	if(!$stagiaire)
	{
		echo 'Erreur ! Veuillez remplir tout les champs !';
	}
	else
	{
	  	echo 'Vous avez bien été inscrit ! Bienvenue '.$nom.' !';
	}
}
?>