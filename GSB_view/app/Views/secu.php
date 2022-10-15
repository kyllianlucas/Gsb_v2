<?php
htmlspecialchars();
    // Varibale d'erreur par soucis de lisibilité
    // Evite d'imbriquer trop de if/else, on pourrait aisément s'en passer
    $error=false;
    // On définis nos constantes
    $newName=bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $path="/upload" $legalExtensions=array("JPG", "PNG", "GIF", "TXT");
    $legalSize="10000000"// 10000000 Octets = 10 MO
    //On récupères les infos
    $file=$_FILES["MY_FILE"];
    $actualName=$file['tmp_name'];
    $actualSize=$file['size'];
    $extension=pathinfo($file['MY_FILE'], PATHINFO_EXTENSION);
    // On s'assure que le fichier n'est pas vide
    if($actualName==0||$actualSize==0){$error=true;}
    // On vérifie qu'un fichier portant le même nom n'est pas présent sur le serveur
    if(file_exists($path.'/'.$newName.'.'.$extension)){
        $error=true;
    }
    // On effectue nos vérifications réglementaires
    if(!$error){
        if($actualSize<$legalSize){
            if(in_array($extension, $legalExtensions)){
                move_uploaded_file($actualName, $path.'/'.$newName.'.'.$extension);
            }
        }
    }
    else{
        // On supprime le fichier du serveur
        @unlink($path.'/'.$newName.'.'.$extension);
        echo"Une erreur s'est produite";
    }
?>