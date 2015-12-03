<?php		
		$idDomaine = $_REQUEST['idDomaine'];		
		$formation = $pdo->getLesFormations($idDomaine);
		include("vues/v_formation.php");
?>
		