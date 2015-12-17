<?php

$session=$_REQUEST['session'];
$idUtil=$_REQUEST['idUtil'];
$domaine=$_REQUEST['domaine'];
$formation=$_REQUEST['formation'];

$EstValider=$pdo->ValiderInscriptionA($session,$idUtil,$domaine,$formation);
if($EstValider)
{
	echo"L'inscription du Stagiaire à été valider";
	header('refresh: 3,Location: index.php?uc=administrer');
}
?>