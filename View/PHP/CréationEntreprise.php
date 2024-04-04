<?php
require_once 'connexiondb.php';
require_once '../../controller/controlcreaent.php';
session_start();
$url=$_SESSION['url'];
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $idper=$_SESSION['idper'];
    $id_admin=$_SESSION['id_admin'];
    $id_pil=$_SESSION['id_pil'];
   
} else {
    echo "Le rôle n'est pas défini.";
}
$secteurs=insertsecteur($pdo);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
    ent($pdo,$id_pil,$id_admin,$role);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaent.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Créer une Entreprise</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/creatent.js"></script>
</head>

<body>
    <header class="header1">
        <a href="<?php echo $url; ?>">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    
    <header class="header2">
        <form id="myForm" method="POST">
            <input type="text" name="nom_ent" placeholder="Nom de l'Entreprise" id="nomEntI">
            <select name="secteur" id="secteurS" class="select">
            <option value="">Choisissez une option</option>
            <?php foreach ($secteurs as $secteur): ?>
                
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="text" name="date" placeholder="Date de création " id="datecreationI">
            <input type="text" name="adresse" placeholder="Adresse" id="adresseI">
            <input type="text" name="ville" placeholder="Ville" id="villeI" onblur="getcp()">
            <input type="text" name="cp" placeholder="Code Postal" id="cpI">
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            <button type="button" class="btn-53" onclick="validI()">
              Créer
              </button>
              <p> * Tous les champs sont nécéssaires</p>
            </form>

             
    </header>
    <header class="creation">
             <p>Création</p>
             <p>d'Entreprise</p>
    </header>
    
</body>
</html>