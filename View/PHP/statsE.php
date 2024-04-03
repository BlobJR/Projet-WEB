<?php
require_once'connexiondb.php';
session_start();
$idper=$_GET['idper'];
$_SESSION['idper']=$idper;
require_once'../../Controller/controlstatsE.php';
$statsE=statsE($pdo,$idper);
$nom=$statsE['nom'];
$prenom=$statsE['prenom'];
$email=$statsE['email'];
$statsP=statsP($pdo,$idper);
$nom_promo=$statsP['nom_promo'];
$niveau_diplome=$statsP['niveau_diplome'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Supprimer"]) && $_POST["Supprimer"] == "1") {
  echo"bite";
  supprimer($pdo,$idper);
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stats.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Connexion</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/statsE.js"></script>
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
      <form method="POST" id="MS">
        <img src="../img/2354573.png" alt="Logo">
      
        <p><?php echo $nom," ",$prenom?></p>
        <input type="hidden" name="Modifier" id="Supprimer" value="0">
        <input type="hidden" name="Supprimer" id="Supprimer"value="0">
      </form>
    </header>
    <header class="header3">
    <p>Adresse mail renseignée</p>
    <span><?php echo $email ?></span>
      <p>Promotions actuellement occupée </p>
      <span><?php echo $nom_promo," ", "Niveau: ",$niveau_diplome?></span>
      <button onclick="validM()">Modifier le compte</button>
      <br>
      <button onclick="validS()">Supprimer le compte</button>
    </header>
</body>
</html>