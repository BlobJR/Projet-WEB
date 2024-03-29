<?php
require_once 'connexiondb.php';
require_once '../../controller/controlcreaent.php';
$secteurs=insertsecteur($pdo);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
    insertent($pdo);
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
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
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