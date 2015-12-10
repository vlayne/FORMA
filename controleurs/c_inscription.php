<?php
include("vues/v_inscription.php");
if(isset($_POST['nom']))
{
	// Occurences Table Formation
	$login = $_POST['ID'];
	$mdp = $_POST['mdp'];
	$confirmdp = $_POST['mdpV'];
	$numICOM = $_POST['icom'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email =$_POST['email'];
	$date =$_POST['ddn'];
	$adresse=$_POST['email'];
	$telephone = $_POST['telephone'];
	$fonction =$_POST['fonction'];
	$statut = $_POST['statut'];
	
	// Tests des valeurs entrées par l'utilisateur
	$testICOM = $pdo->VerifNumeroICOM($numICOM);

	if($login=="" || $confirmdp=="" ||$nom=="" ||$prenom=="" ||$numICOM=="" ||$email=="" ||$date=="" ||$adresse=="" ||$telephone=="" ||$fonction=="" ||$statut=="" ||$mdp=="")
	{
		echo "Vous devez remplir TOUT les champs";
	}
	else
		if($mdp!=$confirmdp)
		{
			echo'Vos mots de passes ne correspondent pas !';
		}
		else
			if(!$testICOM)
			{
				echo "Ce numéro ICOM n'existe pas !";
			}
				else
				{
					$stagiaire = $pdo->inscription($login,$mdp,$numICOM,$nom,$statut,$prenom,$email,$date,$adresse,$telephone,$fonction);
					if(!$stagiaire)
					{
						echo 'Erreur ! Veuillez remplir tout les champs !';
					}
					else
					{
					  	echo 'Vous avez bien été inscrit ! Bienvenue '.$nom.' !';
					}
				}	
}
/**	if(!is_integer($telephone))
				{
					echo "Veuilllez saisir un numéro de téléphone";
				} 
				else **/
?>