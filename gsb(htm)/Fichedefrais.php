<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/public/css/gsb.css'); ?>" />
    <!-- Bootstrap CSS -->
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
        
        <!-- Pour voir les fiche de frais-->
        <select id="mois" placeholder="Selectionnez le mois" onchange="retourMois();">
        <option value="mois">Selectionnez le mois</option>
        <?php
            foreach($mois as $mois):
            {
                echo '<option value ="'.$mois['mois'].'">'.$mois['mois'].'</option>';
            }
            endforeach
        ?>
        </select>
        <table 1>
            <thead>
                <th >Frais Forfait </th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                <th id="IdFrais">Id du frais</th>
                <th id="Qte">Quantite</th>
            </tbody>
        </table>
        <table 2>
            <thead>
                <th >Frais Hors Forfait</th>
                <th colspan="3"></th>
            </thead>
            <tbody>
                <th id="libelle">Libelle du frais</th>
                <th id="date">Date </th>
                <th id="montant">Montant</th>
            </tbody>
        </table>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="gsb.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>