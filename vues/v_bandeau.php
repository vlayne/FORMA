<div id="bandeau">
<!-- Images En-tête -->

</div>
<!--  Menu haut-->

<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=domaine"> Formation </a></li>
	<?php
	if(!isset($_SESSION['connecter'])&&!isset($_SESSION['admin']))
	{
	?>
		<li><a href="index.php?uc=connexion">Connexion </a></li>		
	<?php }	?>
</ul>
