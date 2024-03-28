<?php
require_once 'connexiondb.php';
require_once '../../controller/controlcreaent.php';
$secteurs=insertsecteur($pdo);
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
</head>
<body>
    <header class="header1">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form >
            <input type="text" placeholder="Intitulé de l'Offre" id="nomEntI">
            <input type="text" placeholder="Niveau Requis" id="lvlI">
            <select name="secteur" id="secteurS" class="select">
            <option value="">Choisissez une option</option>
            <?php foreach ($secteurs as $secteur): ?>
                
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="text" placeholder="Nombre de places "id="nbrPlaceI">
            <button class="btn-53">
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