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
	public function _destruct()
	{
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
	
	
	public static function inscription($login,$mdp,$numICOM,$nom,$statut,$prenom,$email,$date,$adresse,$telephone,$fonction)
	{
		$inscrit = false ;
		$RequeteInscrit= 'INSERT INTO stagiaire VALUES (DEFAULT,'.$numICOM.',"'.$login.'","'.$prenom.'","'.$statut.'","'.$fonction.'","b","'.$mdp.'","'.$email.'","'.$date.'","'.$adresse.'",'.$telephone.',"'.$nom.'")';
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
		return $ICOM;
	}
	
	public static function InscrirePourFormation($IdUtil,$NumForm,$IdDomaine,$idSession)
	{	
		$inscritForma = false ;
		$requete = 'INSERT into inscire VALUES('.$IdUtil.','.$NumForm.','.$IdDomaine.','.$idSession.',0)';
		$res = PdoForma::$monPdo->exec($requete);
		if($requete)
		{
			$inscritForma=true;
		}
		return $inscritForma ;

	}

	public static function recuperationID($NomID)
	{
		$requete = 'SELECT ID_UTIL from stagiaire where login = "'.$NomID.'"';
		$res = PdoForma::$monPdo->query($requete);
		$ID = $res->fetch();			
		return $ID[0];
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
		
		$req = "select s.id_domaine,s.num_form,s.id_session,f.NOM_FORM, f.COUT_FORM, f.NBPLACE_FORM, f.LIEU_FORM, s.JOUR_SESSION, s.HEUREDEBUT_SESSIOn, s.HEUREFIN_SESSION from formation as f, session as s
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


	public static function grade($utilisateur)
	{
		$requeteGrade = 'SELECT grade from stagiaire where login="'.$utilisateur.'"';
		$connexion = PdoForma::$monPdo->query($requeteGrade);
		$grade = $connexion->fetch();
		
		return $grade;
	}
}
?>