<?php
	//acces au controller parent pour l heritage
	namespace App\Controllers;
	use CodeIgniter\Controller;
	use CodeIgniter\Session\Session;

	//=========================================================================================
	//définition d'une classe Controleur (meme nom que votre fichier Controleur.php) 
	//héritée de Controller et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
	//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
	//  et suivre par des minuscules
	//=========================================================================================

	class Controleur extends Controller {

	//=====================================================================
	//Fonction index correspondant au Controleur frontal (ou index.php) en MVC libre
	//=====================================================================
	public function index(){
		if (isset($_GET["action"])){
			if ($_GET ["action"] == "Menu"){
				$this->menu();
			}
			if ($_GET ["action"] == "Testlogin"){
				$this->login();
			}
			if ($_GET ["action"] == "Note"){
				$this->note();
			}
			if ($_GET ["action"] == "Fichedefrais"){
				$this->mois();
			}
			if ($_GET ["action"] == "Contact"){
				$this->contact();
			} 
				
			if ($_GET ["action"] == "MAJ"){
				$this->MAJ();
			}
			if ($_GET ["action"] == "FraisHorsForfait"){
				$this->FraisHorsForfait();
			}
			if ($_GET ["action"] == "MOIS"){
				$this->mois();
			}
			if ($_GET["action"] == "getData"){
				$this->getData();
			}
		}
		else {
			$this->accueil();
		}
	}


	//======================================================
	// Code du controleur simple (ex fichier Controleur.php)
	//======================================================

	// Action 1 : Affiche la liste de tous les billets du blog
	//redirection page connexion
	public function accueil() {
		echo view("Connexion.php");
	}
	//redirection page accceui
	public function menu(){
		echo view("accueil.php");
	}
	//Connesxion avec création de fiche de frais et verification de l'utilisateur
	public function login(){
		$Modele = new \App\Models\Modele();
		$donnees = $Modele->verif($_POST["username"],$_POST["password"]);
		
		if ($donnees[0]->reste==1);	{
			session_start();
		$_SESSION["visiteur"]= $donnees[0]->id;
		$donnees2= $Modele->Verification($donnees[0]->id, date("F"));
		if ($donnees2[0]->nb==0){
			//print_r($donnees2);
			$donnes3=$Modele->CreerFicheFrais($donnees[0]->id, date("F"));
		}
		/*$donnees3= $Modele->horsforfait();
		if($donnees3[0]->nb==0){
			print_r($donnees3);
			$donnes4=$Modele->horsforfait($donnees[0]->id, date("F"));
		}*/
		}
		echo view("accueil.php");
	}
	//redirection page note
	public function note(){
		
		echo view("Note.php");
	}
	//redirection page fiche de frais
	public function fiche(){
		echo view("Fichedefrais.php");
	}
	//redirection page contact
	public function contact(){
		echo view("Contact.php");
	}
	// Mise a jour de la fiche de frais	
	public function MAJ(){
		$Modele	= new \App\Models\Modele();
		session_start();
		if (isset($_POST["km"]) && isset($_POST["nuit"]) && isset($_POST["repasResto"]) && isset($_POST["etp"])){
			$data = $Modele->MAJ($_POST["etp"],$_POST["km"],$_POST["nuit"],$_POST["repasResto"],$_SESSION["visiteur"],date("F"));
			$this->note();
		}
	}

	//Fiche hors forfait
	public function FraisHorsForfait(){
		$Modele = new \App\Models\Modele();
		session_start();
		if (isset($_POST["libelle"]) && isset($_POST["date"]) && isset($_POST["montant"])){
			$data = $Modele->FraisHorsForfait($_SESSION["visiteur"],date("F"), $_POST["libelle"],$_POST["date"] ,$_POST["montant"]);
			$this->note();
		}
	}

	public function mois(){
		$Modele = new \App\Models\Modele();
		if(!session_id()){
			session_start();
		}
			$data["mois"]= $Modele->mois($_SESSION["visiteur"]);
			//print_r($data);
		echo view('Fichedefrais.php', $data);
	}
	// Affiche une erreur
	public function erreur($msgErreur) {
	echo view('vueErreur.php', $msgErreur);
	}

	public function getData()
	{
		$Modele = new \App\Models\Modele();
			session_start();
			if (isset($_SESSION["visiteur"]) && isset($_POST["mois"])){
				//print_r($_POST["mois"]);

			$donnees = $Modele->getData($_SESSION["visiteur"], $_POST["mois"], 'ETP');
			$_SESSION['ETP'] = $donnees[0]->quantite;
		
			$donnees = $Modele->getData($_SESSION["visiteur"], $_POST["mois"], 'KM');
			$_SESSION['KM'] = $donnees[0]->quantite;
		
			$donnees = $Modele->getData($_SESSION["visiteur"], $_POST["mois"], 'NUI');
			$_SESSION['NUI']= $donnees[0]->quantite;
		
			$donnees = $Modele->getData($_SESSION["visiteur"], $_POST["mois"], 'REP');
			$_SESSION['REP']=$donnees[0]->quantite;
			
			$donnees = $Modele->getDataHorsForfait($_SESSION["visiteur"], $_POST["mois"]);
			$_SESSION['libelle']=$donnees;
			//print_r('libelle:');
			$this->mois();
		}
	}
	//==========================
	//Fin du code du controleur simple
	//===========================

	//fin de la classe
}
?>