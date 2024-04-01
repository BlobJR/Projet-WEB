<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="../css/accueil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .offre {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .intitule {
            font-size: 24px;
            color: #333;
            margin-top: 0;
        }

        .info {
            color: #666;
            margin-bottom: 10px;
        }

        .info span {
            font-weight: bold;
            color: #333;
        }

        .offre-link {
            text-decoration: none;
            color: inherit;
        }

        .no-result {
            text-align: center;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Résultats de la recherche</h1>

    <?php
    require_once '../../Model/modelacceuil.php';
    require_once 'connexiondb.php';

    try {
        // Récupérer les données du formulaire
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        $ville = isset($_GET['ville']) ? $_GET['ville'] : '';
        $secteur = isset($_GET['secteur']) ? $_GET['secteur'] : '';
        $competences = isset($_GET['competences']) ? $_GET['competences'] : '';

        // Effectuer la recherche
        $offres = rechercherOffres($pdo, $query, $ville, $secteur, $competences);

        // Vérifier si des offres ont été retournées
        if (!empty($offres) && is_array($offres)) {
            foreach ($offres as $offre_stage):
                ?>
                <div class="offre">
                    <a href="offres.php?id=<?php echo $offre_stage['id_offre']; ?>" class="offre-link">
                        <div class="midle_content">
                            <h2 class="intitule"><?php echo $offre_stage['intitule']; ?></h2>
                            <p class="info">Nom de l'entreprise : <span><?php echo $offre_stage['nom_ent']; ?></span></p>
                            <p class="info">Niveau requis du poste : <span><?php echo $offre_stage['niveau_requis']; ?></span></p>
                            <p class="info">Secteur du poste : <span><?php echo $offre_stage['nom_secteur']; ?></span></p>
                            <p class="info">Nombre de places du poste : <span><?php echo $offre_stage['nbr_places']; ?></span></p>
                            <p class="info">Compétences requises du poste : <span><?php echo $offre_stage['comp_requises']; ?></span></p>
                        </div>
                    </a>
                </div>
            <?php endforeach;
        } else {
            echo "<p class='no-result'>Aucun résultat trouvé.</p>";
        }
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
    ?>

</div>

</body>
</html>