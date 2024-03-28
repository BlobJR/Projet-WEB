<?php
require_once'../../Controller/controlaccueil.php';
require_once 'connexiondb.php';
$offres=insertoff($pdo);
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
                    <input placeholder="Recherche" class="search" type="text" />
                    <button type="submit" class="search-button">
                        <img src="../img/loupe.png" alt="Recherche">
                    </button>
                </div>
                
                
                <div class="menus">
                    <select id="lieu" name="lieu">
                        <option value="lieu">Lieu</option>
                        <option value="ville">Ville</option>
                        <option value="lyon">Lyon</option>
                        <option value="marseille">Marseille</option>
                        <option value="bordeaux">Bordeaux</option>
                    </select>
            
                    <select id="domaine" name="domaine">
                        <option value="domaine">Domaine</option>
                        <option value="generaliste">Géneraliste</option>
                        <option value="btp">BTP</option>
                        <option value="sys">Systèmes embarqués</option>
                    </select>
            
                    <select id="competences" name="competences">
                        <option value="competances">Compétences</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="python">Python</option>
                    </select>
                </div>

            </section>
        </section>
        
        <section class="bottom">
            <?php foreach ($offres as $offre_stage): ?>
                <div class="offre">
                <a href="offres.php?id=<?php echo $offre_stage['id_offre']; ?>" class="offre-link">
                        <div class="midle_content">
                            <h1 class="intitule"><?php echo $offre_stage['intitule']; ?></h1>
                            <p class="info">Niveau requis du poste : <span class="niveau_requis"><?php echo $offre_stage['niveau_requis']; ?></span></p>
                            <p class="info">Domaine du poste : <span class="Domaine"><?php echo $offre_stage['domaine']; ?></span></p>
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
