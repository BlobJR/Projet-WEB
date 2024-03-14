<?php
require_once'connexiondb.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
   $mail=$_POST['mail'];
   $mdp=$_POST['mdp'];
   $nom=$_POST['nom'];
   $prenom=$_POST['prenom'];
   $query_check = "SELECT * FROM personne WHERE email=:email";
    $stmt_check = $pdo->prepare($query_check);
    $stmt_check->bindParam(':email', $mail);
    $stmt_check->execute();
    if($stmt_check->rowCount()>0){
        echo "<script>alert('email deja utilisé');</script>";
    }else{
        $role=$_POST['role'];
        if($role==="etudiant"){
            $role="Etudiant";
        }
        $query_insert = "INSERT INTO personne (nom, prenom,email,mdp,role) VALUES (:nom, :prenom, :mail, :mdp, :role)";
        $stmt_insert = $pdo->prepare($query_insert);
        $stmt_insert->bindParam(':nom', $nom);
        $stmt_insert->bindParam(':prenom', $prenom);
        $stmt_insert->bindParam(':mail', $mail);
        $stmt_insert->bindParam(':mdp', $mdp);
        $stmt_insert->bindParam(':role', $role);
        $stmt_insert->execute();
        header("Location: compteA.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylein.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Inscription</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/inscription.js"></script>
</head>

<body>
    <header class="header1">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
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
            <select name="role" id="roleSelect" class="select">
                <option value="pilote">Pilote</option>
                <option value="etudiant">Étudiant</option>
            </select>
        </form>
        <span id="mdpmsg" style="margin-bottom: 10vh;"></span>
        <span id="emailmsg" style="margin-bottom: 60vh;"></span>
      
        <button class="btn-53" onclick="valid()">
            Inscription
          </button>
          <p> * Tous les champs sont nécéssaires</p>
    </header>
    <header class="inscription">
             <p>Espace Inscription</p>
    </header>
   
</body>
</html>