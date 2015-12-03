<?php
include("vues/v_inscription.php");
if(isset($_POST['nom']))
{
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email =$_POST['email'];
	$date =$_POST['ddn'];
	$adresse=$_POST['email'];
	$telephone = $_POST['telephone'];
	$fonction =$_POST['fonction'];
	var_dump($pdo->recuperationID($_SESSION['id']));
	$stagiaire = $pdo->inscription($nom,$prenom,$email,$date,$adresse,$telephone,$fonction);
	if(!$stagiaire)
	{
		echo 'erreuuuuuuuuuuuuur';
	}
	else
	{
		$inscrire = $pdo->InscrireLeStagiaire($pdo->recuperationID($NomID));
	}
}
?>