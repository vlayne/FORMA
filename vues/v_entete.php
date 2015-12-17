<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!-- TITRE ET MENUS -->
<html lang="fr">
<head>
<title>Forma</title>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="util/cssGeneral.css" rel="stylesheet" type="text/css">
<!-- bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/dataTables.bootstrap.min.css">
<script src="bootstrap/jquery-1.11.3.min.js"></script>
<script src="bootstrap/jquery.dataTables.min.js"></script>
<script src="bootstrap/dataTables.bootstrap.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body >
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?uc=accueil">Forma</a>

        </div>

        <div class="navbar-header" style="margin-top:5px">
        <ul class="nav nav-pills" role="tablist">
          		<li role="presentation" class="active"><a href="index.php?uc=domaine">Formation</a></li>

     <?php if(!isset($_SESSION['connecter'])&&!isset($_SESSION['admin'])) { ?>
		<li role="presentation" ><a href="index.php?uc=inscription">Inscription</a></li>		
	<?php }  ?>
	<?php if(isset($_SESSION['admin'])) { ?>
		<li role="presentation" ><a href="index.php?uc=administrer">Administrer</a></li>		
	<?php }  ?>
          </ul>
      </div>
      <?php if(!isset($_SESSION['connecter'])&&!isset($_SESSION['admin'])) { ?>
        <div id="navbar" class="navbar-collapse collapse">

          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <li role="Deconnexion" class="btn btn-success"><a href="index.php?uc=deconnecter">Se connecter</a></li>
          </form>
        </div><!--/.navbar-collapse -->
        <?php } else { ?>
        <div id="navbar" class="navbar-collapse collapse navbar-right" style="margin-top : 8px">
        	<a href="index.php?uc=deconnecter"class="btn btn-danger" role="button">Deconnexion</a>
    	</div>
        <?php }  ?>
      </div>
    </nav>