<div id="accueil">
Bienvenue dans le site du CROSL <br/><br/> 
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
