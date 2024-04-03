<?php
require_once'connexiondb.php';
require_once'../../controller/controlstatsEnt.php';
session_start();
$id_entreprise=$_GET['id_entreprise'];
$statsEnt=statsEnt($pdo,$id_entreprise);
$nom_ent=$statsEnt['nom_ent'];

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stats.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Statistiques</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/Connexion.js"></script>
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
      
      <p><?php echo $nom_ent ?></p>
    </header>
    <header class="header3">
    <p>Adresse renseignée</p>
    <span><?php echo $statsEnt['numero_rue']," ",$statsEnt['nom_rue']," ",$statsEnt['nom_ville']," ",$statsEnt['code_postal'] ?></span>
      <p>Date de création</p>
      <span><?php echo $statsEnt['date_creation'] ?></span>
      <p>Secteur</p>
      <span><?php echo $statsEnt['nom_secteur']?></span>
      <button onclick="validM()">Modifier le compte</button>
      <br>
      <button onclick="validS()">Supprimer le compte</button>
    </header>
</body>
</html>