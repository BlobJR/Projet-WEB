<?php
$serveur = "localhost";
$utilisateur = "root";
$mdp = ""; 
$base_de_donnees = "projet";
// Connexion à la base de données
$pdo =new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mdp);

// Requête pour récupérer tous les secteurs
$query = "SELECT nom_secteur FROM secteur";
$stmt = $pdo->prepare($query);
$stmt->execute();
$secteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaent.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Créer une Entreprise</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/creatent.js"></script>
</head>

<body>
    <header class="header1">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    
    <header class="header2">
        <form >
            <input type="text" placeholder="Nom de l'Entreprise" id="nomEntI">
            <select name="role" id="roleSelect" class="select">
            <?php foreach ($secteurs as $secteur): ?>
            <option value="<?php echo $secteur['nom_secteur']; ?>"><?php echo $secteur['nom_secteur']; ?></option>
        <?php endforeach; ?>
            </select>
            <input type="text" placeholder="Date de création " id="datecreationI">
            <input type="text" placeholder="Adresse" id="adresseI">
            <input type="text" placeholder="Ville" id="villeI">
            <input type="text" placeholder="Code Postal" id="cpI">
            <button type="button" class="btn-53" onclick="validI()">
              Créer
              </button>
            </form>

             
    </header>
    <header class="creation">
             <p>Création</p>
             <p>d'Entreprise</p>
    </header>
    
</body>
</html>