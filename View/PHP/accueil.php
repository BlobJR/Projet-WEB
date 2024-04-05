<?php
require_once '../../controller/controlaccueil.php';
require_once 'connexiondb.php';
session_start();
$url=$_SESSION['url'];
$role=$_SESSION['role'];
if($role="Etudiant"){
    $id_etudiant=$_SESSION['id_etudiant'];
}
if (isset($_POST['ville']) || isset($_POST['secteur']) || isset($_POST['competences']) || isset($_POST['entreprises']) || isset($_POST['id_offre'])|| isset($_POST['query'])) {
    $id_offre = isset($_POST['id_offre']) ? $_POST['id_offre'] : null;
    $ville = isset($_POST['ville']) ? $_POST['ville'] : null;
    $secteur = isset($_POST['secteur']) ? $_POST['secteur'] : null;
    $competences = isset($_POST['competences']) ? $_POST['competences'] : null;
    $entreprises = isset($_POST['entreprises']) ? $_POST['entreprises'] : null;
    $query=isset($_POST['query']) ? $_POST['query'] : null;
    $_SESSION['nom_ent'] = $entreprises;
    $_SESSION['ville'] = $ville;
    $_SESSION['nom_secteur'] = $secteur;
    $_SESSION['comp_requises'] = $competences;
    $_SESSION['id_offre'] = $id_offre;
    $offres = insertoffR($pdo, $ville, $entreprises, $secteur, $id_offre,$competences,$query); 
    }else {
        $offres=insertoff($pdo);
    }
if(isset($_POST['modifierBtn']) && isset($_POST['id_offre'])) {
        $_SESSION['id_offre'] = $_POST['id_offre'];
        header("Location: statsOff.php");
}
if(isset($_POST['ajouterBtn']) && isset($_POST['id_offre'])) {
    $id_offre=$_POST['id_offre'];
    ajouterW($pdo,$id_offre,$id_etudiant);
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
            <a class="account" href="<?php echo $url; ?>">COMPTE</a>
        </div>

    </header>
    
    <section class="container">

        <section class="top"> 
        
            <div class="menus"> <!-- Menus déroulants -->
                <form action="accueil.php" method="POST">
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
                    <input type="submit" value="Rechercher" style="margin-left:4vw;border-radius:4vw;height:5vh;padding:1%;cursor:pointer;">
                </form>
            </div>
        </section>
        
        <section class="bottom">
            <?php foreach ($offres as $offre_stage): ?>
                <div class="offre">
                    <a href="offres.php?kw=<?php echo $offre_stage['id_offre']; ?>" class="offre-link">
                        <div class="midle_content">
                            <h1 class="intitule"><?php echo str_replace('?', 'é', $offre_stage['intitule']); ?></h1>
                            <p class="info">Nom de l'entreprise : <span class="nom_ent"><?php echo $offre_stage['nom_ent'] ?></span></p>
                            <p class="info">Niveau requis du poste : <span class="niveau_requis"><?php echo $offre_stage['niveau_requis']; ?></span></p>
                            <p class="info">Secteur du poste : <span class="secteur"><?php echo $offre_stage['nom_secteur']; ?></span></p>
                            <p class="info">Nombres de places du poste : <span class="nbr_places"><?php echo $offre_stage['nbr_places']; ?></span></p>
                            <p class="info">Compétences requises du poste : <span class="comp_requises"><?php echo $offre_stage['comp_requises']; ?></span></p>
                        </div>
                        
                    </a>
                    <?php if ($role !== 'Etudiant'): ?>
                        <form method="POST">
                            <input type="hidden" name="id_offre" value="<?php echo $offre_stage['id_offre']; ?>">
                            <button type="submit" name="modifierBtn">modifier</button>
                        </form>
                    <?php endif; ?>
                    <?php if ($role == 'Etudiant'): ?>
                        <form method="POST">
                            <input type="hidden" name="id_offre" value="<?php echo $offre_stage['id_offre']; ?>">
                            <button type="submit" name="ajouterBtn">Ajouter a la Wishlist</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        
    </section>

</body>
</html>