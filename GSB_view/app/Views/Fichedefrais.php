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
        <form method="post" action="index.php?action=getData">
        <select id="mois" placeholder="Selectionnez le mois" name="mois" onchange="retourMois();" >
        <option value="mois">Selectionnez le mois</option>
        <?php
            foreach($mois as $mois):
            {
                echo '<option value ="'.$mois->mois.'">'.$mois->mois.'</option>';
            }
            endforeach
        ?>
        </select>
        <input type="submit"value="Valider"/>
        </form>
            <table border="1">
                <thead>
                    <th colspan="2">Frais Forfait </th>
                </thead>
                <tbody>
                    <tr>
                        <td id="IdFrais">Id du frais</td>
                        <td id="Qte">Quantite</td>
                    </tr>
                    <tr>
                        <td id="IdFrais">KM</td>
                        <td id="Qte">
                            <?php
                                if(isset($_SESSION['KM'])){
                                    echo $_SESSION['KM'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="IdFrais">REP</td>
                        <td id="Qte">
                            <?php
                                if(isset($_SESSION['REP'])){
                                    echo $_SESSION['REP'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="IdFrais">NUIT</td>
                        <td id="Qte">
                            <?php
                                if(isset($_SESSION['NUI'])){
                                    echo $_SESSION['NUI'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="IdFrais">ETP</td>
                        <td id="Qte">
                            <?php
                                if(isset($_SESSION['ETP'])){
                                    echo $_SESSION['ETP'];
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table border="1">
                <thead>
                    <td colspan="3">Frais Hors Forfait</td>
                </thead>
                <tbody>
                    <tr>
                        <th id="libelle">Libelle du frais</td>
                        <td id="date">Date </td>
                        <td id="montant">Montant</td>
                    </tr>
                    
                           <?php
                                if(isset($_SESSION['libelle'])){
                                    foreach($_SESSION['libelle'] as $ligne):{
                                       echo "<tr><td>".$ligne->libelle."</td>";
                                       echo "<td>".$ligne->date."</td>";
                                       echo "<td>".$ligne->montant."</td></tr>";
                                    }
                                    endforeach;
                                }
                            ?>
                    
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