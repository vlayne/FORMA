<?php
include("vues/v_ajoutFormation.php");

if(isset ($nomF))
{
	$nomF = $POST['nomF'];
	$cout =$POST['coutF'];
	$lieu = $POST['lieuF'];
	$nomI =$POST['nomI'];
	$public =$POST['public'];
	$objectif =$POST['obj'];
	$contenu =$POST['cont'];
	$dateL = $POST['dateL'];

	$AjoutFormation = $pdo->AjoutDeFormation($nomF,$cout,$lieu,$nomI,$public,$objectif,$contenu,$dateL);
	if($AjoutFormation)
	{
		echo "Votre Formation à été ajoutée";
	}
	else
	{
		echo "Veuillez remplir tout les champs";
	}
}
?>