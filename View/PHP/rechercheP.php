<?php
require_once '../../controller/controlrechercheP.php';
require_once 'connexiondb.php';
session_start();
$url=$_SESSION['url'];
if (isset($_GET['idper']) || isset($_GET['nom']) || isset($_GET['prenom']) || isset($_GET['email'])) {
    $idper = isset($_GET['idper']) ? $_GET['idper'] : null;
    $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
    $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $pilote = piloteER($pdo,$email,$nom,$prenom,$idper);
} else {
    $pilote = pilote($pdo);
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
                <form action="recherchep.php" method="GET">
                <select id="nom" name="nom" >
                    <option value="">Nom</option>
                    <?php foreach ($pilote  as $pilotes): ?>
                        <option value="<?php echo $pilotes['nom']; ?>"><?php echo $pilotes['nom']; ?></option>
                    <?php endforeach; ?>
                </select>

                
                <select id="prenom" name="prenom">
                    <option value="">Prénom</option>
                    <?php foreach ($pilote as $pilotes): ?>
                        <option value="<?php echo $pilotes['prenom']; ?>"><?php echo $pilotes['prenom']; ?></option>
                    <?php endforeach; ?>
                </select>

               
                <select id="email" name="email">
                    <option value="">Adresse e-mail</option>
                    <?php foreach ($pilote as $pilotes): ?>
                        <option value="<?php echo $pilotes['email']; ?>"><?php echo $pilotes['email']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Rechercher" style="margin-left:4vw;border-radius:4vw;height:5vh;padding:1%;cursor:pointer;">
                </form>
            </div>
        </section>
        
        <section class="bottom">
        <?php foreach ($pilote as $pilotes): ?>
                <div class="offre">
                <a href="rechercheP.php?idper=<?php echo $pilotes['idper']; ?>" class="offre-link" >
                        <div class="midle_content" >
                            <h1 class="intitule">Pilotes</h1>
                            <input type="hidden" name="idper" value="<?php echo $pilotes['idper']; ?>">
                            <p class="info">Nom du Pilote :  <?php echo $pilotes['nom']; ?></p>
                            <p class="info">Prenom du pilote :  <?php echo $pilotes['prenom'] ?></p>
                            <p class="info">email:  <?php echo $pilotes['email']; ?></p>
                        </div>
                       
                    </a>
                    <button type="button" onclick="window.location.href = 'statsP.php?idper=' +<?php echo $pilotes['idper']?>;">modifier</button>
                </div>
            <?php endforeach; ?>
        </section>
        
   

</body>
</html>