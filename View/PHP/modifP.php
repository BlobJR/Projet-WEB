<?php
require_once'connexiondb.php';
require_once '../../Controller/controlmodifP.php';
session_start();
$url=$_SESSION['url'];
$idper=$_SESSION['idper'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
    modification($pdo,$idper);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylein.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Modifier Etudiant</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/modifE.js"></script>
</head>

<body>
    <header class="header1">
        <a href="<?php echo $url; ?>">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form method="POST" name="myForm" id="myForm" style="margin-top: 4vh;">
            <input type="text" name="mail" placeholder="Votre Email" id="emailI" onblur="verifmail(this)">
            <input type="password" name="mdp" placeholder="Votre Mot de Passe" id="mdpI">
            <input type="text" name="nom" placeholder="Votre Nom" id="nomI">
            <input type="text" name="prenom" placeholder="Votre Prenom" id="prenomI">
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            

        </form>
        <span id="mdpmsg" style="margin-bottom: 10vh;"></span>
        <span id="emailmsg" style="margin-bottom: 60vh;"></span>
      
        <button class="btn-53" onclick="validS()">
            Modifier !
          </button>
          <p> * Tous les champs sont nécéssaires</p>
    </header>
    <header class="inscription">
             <p>Espace Modification</p>
    </header>
   
</body>
</html>