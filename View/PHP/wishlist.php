<?php
require_once '../../controller/controlwishlist.php';
require_once 'connexiondb.php';
session_start();
$url=$_SESSION['url'];
$role=$_SESSION['role'];
$id_etudiant=$_SESSION['id_etudiant'];
$offres=insertoff($pdo,$id_etudiant);
if(isset($_POST['supprimerBtn']) && isset($_POST['id_offre'])) {
    $id_offre= $_POST['id_offre'];
    supprimer($pdo,$id_offre,$id_etudiant);
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
        <h1>WishList</h1>
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
                    <form method="POST">
                            <input type="hidden" name="id_offre" value="<?php echo $offre_stage['id_offre']; ?>">
                            <button type="submit" name="supprimerBtn">Supprimer de la liste</button>
                    </form>
                   
                </div>
            <?php endforeach; ?>
        </section>

        
    </section>

</body>
</html>