<?php
session_start();
$role = $_SESSION['role'];
$idper=$_SESSION['idper']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecompteE.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Gestion de compte</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
</head>
<body>
  <header class="header1">
    <div class="header11">
        <a href="Connexion.php">
            <img src="../img/white_back_arrow_logo.png" alt="Logo">
        </a>
    </div>
    <div class="header12">
        <a href="accueil.php">
            <img src="../img/logopng.png" alt="Logo">
          </a>
    </div>
    <div class="header13">
      <a href="#">
        <img src="../img/compte.png" alt="Logo">
      </a>
    </div>
  </header>
    <header class="header2">
        <img src="../img/2354573.png" alt="Logo">
      
      <p>Espace étudiant</p>
    </header>
    <header class="header3">
      
      <button type="button">Ajouter une offre a la wishlist</button>
      <button type="button" onclick="window.location.href = 'Connexion.php'">Se déconnecter</button>
      <button type="button" onclick="window.location.href = 'rechercheEnt.php'">Entreprises</button>
    </header>
</body>
</html> 