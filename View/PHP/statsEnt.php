<?php
require_once'connexiondb.php';
require_once'../../controller/controlstatsEnt.php';
session_start();
$id_entreprise=$_SESSION['id_entreprise'];
$url=$_SESSION['url'];
$statsEnt=statsEnt($pdo,$id_entreprise);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Supprimer"]) && $_POST["Supprimer"] == "1") {
 
  supprimer($pdo,$id_entreprise);
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
    <script src="../js/statsEnt.js"></script>
</head>

<body>
  <header class="header1">
    <div class="header11">
        <a href="rechercheEnt.php">
            <img src="../img/white_back_arrow_logo.png" alt="Logo">
        </a>
    </div>

    <div class="header12">
        <a href="accueil.php">
            <img src="../img/logopng.png" alt="Logo">
          </a>
    </div>
    <div class="header13">
      <a href="<?php echo $url; ?>">
        <img src="../img/compte.png" alt="Logo">
      </a>
    </div>
  </header>
    <header class="header2">
    <form method="POST" id="MS">
        <img src="../img/4091450.png" alt="Logo">
      
      <p><?php echo $statsEnt['nom_ent'] ?></p>
      
        <input type="hidden" name="Supprimer" id="Supprimer"value="0">
      </form>
    </header>
    <header class="header3">
    <p>Adresse renseignée</p>
    <span><?php echo $statsEnt['numero_rue']," ",$statsEnt['nom_rue']," ",$statsEnt['nom_ville']," ",$statsEnt['code_postal'] ?></span>
      <p>Date de création</p>
      <span><?php echo $statsEnt['date_creation'] ?></span>
      <p>Secteur</p>
      <span><?php echo $statsEnt['nom_secteur']?></span>
      <button onclick="validM()">Modifier l'entreprise</button>
      <br>
      <button onclick="validS()">Supprimer l'entreprise'</button>
    </header>
</body>
</html>