<?php
require_once 'connexiondb.php';

// Vérifier si l'identifiant de l'offre est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant de l'offre depuis l'URL
    $offre_id = $_GET['id'];

    try {
        // Requête pour récupérer les détails de l'offre avec l'identifiant spécifié
        $sql = "SELECT * FROM offre_stage WHERE id_offre = :offre_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':offre_id', $offre_id);
        $stmt->execute();

        // Vérifier si l'offre existe
        if ($stmt->rowCount() > 0) {
            // Afficher les détails de l'offre
            $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Si aucune offre ne correspond à l'identifiant spécifié, afficher un message d'erreur
            echo "Aucune offre correspondant à cet identifiant n'a été trouvée.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur lors de l'exécution de la requête SQL, afficher l'erreur
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Si aucun identifiant d'offre n'est présent dans l'URL, afficher un message d'erreur ou rediriger l'utilisateur
    echo "Aucun identifiant d'offre spécifié.";
}
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
            <h2 class="intitule"><?php echo isset($offre['intitule']) ? $offre['intitule'] : ''; ?></h2>
            <span class="ID"><?php echo isset($offre['id_offre']) ? $offre['id_offre'] : ''; ?></span>
            <span class="niveau_requis"><?php echo isset($offre['niveau_requis']) ? $offre['niveau_requis'] : ''; ?></span>
            <span class="domaine"><?php echo isset($offre['domaine']) ? $offre['domaine'] : ''; ?></span>
            <span class="nbr_places"><?php echo isset($offre['nbr_places']) ? $offre['nbr_places'] : ''; ?></span>
            <span class="comp_requises"><?php echo isset($offre['comp_requises']) ? $offre['comp_requises'] : ''; ?></span>
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
