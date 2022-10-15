<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gsb.css"/>
    <title>GSB</title>
</head>
<body>
        <nav>
            <div class="profile">
                <a href= "index.html" class="img"><img class="logo" src="image/GSB.png"profile photo></a>
            </div>
            <ul>
                <li><a href="Index.html">Menu</a></li>
                <li><a href="Connexion.php">Connexion / S'enregistrer</a></li>
                <li class="deroulant">Fiche de frais &ensp;</a>
                <ul class="sous">
                    <li><a href="Note.html">Note de frais</a></li>
                    <li><a href="Fichedefrais.html">Voir mes fiches</a></li>
                </ul>
                <li><a href="Contact.html">Contact</a></li>
            </ul>
        </nav>
    <div id="container">
        <!-- zone de connexion -->
        
        <form action="verification.php" method="POST">
            <h1>Connexion</h1>
            
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>
    <div class="popup">
            <button id="btnPop" class="btnPop">S'enregistrer</button>
            <div id="overlay" class="overlay">
                <div id="popup" class="popup">
                    <ul>
                        <span id="btnclose" class="btnclose">&times;</span>
                        <li>Prénom: <input type="text"></li>
                        <li>Nom: <input type="text"></li>
                        <li>Adresse: <input type="text"></li>
                        <li>Ville: <input type="text"></li>
                        <li>Code postale: <input type="number"></li>
                        <li>Login: <input type="text"></li>
                        <li>Mot de passe: <input type="text"></li>
                        <li>Date d'embauche: <input type="date"></li>
                        <button id="popupbtn" class="popupbtn">Valider</button>
                    </ul> 
                </div>
            </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="gsb.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>