<?php
require_once '../../controller/controlaccueil.php';
require_once 'connexiondb.php';
session_start();
$offres=insertoff($pdo);
$url=$_SESSION['url'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LightweightJobs</title>
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
</head>

<body>

    <!-- Header -->
    <header class="header">        

        <div class="logo">
            <a href="<?php echo $url; ?>">
                <img src="../img/logopngcrop.png" alt="Logo">
            </a>
        </div>
        <div class="account">
            <a class="account" href="dashboard.html">COMPTE</a>
        </div>

    </header>
    
    <section class="container">

        <section class="top"> 
        <section class="criteres">
            <div class="search">
                <form action="recherche.php" method="GET" class="search-bar">
                    <input placeholder="Recherche"  type="text" name="query"/>
                </form>
            </div>
            </section>
            <div class="menus"> <!-- Menus déroulants -->
                <form action="recherche.php" method="GET">
                    <select id="ville" name="ville">
                        <option value="">Ville</option>
                        <?php 
                        $villes = array();
                            foreach ($offres as $offre_stage) {
                                if (!isset($villes[$offre_stage['nom_ville']])) {
                                    echo '<option value="' . $offre_stage['nom_ville'] . '">' . $offre_stage['nom_ville'] . '</option>';
                                    $villes[$offre_stage['nom_ville']] = true;
                                }
                    }
                    ?>
                    </select>
                    <select id="secteur" name="secteur">
                        <option value="">Secteur</option>
                        <?php foreach ($offres as $offre_stage): ?>
                            <option value="<?php echo $offre_stage['nom_secteur']; ?>"><?php echo $offre_stage['nom_secteur']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="competences" name="competences">
                        <option value="">Compétences</option>
                        <?php foreach ($offres as $offre_stage): ?>
                            <option value="<?php echo $offre_stage['comp_requises']; ?>"><?php echo $offre_stage['comp_requises']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="entreprises" name="entreprises"> <!-- Utilisation des noms des entreprises récupérés depuis la nouvelle fonction -->
                        <option value="">Entreprises</option>
                        <?php foreach ($offres as $offre_stage): ?>
                            <option value="<?php echo $offre_stage['nom_ent']; ?>"><?php echo $offre_stage['nom_ent']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </section>
        
        <section class="bottom">
            <?php foreach ($offres as $offre_stage): ?>
                <div class="offre">
                    <a href="accueil.php?id=<?php echo $offre_stage['id_offre']; ?>" class="offre-link">
                        <div class="midle_content">
                            <h1 class="intitule"><?php echo $offre_stage['intitule']; ?></h1>
                            <p class="info">Nom de l'entreprise : <span class="nom_ent"><?php echo $offre_stage['nom_ent'] ?></span></p>
                            <p class="info">Niveau requis du poste : <span class="niveau_requis"><?php echo $offre_stage['niveau_requis']; ?></span></p>
                            <p class="info">Secteur du poste : <span class="secteur"><?php echo $offre_stage['nom_secteur']; ?></span></p>
                            <p class="info">Nombres de places du poste : <span class="nbr_places"><?php echo $offre_stage['nbr_places']; ?></span></p>
                            <p class="info">Compétences requises du poste : <span class="comp_requises"><?php echo $offre_stage['comp_requises']; ?></span></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>

        
    </section>

</body>
</html>