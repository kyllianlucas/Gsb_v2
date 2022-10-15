<?php
    if(!session_id()){
      echo view ("connexion.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/public/css/gsb.css'); ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <nav class="menu">
            <div class="profile">
                <a href= "accueil.php" class="img"><img class="logo" src="<?php echo base_url('/public/image/GSB.png'); ?>" profile photo></a>
            </div>
            <ul>
                <li><a href="index.php?action=Menu">Menu</a></li>
                <li><a href="index.php?action=Note">Note de frais</a></li>
                <li><a href="index.php?action=Fichedefrais">Voir mes fiches</a></li>
                <li><a href="index.php?action=Contact">Contact</a></li>
            </ul>
        </nav>
    <table>
        <!--Formulaire pour modifier la fiche de frais et ajouter les hors forfait-->
        <!--Mise a jour plante et fiche hors forfait pas opérationnel-->
        <p><strong><u>Frais Forfaitaire: </u></strong></p>
        <ul>
            <p>Dans le forfait de base vous avez:</p>
            <li>750km</li>
            <li>9 nuits d'hôtel</li>
            <li>12 repas</li>
        </ul>
        <ul>
            <p>Quand vous vous connectez la première fois dans le mois vaut frais sont a 0</p>
        </ul>    
        <form action="index.php?action=MAJ" method="post" class="form-connexion">
        <label for="étape">
        Forfait étape:<input type="text" id="name" name="etp" minlength="1">
        </label>
        </br>
        </br>
        <label for="km">
        Forfait kilometre:<input type="text" id="name" name="km" minlength="1">
        </label>
        </br>
        </br>
        <label for="nuit">
            Nuit hotel: <input type="number" id="name" name="nuit" minlength="1">
        </label>
        </br>
        </br>
        <label for= "repasResto">
            Repas : <input type="text" id="name" name="repasResto" minlength="1">
        </label>
        <input type="submit" id="envoie" name="envoie" value="Valider">
        </form>
        <form action="index.php?action=FraisHorsForfait" method="post" class="form-connexion">
        <p><strong><u>Frais hors forfait:</u></strong></p>
        <label for="libelle">
            Libéllé: <input type="text" id="name" name="libelle" minlength="1">
        </label>
        </br>
        </br>
        <label for="date">
            Date: <input type="date" id="name" name="date" minlength="1">
        </label>
        </br>
        </br>
        <label for="montant">
            Montant:<input type="number" id="name" name="montant" minlength="1">
        </label>
        <input type="submit" id="envoie" name="envoie" value="Valider">
        </form>
        
        
</table>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="gsb.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>