<?php
require_once 'connexiondb.php';
require_once '../../controller/controlmodifEnt.php';
session_start();
$url=$_SESSION['url'];
$id_entreprise=$_SESSION['id_entreprise'];
$secteurs=insertsecteur($pdo);
$entreprise=insertent($pdo,$id_entreprise);
$pr=$entreprise[0];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {

    modification($pdo,$id_entreprise,$pr);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaent.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Modifier une Entreprise</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/modifEnt.js"></script>
</head>

<body>
    <header class="header1">
        <a href="<?php echo $url; ?>">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    
    <header class="header2">
        <form id="myForm" method="POST">
            <input type="text" name="nom_ent" placeholder="Nom de l'Entreprise" id="nomEntI" value="<?php echo $pr['nom_ent']?>">
            <select name="secteur" id="secteurS" class="select">
            <option value="">Choisissez une option</option>
            <?php foreach ($secteurs as $secteur): ?>
                
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="text" name="date" placeholder="Date de création " id="datecreationI"value="<?php echo $pr['date_creation']?>">
            <input type="text" name="adresse" placeholder="Adresse" id="adresseI"value="<?php echo str_replace('?', 'é',$pr['numero_rue']." ".$pr['nom_rue']); ?>">
            <input type="text" name="ville" placeholder="Ville" id="villeI" onblur="getcp()" value="<?php echo $pr['nom_ville']?>">
            <input type="text" name="cp" placeholder="Code Postal" id="cpI"value="<?php echo $pr['code_postal']?>">
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            <button type="button" class="btn-53" onclick="validS()">
              Modifier !
              </button>
              <p> * Tous les champs sont nécéssaires</p>
            </form>

             
    </header>
    <header class="creation">
             <p>Modification</p>
             <p>d'Entreprise</p>
    </header>
    
</body>
</html>