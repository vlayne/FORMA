<div id="accueil">
Bienvenue dans le site du Comité Régional Olympique et Sportif de Lorraine !
<br/>
<br/> 
Le CROSL offre un catalogue diversifié de formations aux bénévoles des clubs affiliés aux ligues (législation, éthique, comptabilité associative, etc.). 
Les ligues organisent également des formations, en général plus techniques, sur l'usage de logiciels spécifiques de gestion des clubs ou des compétitions sportives.
<?php
	if(isset($_SESSION['connecter']))
	{
		echo"Vous etes connecte en tant que Stagiaire !";
	}
		if(isset($_SESSION['admin']))
	{
		echo"Vous etes connecte en tant qu'Administrateur !";
	}
?>
</div>
