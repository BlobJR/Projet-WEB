<?php
require_once '../../controller/controlrechercheE.php';
require_once 'connexiondb.php';
session_start();
if (isset($_GET['idper']) || isset($_GET['nom']) || isset($_GET['prenom']) || isset($_GET['email'])) {
    $idper = isset($_GET['idper']) ? $_GET['idper'] : null;
    $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
    $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $etudiant = insertER($pdo,$email,$nom,$prenom,$idper);
} else {
    $etudiant = insertE($pdo);
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
       
            <div class="menus"> <!-- Menus déroulants -->
                <form action="rechercheE.php" method="GET">
                <select id="nom" name="nom" >
                    <option value="">Nom</option>
                    <?php foreach ($etudiant  as $etudiants): ?>
                        <option value="<?php echo $etudiants['nom']; ?>"><?php echo $etudiants['nom']; ?></option>
                    <?php endforeach; ?>
                </select>

                
                <select id="prenom" name="prenom">
                    <option value="">Prénom</option>
                    <?php foreach ($etudiant as $etudiants): ?>
                        <option value="<?php echo $etudiants['prenom']; ?>"><?php echo $etudiants['prenom']; ?></option>
                    <?php endforeach; ?>
                </select>

               
                <select id="email" name="email">
                    <option value="">Adresse e-mail</option>
                    <?php foreach ($etudiant as $etudiants): ?>
                        <option value="<?php echo $etudiants['email']; ?>"><?php echo $etudiants['email']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Rechercher" style="margin-left:4vw;border-radius:4vw;heigth:5vh;padding:1%;cursor:pointer;">
                </form>
            </div>
        </section>
        
        <section class="bottom">
        <?php foreach ($etudiant as $etudiants): ?>
                <div class="offre">
                <a href="rechercheE.php?idper=<?php echo $etudiants['idper']; ?>" class="offre-link" >
                        <div class="midle_content" >
                            <h1 class="intitule">Etudiant</h1>
                            <input type="hidden" name="idper" value="<?php echo $etudiants['idper']; ?>">
                            <p class="info">Nom de l'étudiant :  <?php echo $etudiants['nom']; ?></p>
                            <p class="info">Prenom de l'étudiant :  <?php echo $etudiants['prenom'] ?></p>
                            <p class="info">email:  <?php echo $etudiants['email']; ?></p>
                        </div>
                       
                    </a>
                    <button type="button" onclick="window.location.href = 'statsE.php?idper=' +<?php echo $etudiants['idper']?>;">modifier</button>
                </div>
            <?php endforeach; ?>
        </section>
        
   

</body>
</html>