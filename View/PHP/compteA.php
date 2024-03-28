<?php
// Vérifiez si le cookie 'role' est défini avant de l'utiliser
if(isset($_COOKIE['role'])) {
    // Récupérez la valeur du cookie 'role'
    $role = $_COOKIE['role'];
    // Affichez la valeur du rôle
    // echo "Le rôle de l'utilisateur est : $role";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecompteA.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Gestion de compte</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
</head>
<body>
  <header class="header1">
    <div class="header11">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/white_back_arrow_logo.png" alt="Logo">
        </a>
    </div>
    <div class="header12">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
            <img src="../img/logopng.png" alt="Logo">
          </a>
    </div>
    <div class="header13">
      <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/compte.png" alt="Logo">
      </a>
    </div>
  </header>
    <header class="header2">
      
        <img src="../img/2354573.png" alt="Logo">
      
      <p>Espace Administrateur</p>
    </header>
    <header class="header3">
      
      <button type="button">Créer une entreprise</button>
      <button type="button">Gérer une entreprise</button>
      <button type="button">Créer une offre</button>
      <button type="button">Modifier une offre</button>
      <button type="button">Créer un compte étudiant</button>
      <button type="button">Modifier un compte étudiant</button>
      <button type="button">Créer un compte Pilote</button>
      <button type="button">Modifier un compte Pilote</button>
    </header>
</body>
</html> 