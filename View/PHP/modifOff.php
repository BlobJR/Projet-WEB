<?php
require_once 'connexiondb.php';
require_once '../../controller/controlmodifOff.php';
session_start();
$secteurs=insertsecteur($pdo);
$id_offre=$_SESSION['id_offre'];
$offre=insertOff($pdo,$id_offre);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {
    modification($pdo,$id_offre);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaoffre.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Modifier une Offre</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
</head>
<body>
    <header class="header1">
        <a href="accueil.php">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form method="POST" id="myForm">
            <input type="text" name="nom_ent" placeholder="Nom de l'Entreprise "id="entrepriseI" value="<?php echo $offre['nom_ent']?>" readonly>
            <input type="text" name="intitule" placeholder="Intitulé de l'Offre" id="intituleI" value="<?php echo str_replace('?', 'é', $offre['intitule']);?>">
            <input type="text" name="niveau_requis" placeholder="Niveau Requis" id="lvlI" value="<?php echo $offre['niveau_requis']?>">
            <select name="nom_secteur" id="secteurS" class="select">
            <option value="">Choisissez une option </option>
            <?php foreach ($secteurs as $secteur): ?>
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="text" name="nbr_places" placeholder="Nombre de places "id="nbrPlaceI"value="<?php echo $offre['nbr_places']?>">
            <input type="text" name="comp_requises" placeholder="Compétences demandées "id="compRequisesI" value="<?php echo $offre['comp_requises']?>">
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            <button type="button" class="btn-53" onclick="valid()">
               Modifier!
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