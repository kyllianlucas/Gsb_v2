<?php

$req =$bdd->prepare('UPDATE  lignefraisforfait SET quantite=? WHERE idVisiteur = $_SESSION and mois = date(F) and idFraisForfait = ETP');
$req ->execute(array($_POST['ETP']));
$req =$bdd->prepare('UPDATE  lignefraisforfait SET KM= WHERE id =KM ');
$req ->execute(array($_POST['KM']));
$req =$bdd->prepare('UPDATE  lignefraisforfait SET NUI= WHERE id =NUI ');
$req ->execute(array($_POST['NUI']));
$req =$bdd->prepare('UPDATE  lignefraisforfait SET REP= WHERE id =REP ');
$req ->execute(array($_POST['REP']));

?>