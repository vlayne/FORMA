<?php
if(isset($_SESSION['connecter'])||isset($_SESSION['admin']))
{
header('Location: index.php?uc=accueil');
}
else
{
include("Vues/v_connexion.php");
	//Premier chargement de la page
	if(isset($_POST['nomU']))
	{
		if($_POST['nomU']=="" || $_POST['mdp']=="")
		{
		 $message='Veuillez saisir votre identifiant et votre mot de passe !';
		 echo $message ;
		}
		else
		{
		$utilisateur=$_POST["nomU"];
		$motdepass=$_POST["mdp"];
		//Vérification des IDs
		 $test = $pdo->connexion($utilisateur,$motdepass);
			 if($test==true)
			 {	

				$grade = $pdo->grade($utilisateur);
				if($grade[0] == 'a')
				{
					$_SESSION['admin']='admin';
				}
				else
				{
					$_SESSION['connecter']='co';
				}
				
				$_SESSION['id'] = $utilisateur ;
				
				header('Location: index.php?uc=accueil');
			 }
			 else
			 {
				echo "Erreur sur le mot de passe ou/et l'identifiant , veuillez r꦳sayer .";
			 }		 
		}
	}
}
/*
	public static function connexion($utilisateur,$motdepass)
	{	
		$statut = false;
		
		$requeteCo = 'SELECT * from stagiaire where nom_util="'.$utilisateur.'" AND mdp="'.$motdepass.'"';
		$connexion = PdoForma::$monPdo->query($requeteCo);
		$res = $connexion->fetch();
		 
		if($res!="")
		{
			$statut = true;	
		}

		return $statut;
	}
	public static function grade($utilisateur)
	{
		$requeteGrade = 'SELECT grade from stagiaire where nom_util="'.$utilisateur.'"';
		$connexion = PdoForma::$monPdo->query($requeteGrade);
		$grade = $connexion->fetch();
		
		return $grade;
	}
*/
?>