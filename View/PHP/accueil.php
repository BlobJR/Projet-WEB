<?php
require_once '../../Model/modelacceuil.php';
require_once 'connexiondb.php';

$offres = getoff($pdo);
$villes = getVille($pdo);
$secteurs = getsecteurs($pdo);
$comp_requises = getcomp($pdo);
$entreprises = getNomEntreprises($pdo); // Utilisation de la nouvelle fonction pour récupérer les noms des entreprises
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
            <a href="indexnv.html">
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
                <form action="recherche.php" method="GET">
                    <input placeholder="Recherche" class="search-bar" type="text" name="query"/>
                    <button type="submit" class="search-button">
                        <img src="../img/loupe.png" alt="Recherche" style="height: 2vh; width: 2vw;"> <!-- Ajustez la taille directement ici -->
                    </button>
                </form>
            </div>
            </section>
            <div class="menus"> <!-- Menus déroulants -->
                <form action="recherche.php" method="GET">
                    <select id="ville" name="ville">
                        <option value="">Ville</option>
                        <?php foreach ($villes as $nom_ville): ?>
                            <option value="<?php echo $nom_ville; ?>"><?php echo $nom_ville; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="secteur" name="secteur">
                        <option value="">Secteur</option>
                        <?php foreach ($secteurs as $secteur): ?>
                            <option value="<?php echo $secteur; ?>"><?php echo $secteur; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="competences" name="competences">
                        <option value="">Compétences</option>
                        <?php foreach ($comp_requises as $comp): ?>
                            <option value="<?php echo $comp; ?>"><?php echo $comp; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="entreprises" name="entreprises"> <!-- Utilisation des noms des entreprises récupérés depuis la nouvelle fonction -->
                        <option value="">Entreprises</option>
                        <?php foreach ($entreprises as $entreprise): ?>
                            <option value="<?php echo $entreprise; ?>"><?php echo $entreprise; ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </section>
        
        <section class="bottom">
            <?php foreach ($offres as $offre_stage): ?>
                <div class="offre">
                    <a href="offres.php?id=<?php echo $offre_stage['id_offre']; ?>" class="offre-link">
                        <div class="midle_content">
                            <h1 class="intitule"><?php echo $offre_stage['intitule']; ?></h1>
                            <p class="info">Nom de l'entreprise : <span class="nom_ent"><?php echo $entreprise[$offre_stage['id_entreprise']]; ?></span></p>
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