<div id="bandeau">
<!-- Images En-t�te -->
<img src="images/logo-CROSL.jpg"	alt="CROSL" title="CROSL" width="250" height="150" />
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
	<li><a href="index.php?uc=inscription">S'inscrire</a></li>
	<?php
	}
	?>
	
	<?php 
	if(isset($_SESSION['connecter']))
	{
	?>
	<li><a href="index.php?uc=inscriptionF"> InscriptionFormation </a></li>
	<li><a href="index.php?uc=deconnecter"> Deconnecter </a></li>
	
	<?php
	}
	if(isset($_SESSION['admin']))
	{
	?>
	<li><a href="index.php?uc=administrer"> Administrer </a></li>
	<li><a href="index.php?uc=deconnecter"> Deconnecter </a></li>
	<?php
	}
	?>
</ul>
