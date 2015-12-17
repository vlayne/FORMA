<?php
$Numformation = $_REQUEST['formation'];
$Numdomaine = $_REQUEST['domaine'];
$NumSession = $_REQUEST['session'];

$InscritFormation = $pdo->InscrirePourFormation($_SESSION['idUtil'],$Numformation,$Numdomaine,$NumSession);
if($InscritFormation == true)
{
	echo "Vous êtes inscrit à cette formation !";
}
else
{
	echo "Vous êtes déja inscrit";
}

?>