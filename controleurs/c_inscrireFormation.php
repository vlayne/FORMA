<?php
$Numformation = $_REQUEST['formation'];
$Numdomaine = $_REQUEST['domaine'];
$NumSession = $_REQUEST['session'];
var_dump($Numformation);
var_dump($Numdomaine);
var_dump($NumSession);
var_dump($_SESSION['idUtil']);
$InscritFormation = $pdo->InscrirePourFormation($_SESSION['idUtil'],$Numformation,$Numdomaine,$NumSession);
if($InscritFormation)
{
	echo "Vous êtes inscrit à cette formation !";
}
else
{
	echo "Impossible d'inscrire !";
}
?>