g<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'gsbv2';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM visiteur where 
              login = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // Correct
        {
           $_SESSION['username'] = $username;
           header('Location: note.html');
        }
        else
        {
           // header('Location: '); // Incorrect
        }
    }
    else
    {
      // header('Location: '); // Vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>