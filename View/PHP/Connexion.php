<?php
require_once'connexiondb.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
require_once'../../Controller/controlconnexion.php';
$result=insertco($pdo);
if (!empty($result)){
$role = $result['role'];
$idper = $result['idper'];
$id_admin=$result['id_admin'];
$id_pil=$result['id_pil'];
$id_etudiant=$result['id_etudiant'];
session_start();
$_SESSION['role'] = $role; 
$_SESSION['idper'] = $idper; 
$_SESSION['id_admin'] = $id_admin; 
$_SESSION['id_pil'] = $id_pil;
$_SESSION['id_etudiant'] = $id_etudiant;
$role=$_SESSION['role'];
if ($role === 'Admin') {
    $url = 'compteA.php';
} elseif ($role === 'pilote') {
    $url = 'compteP.php';
} elseif ($role === 'Etudiant') {
    $url = 'compteE.php';
} 
$_SESSION['url']=$url;
}
} 
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleco.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Connexion</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/Connexion.js"></script>
</head>

<body>
    <header class="header1">
        <a href="#">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form method="POST" id="myForm" name="myForm">
            <input type="text" placeholder="Votre Email" name="email" id="emailI" onblur="validemail(this)">
           
            <input type="password" placeholder="Votre Mot de Passe" id="mdpI" name="mdp" >
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            
        </form>
        <span id="mdpmsg" style="margin-bottom: 10vh;"></span>
        <span id="emailmsg" style="margin-bottom: 30vh;"></span>
            <button type="button" class="btn-53" onclick="valid(event)">
                Connexion 
              </button>
           

             
    </header>
    <header class="connexion">
             <p>Connexion</p>
    </header>
    
</body>
</html>