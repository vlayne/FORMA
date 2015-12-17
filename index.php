<?php
//Controleur Principal du site Vanille
session_start();
require_once("util/class.pdoForma.inc.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];
/* Création d'une instance d'accès à la base de données */
$pdo = PdoForma::getPdoForma();
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'domaine' :
		{include("controleurs/c_domaine.php");break;}
	case 'formation' :
		{include("controleurs/c_formation.php");break;}
	case 'inscription' :
		{ include("controleurs/c_inscription.php");break; }
	case 'connexion' :
		{ include("controleurs/c_connexion.php");break;}
	case 'administrer' :
	    { include("controleurs/c_administrer.php");break;  }
	case 'deconnecter' :
		{ include("controleurs/c_deco.php");break;}
	//case 'inscriptionF' :
		//{ include("controleurs/c_inscriptionF.php");break; }
	case 'inscrireFormation' :
		{ include("controleurs/c_inscrireFormation.php");break;}
	case 'GererInscrit' :
		{ include("controleurs/c_gererInscrit.php"); break;}

	case 'ValiderFormation':
		{ include("controleurs/c_ValiderFormation.php"); break;}
}
include("vues/v_pied.php") ;
?>