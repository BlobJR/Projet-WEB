<?php
require_once 'connexiondb.php';
require_once '../../Controller/controlOff.php';
$id_offre = $_GET['kw'];

$offre=insertOff($pdo,$id_offre)

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre</title>
    <link rel="stylesheet" href="../css/offres.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
</head>
<body>

    <!-- Header -->
    <header class="header">     
        <div class="login-button">
            <a class="retour" href="accueil.html">RETOUR</a>
        </div>   
        <div class="logo">
            <a href="indexnv.html">
                <img src="../img/logopngcrop.png" alt="Logo">
            </a>
        </div>
    </header>

    <section class="offre">
        <section class="left">
            <h2 class="intitule"> <?php echo  str_replace('?', 'é', $offre['intitule']); ?></h2>
            <span class="nbr_places">Nombres de Places: <?php  echo  str_replace('?', 'é', $offre['nbr_places']);  ?></span>
            <span class="niveau_requis">Niveau Requis: <?php echo  str_replace('?', 'é', $offre['niveau_requis']);  ?></span>
            <span class="comp_requises">Compétences: <?php  echo  str_replace('?', 'é', $offre['comp_requises']);  ?></span>
        </section>
        <section class="right">
            <label for="cv-upload" class="custom-file-upload">
                <i class="fas fa-cloud-upload-alt"></i> Charger un CV
            </label>
            <input id="cv-upload" type="file" style="display:none;">
            <label for="motivation-letter-upload" class="custom-file-upload">
                <i class="fas fa-cloud-upload-alt"></i> Charger une lettre de motivation
            </label>
            <input id="motivation-letter-upload" type="file" style="display:none;">
            <button class="bouton">Postuler</button>
        </section>
    </section>

</body>
</html>
