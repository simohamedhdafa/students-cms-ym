<?php

  require_once 'utils.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // comment !
    if(isset($_POST["submit"])) {
      /*
      afficher($_POST);
      afficher($_FILES);
      */
      //die('continu apres affichage des superglobales');

      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . "." . '<br>';
        $uploadOk = 1;
      } else {
        echo "File is not an image." . '<br>';
        $uploadOk = 0;
      }
    }

    $nom = addslashes(htmlentities($_POST['nom']));
    $prenom = addslashes(htmlentities($_POST['prenom']));
    $jour  = addslashes(htmlentities($_POST['jour']));
    $mois  = date_parse(addslashes(htmlentities($_POST['mois'])))['month'];
    $annee = addslashes(htmlentities($_POST['annee']));
    $email = addslashes(htmlentities($_POST['edresse']));

    $dateOk = verifier($jour, $mois, $annee);

    if($dateOk){
      echo 'date valide';
    }else{
      echo 'date non valide';
    }

    die('Continu ...');

    // nom et prenom doivent etre alphabetiques !
    $target_photo = "medias/photos/" . $nom . $prenom . $jour . $mois .$annee;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_photo)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
   
      
    ?>
</body>
</html>