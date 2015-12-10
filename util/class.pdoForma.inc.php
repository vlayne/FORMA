<?php
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application Forma
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoForma qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author slam5
 * @version    1.0
 */

class PdoForma
{   		
      	private static $serveur='mysql:host=127.0.0.1';
      	private static $bdd='dbname=bd_forma';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoForma = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoForma::$monPdo = new PDO(PdoForma::$serveur.';'.PdoForma::$bdd, PdoForma::$user, PdoForma::$mdp); 
			PdoForma::$monPdo->query("SET CHARACTER SET utf8");
			PdoForma::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public function _destruct(){
		PdoForma::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoForma = PdoForma::getPdoForma();
 * @return l'unique objet de la classe PdoForma
 */
	public  static function getPdoForma()
	{
		if(PdoForma::$monPdoForma == null)
		{
			PdoForma::$monPdoForma= new PdoForma();
		}
		return PdoForma::$monPdoForma;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/
	public function getLesCategories()
	{
		$req = "select * from categorie";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param $idCategorie 
 * @return un tableau associatif  
*/

	public function getLesProduitsDeCategorie($idCategorie)
	{
	    $req="select * from produit where idCategorie = '$idCategorie'";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passés en argument
 *
 * @param $desIdProduit tableau d'idProduits
 * @return un tableau associatif 
*/
	public function getLesProduitsDuTableau($desIdProduit)
	{
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = "select * from produit where id = '$unIdProduit'";
				$res = PdoForma::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}
/**
 * Création d'une commande 
 *
 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
 * tableau d'idProduit passé en paramètre
 * @param $nom 
 * @param $rue
 * @param $cp
 * @param $ville
 * @param $mail
 * @param $lesIdProduit
 
*/
	public function creerCommande($nom,$rue,$cp,$ville,$mail, $lesIdProduit )
	{
		$req = "select max(id) as maxi from commande";
		$res = PdoForma::$monPdo->query($req);
		$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;
		$maxi++;
		$idCommande = $maxi;
		echo "votre commande num: ".$idCommande. "    a été enregistrée <br>";
		$date = date('Y/m/d');
		$req = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
		echo $req."<br>";
		$res = PdoForma::$monPdo->exec($req);
		foreach($lesIdProduit as $unIdProduit)
		{
			$req = "insert into contenir values ('$idCommande','$unIdProduit')";
			echo $req."<br>";
			$res = PdoForma::$monPdo->exec($req);
		}
	}
	public static function inscription($login,$mdp,$numICOM,$nom,$statut,$prenom,$email,$date,$adresse,$telephone,$fonction)
	{
		$inscrit = false ;
		$RequeteInscrit= 'INSERT INTO stagiaire VALUES ('.$numICOM.',"'.$login.'","'.$prenom.'","'.$statut.'","'.$fonction.'","b","'.$mdp.'","'.$email.'","'.$date.'","'.$adresse.'",'.$telephone.',"'.$nom.'")';
		$connexion = PdoForma::$monPdo->exec($RequeteInscrit);
		if($RequeteInscrit)
		{
			$inscrit=true;
		}
		return $inscrit ;
	}
	public static function VerifNumeroICOM($numICOM)
	{
		$ICOM = false ;
		$RequeteICOM= 'SELECT NUM_ICOM from association';
		$connex = PdoForma::$monPdo->query($RequeteICOM);
		$ConfICOM = $connex->fetch();
		foreach ($ConfICOM as $key => $value) 
		{
			if($numICOM==$value)
				$ICOM=true;
		}
		return $ICOM;zdzd
	}
	/*public function RecupNombreDePlace()
	{
		
	}
	public function RecupNbFormInscrit()
	{
		
	}
	public function InscrireLeStagiaire()
	{
		
	}*/
	public static function recuperationID($NomID)
	{
		$requete = 'SELECT ID_UTIL from stagiaire where login = "'.$NomID.'"';
		$res = PdoForma::$monPdo->query($requete);
		$ID = $res->fetch();
		
		return $ID;
	}
	public static function connexion($utilisateur,$motdepass)
	{	
		$statut = false;
		
		$requeteCo = 'SELECT * from stagiaire where login="'.$utilisateur.'" AND mdp="'.$motdepass.'"';
		$connexion = PdoForma::$monPdo->query($requeteCo);
		$res = $connexion->fetch();
		 
		if($res!="")
		{
			$statut = true;	
		}

		return $statut;
	}
	public function getLesFormations($idDom)
	{
		
		$req = "select f.NOM_FORM, f.COUT_FORM, f.NBPLACE_FORM, f.LIEU_FORM, s.JOUR_SESSION, s.HEUREDEBUT_SESSIOn, s.HEUREFIN_SESSION from formation as f, session as s
		where s.NUM_FORM = f.NUM_FORM and f.ID_DOMAINE = $idDom ";			
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();		
		return $lesLignes;
		
	}

	public function getLesDomaines()
	{
		$req = "select * FROM domaine";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getNbPlacesRestantes()
	{
		
	}


	public static function grade($utilisateur)
	{
		$requeteGrade = 'SELECT grade from stagiaire where login="'.$utilisateur.'"';
		$connexion = PdoForma::$monPdo->query($requeteGrade);
		$grade = $connexion->fetch();
		
		return $grade;
	}
	public function ModifierUnProduit($idB,$DescriptionA,$PrixA)
	{
		$modifier = false;
		$req = "UPDATE produit SET description = '".$DescriptionA."', prix = '".$PrixA."' WHERE id = '".$idB."'";
		$res=PdoForma::$monPdo->exec($req);
		if ($res != null)
		{
			$modifier = true;
		}
		return $modifier;
	}
	public function SupprimerUnProduit($idB)
	{
	 $supprimer = false ;
	 $requete = "DELETE FROM produit where id ='".$idB."'" ;
	 $resultat = PdoForma::$monPdo->exec($requete);
	 if ($resultat != null)
	 $supprimer = true ;
	 
	 return $supprimer;
	}
	public function AjouterUnProduit($idA,$DescriptionA,$PrixA,$idC)
	{
	$ajout = false;
	$requete = "INSERT INTO produit VALUES ('".$idA."','".$DescriptionA."',".$PrixA.",'images/image.jpg','".$idC."')";
	$resultat = PdoForma::$monPdo->exec($requete);
	if($resultat!=null)
	$ajout = true ;
	
	return $ajout ;
	}
}
?>