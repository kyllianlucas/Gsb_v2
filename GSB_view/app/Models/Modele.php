<?php
//acces au Modele parent pour l heritage
namespace App\Models;
use CodeIgniter\Model;

//=========================================================================================
//définition d'une classe Modele (meme nom que votre fichier Modele.php) 
//héritée de Modele et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================
class Modele extends Model {

//==========================
// Code du modele
//==========================

//=========================================================================
// Fonction 1
// récupère les données BDD dans une fonction getBillets
// Renvoie la liste de tous les billets, triés par identifiant décroissant
//=========================================================================
public function getBillets() { 

//==========================================================================================
// Connexion à la BDD en utilisant les données féninies dans le fichier app/Config/Database.php
//==========================================================================================
	$db = db_connect();

//=============================
// rédaction de la requete sql
//=============================
    $sql = 'select BIL_ID, BIL_TITRE, BIL_DATE from T_BILLET order by BIL_ID desc';
	
//=============================
// execution de la requete sql
//=============================	
    $resultat = $db->query($sql);

//=============================
// récupération des données de la requete sql
//=============================
	$resultat = $resultat->getResult();

//=============================
// renvoi du résultat au Controleur
//=============================	
    return $resultat;
   
}


//=========================================================================
// Fonction 2 
// récupère les données BDD dans une fonction getDetails
// Renvoie le détail d'un billet précédemment sélectionné par son id
//=========================================================================
//Connexion utilisateur
public function verif($username,$password) {
    $db = db_connect();	
    $sql="SELECT id, count(*) as reste FROM Visiteur where login = ? and mdp = ?";
    $resultat = $db->query($sql, [$username,$password]);
	$resultat = $resultat->getResult();	
    return $resultat;
}
//Permet la verification a la connexion
public function Verification($id, $mois){
    $db = db_connect();	
    $sql = 'SELECT count(*) as nb FROM FicheFrais where idVisiteur=? and mois=?';
    $resultat = $db-> query ($sql, [$id, $mois]);
    $resultat = $resultat->getResult();
    return $resultat;
}

//ajour ligne de la fiche de frais une fois l'utilisiteur connecter
public function CreerFicheFrais($visiteur, $mois){
    $db = db_connect();	
    //print_r(date("Y-m-d"));
    $sql = "INSERT INTO FicheFrais VALUES (?,?,0,0,?,'CR')";
    $resultat = $db->query($sql, [$visiteur, $mois, date("Y-m-d")]);
    $sql2 = 'INSERT INTO LigneFraisForfait VALUES (?,?,"ETP",0)';
    $sql3 = 'INSERT INTO LigneFraisForfait VALUES (?,?,"KM",0)';
    $sql4 = 'INSERT INTO LigneFraisForfait VALUES (?,?,"NUI",0)';
    $sql5 = 'INSERT INTO LigneFraisForfait VALUES (?,?,"REP",0)';
    $resultat = $db->query($sql2, [$visiteur, $mois]);
    $resultat = $db->query($sql3, [$visiteur, $mois]);
    $resultat = $db->query($sql4, [$visiteur, $mois]);
    $resultat = $db->query($sql5, [$visiteur, $mois]);
    $resultat = $resultat->getResult();
    return $resultat;
}
public function aff($type, $visiteur, $mois){
    $db = db_connect();
    $sql1 = "SELECT quantite FROM LigneFraisForfait WHERE idVisiteur=? and mois = ? and idFraisForfait = ?";
    $resultat = $db-> query($sql1, [$visiteur, $mois, $type]);
    $resultat = $resultat->getResult();
    return $resultat;
}
//Mise ajour fiche de frais
public function MAJ($ETP, $KM, $NUI, $REP,$visiteur,$mois){
    $db = db_connect();
    $sql1 = 'UPDATE  LigneFraisForfait SET quantite=? WHERE idVisiteur = ? and mois = ? and idFraisForfait = "ETP"';
    $sql2 = 'UPDATE  LigneFraisForfait SET quantite=? WHERE idVisiteur = ? and mois = ? and idFraisForfait = "KM"';
    $sql3 = 'UPDATE  LigneFraisForfait SET quantite=? WHERE idVisiteur = ? and mois = ? and idFraisForfait = "NUI"';
    $sql4 = 'UPDATE  LigneFraisForfait SET quantite=? WHERE idVisiteur = ? and mois = ? and idFraisForfait = "REP"';
    $resultat = $db->query($sql1, [$ETP, $visiteur, $mois]);
    $resultat = $db->query($sql2, [$KM, $visiteur, $mois]);
    $resultat = $db->query($sql3, [$NUI, $visiteur, $mois]);
    $resultat = $db->query($sql4, [$REP, $visiteur, $mois]);
    $resultat = $resultat->getResult();
    return $resultat;
}


public function FraisHorsForfait($visiteur, $mois, $libelle, $date ,$montant){
    $db = db_connect();	
    //print_r(date("Y-m-d"));
    $sql1 = "INSERT INTO LigneFraisHorsForfait (idVisiteur, mois, libelle, date, montant) VALUES (?,?,?,?,?)";
    $resultat = $db->query($sql1, [$visiteur, $mois, $libelle, $date, $montant]);
    $resultat = $resultat->getResult();
    return $resultat;
}

 public function Mois ($visiteur){
    $db = db_connect();	
    //print_r(date("Y-m-d"));
    $sql1 = "SELECT mois FROM FicheFrais Where idVisiteur=?";
    $resultat = $db->query($sql1, [$visiteur]);
    $resultat = $resultat->getResult();
    return $resultat;
}
public function getData($visiteur, $mois, $libelle)
{
    $db = db_connect();
    $firstSQL = 'SELECT quantite FROM LigneFraisForfait WHERE idVisiteur = ? AND mois = ? AND idFraisForfait = ?';
    $resultat = $db->query($firstSQL, [$visiteur, $mois, $libelle]);
    $resultat = $resultat->getResult();
    /*if ($resultat != null)
    {
    $resultat = $resultat[0]->quantite;
    }*/
    return $resultat;
}
public function getDataHorsForfait($visiteur, $mois)
{
    $db = db_connect();
    $firstSQL = 'SELECT libelle, montant, date FROM LigneFraisHorsForfait WHERE idVisiteur = ? AND mois = ?';
    $resultat = $db->query($firstSQL, [$visiteur, $mois]);
    $resultat = $resultat->getResult();
    return $resultat;
    
}
//==========================
// Fin Code du modele 
//===========================
//fin de la classe
}

?>