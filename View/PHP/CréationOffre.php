<?php
require_once 'connexiondb.php';
require_once '../../controller/controlcreaoffre.php';
session_start();
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $idper=$_SESSION['idper'];
    $id_admin=$_SESSION['id_admin'];
    $id_pil=$_SESSION['id_pil'];
    // echo $role;
    // echo $idper;
    // echo $id_admin;
    // echo $id_pil;
} else {
    echo "Le rôle n'est pas défini.";
}
$secteurs=insertsecteur($pdo);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
offre($pdo,$id_pil,$id_admin);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaoffre.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Créer une Offre</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/creaOffre.js"></script>
</head>
<body>
    <header class="header1">
        <a href="accueil.php">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form method="POST" id="myForm">
            <input type="text" name="ent" placeholder="Nom de l'Entreprise "id="entrepriseI">
            <input type="text" name="intitule" placeholder="Intitulé de l'Offre" id="intituleI">
            <input type="text" name="lvl" placeholder="Niveau Requis" id="lvlI">
            <select name="secteur" id="secteurS" class="select">
            <option value="">Choisissez une option</option>
            <?php foreach ($secteurs as $secteur): ?>
                
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="text" name="nbrPlace" placeholder="Nombre de places "id="nbrPlaceI">
            <input type="text" name="comp_requises" placeholder="Compétences demandées "id="compRequisesI">
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            <button type="button" class="btn-53" onclick="valid()">
               Créer
              </button>
            </form>

             
    </header>
    <header class="creation">
             <p>Création</p>
             <br>
             <p>d'Offre</p>
    </header>
    
</body>
</html>