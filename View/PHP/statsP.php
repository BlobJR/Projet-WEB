<?php
require_once'connexiondb.php';
session_start();
$idper=$_GET['idper'];
$_SESSION['idper']=$idper;
require_once'../../Controller/controlstatsP.php';
$statsP=statsP($pdo,$idper);
$statsPE=statsPE($pdo,$idper);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Supprimer"]) && $_POST["Supprimer"] == "1") {
 
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
    <title>Statistiques</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/statsP.js"></script>
</head>

<body>
  <header class="header1">
    <div class="header11">
        <a href="rechercheP.php">
            <img src="../img/white_back_arrow_logo.png" alt="Logo">
        </a>
    </div>
    <div class="header12">
        <a href="accueil.php">
            <img src="../img/logopng.png" alt="Logo">
          </a>
    </div>
    <div class="header13">
      <a href="compteA.php">
        <img src="../img/compte.png" alt="Logo">
      </a>
    </div>
  </header>
    <header class="header2">
      <form method="POST" id="MS">
        <img src="../img/2354573.png" alt="Logo">
      
        <p><?php echo $statsP['nom']," ",$statsP['prenom']?></p>
        <input type="hidden" name="Supprimer" id="Supprimer"value="0">
      </form>
    </header>
    <header class="header3">
    <p>Adresse mail renseignée</p>
    <span><?php echo $statsP['email'] ?></span>
    <p>Entreprise occupées</p>
    <?php foreach ($statsPE as $statsPES) : ?>
        <span><?php echo $statsPES['nom_ent']; ?></span><br>
    <?php endforeach; ?>
      <button onclick="validM()">Modifier le compte</button>
      <br>
      <button onclick="validS()">Supprimer le compte</button>
    </header>
</body>
</html>