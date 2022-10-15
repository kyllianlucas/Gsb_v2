<?php
    session_start();
    $mois = $_GET['mois'];
    $requestTableau = $bdd->query("SELECT idFraisForfait, quantite FROM lignefraisforfait");
    $infofrais = $requestTableau->fetch();
    if ($infofrais){
        $idFraisForfait = $infofrais['IdFrais'];
        $quantite = $infofrais['Qte'];
    }
    else
    {
        $idFraisForfait = "Non renseigné";
        $quantite = "Non renseigné";
    }
    $requestTableauH = $bdd->query("SELECT libelle, date, montant FROM lignefraishorsforfait");
    $infofraisH = $requestTableauH->fetch();
    if ($infofraisH){
        $libelle = $infofraisH['libelle'];
        $date = $infofraisH['date'];
        $montant =$infofraisH['montant'];
    }
    else
    {
        $libelle = "Non renseigné";
        $date = "Non renseigné";
        $montant = "Non renseigné";
    }
?>