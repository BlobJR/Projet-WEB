<?php
require_once'connexiondb.php';
session_start();
$url=$_SESSION['url'];
$id_offre=$_SESSION['id_offre'];
require_once'../../Controller/controlstatsOff.php';
$statsoff=statsoff($pdo,$id_offre);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Supprimer"]) && $_POST["Supprimer"] == "1") {
 
  supprimer($pdo,$id_offre);
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
    <script src="../js/statsOff.js"></script>
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
        <img src="../img/6416420.png" alt="Logo">
      
        <p><?php echo str_replace('?', 'é', $statsoff['intitule']);?></p>
        <input type="hidden" name="Supprimer" id="Supprimer"value="0">
      </form>
    </header>
    <header class="header3">
    <p>Ville</p>
    <span><?php echo $statsoff['nom_ville'] ?></span>
    <p>Informations</p>
    <span> Entreprise: <?php echo $statsoff['nom_ent']; ?></span><br>
    <span> Secteur: <?php echo $statsoff['nom_secteur']; ?></span><br>
    <span> Compétences requises: <?php echo $statsoff['comp_requises']; ?></span><br>
      <button onclick="validM()">Modifier le compte</button>
      <br>
      <button onclick="validS()">Supprimer le compte</button>
    </header>
</body>
</html>