<?php
require_once '../../controller/controlrechercheEnt.php';
require_once 'connexiondb.php';
session_start();
$role=$_SESSION['role'];
if (isset($_GET['id_entreprise']) || isset($_GET['nom_ent']) || isset($_GET['ville']) || isset($_GET['secteur'])) {
    $id_entreprise = isset($_GET['id_entreprise']) ? $_GET['id_entreprise'] : null;
    $nom_ent = isset($_GET['nom_ent']) ? $_GET['nom_ent'] : null;
    $nom_secteur = isset($_GET['nom_secteur']) ? $_GET['nom_secteur'] : null;
    $nom_ville = isset($_GET['nom_ville']) ? $_GET['nom_ville'] : null;
    $entreprises = insertEntR($pdo,$id_entreprise,$nom_ent,$nom_ville,$nom_secteur);
} else {
    $entreprises = insertEnt($pdo);
    
}


 
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LightweightJobs</title>
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <script src="../js/rechercheEnt.js"></script>
</head>

<body>

    
    <header class="header">        

        <div class="logo">
            <a href="<?php echo $url; ?>">
                <img src="../img/logopngcrop.png" alt="Logo">
            </a>
        </div>
        <div class="account">
            <a class="account" href="<?php echo $url; ?>">COMPTE</a>
        </div>

    </header>
    
    <section class="container">

        <section class="top"> 
       
            <div class="menus"> <!-- Menus déroulants -->
                <form action="rechercheEnt.php" method="GET">
                <select id="nom_ent" name="nom_ent" >
                    <option value="">Nom</option>
                    <?php foreach ($entreprises  as $entreprise): ?>
                        <option value="<?php echo $entreprise['nom_ent']; ?>"><?php echo $entreprise['nom_ent']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="ville" name="ville">
                    <option value="">Ville</option>
                    <?php 
                    $villes = array();
                    foreach ($entreprises as $entreprise) {
                        if (!isset($villes[$entreprise['nom_ville']])) {
                            echo '<option value="' . $entreprise['nom_ville'] . '">' . $entreprise['nom_ville'] . '</option>';
                            $villes[$entreprise['nom_ville']] = true;
                        }
                    }
                    ?>

                </select>
                <select id="secteur" name="nom_secteur">
                    <option value="">Secteur</option>
                    <?php 
                    $secteurs = array();
                    foreach ($entreprises as $entreprise) {
                        if (!isset($secteurs[$entreprise['nom_secteur']])) {
                            echo '<option value="' . $entreprise['nom_secteur'] . '">' . $entreprise['nom_secteur'] . '</option>';
                            $secteurs[$entreprise['nom_secteur']] = true;
                        }
                    }
                    ?>
                </select>

               
                <input type="submit" value="Rechercher" style="margin-left:4vw;border-radius:4vw;height:4vh;width:10vw;padding:1%;cursor:pointer;">
                </form>
            </div>
        </section>
        
        <section class="bottom">
        <?php foreach ($entreprises as $entreprise): ?>
                <div class="offre">
                <a href="rechercheEnt.php?id_entreprise=<?php echo $entreprise['id_entreprise']; ?>" class="offre-link">
                        <div class="midle_content" >
                            <h1 class="intitule">Entreprise</h1>
                            <p class="info">Nom de l'entreprise :  <?php echo $entreprise['nom_ent']; ?></p>
                            <p class="info">Addresse : <?php echo str_replace('?', 'é', $entreprise['numero_rue']) . " " . str_replace('?', 'é', $entreprise['nom_rue']); ?></p>
                            <p class="info">Ville:  <?php echo $entreprise['nom_ville']; ?></p>
                            <p class="info">Secteur:  <?php echo $entreprise['nom_secteur']; ?></p>
                            <p class="info">Note:  <?php echo $entreprise['note']; ?></p>
                            <p class="info">Date de création:  <?php echo $entreprise['date_creation']; ?></p>
                        </div>
                       
                    </a>
                    <?php
                    if ($role != 'Etudiant') {
                        echo '<button type="button" onclick="window.location.href = \'statsEnt.php?id_entreprise=' . $entreprise['id_entreprise'] . '\';">modifier</button>';
                    }
                    ?>
                     <button id="evaluerBtn" onclick="noteappear()">Evaluer l'entreprise</button>
                    <div id="noteInput" style="display: none;width:10vw;">
                        <input type="number" id="note" placeholder="Entrez votre note" min="0" max="e" style="height:4vh;margin-left:1vw;">
                        <button id="validerNote" onclick="validN()">Valider</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        
   

</body>
</html>