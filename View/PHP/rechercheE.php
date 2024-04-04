<?php
require_once '../../controller/controlrechercheE.php';
require_once 'connexiondb.php';
session_start();
if (isset($_POST['idper']) || isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['email'])) {
    $idper = isset($_POST['idper']) ? $_POST['idper'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    
    $_SESSION['idper'] = $idper;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    
    $etudiant = insertER($pdo, $email, $nom, $prenom, $idper); 
    }else {
        $etudiant = insertE($pdo);
    }
if(isset($_POST['modifierBtn']) && isset($_POST['idper'])) {
        $_SESSION['idper'] = $_POST['idper'];
        header("Location: statsE.php");
}
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

    
    <header class="header">        
        <div class="logo">
            <a href="<?php echo $url; ?>">
                <img src="../img/logopngcrop.png" alt="Logo">
            </a>
        </div>
        <div class="account">
        <a href="<?php echo $url; ?>">COMPTE</a>
        </div>

    </header>
    
    <section class="container">

        <section class="top"> 
       
            <div class="menus"> <!-- Menus déroulants -->
                <form action="rechercheE.php" method="POST">
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
                <input type="submit" value="Rechercher" style="margin-left:4vw;border-radius:4vw;height:5vh;padding:1%;cursor:pointer;">
                </form>
            </div>
        </section>
        
        <section class="bottom">
        <?php foreach ($etudiant as $etudiants): ?>
                <div class="offre">
                <a href="rechercheE.php?" class="offre-link" >
                        <div class="midle_content" >
                            <h1 class="intitule">Etudiant</h1>
                            <p class="info">Nom de l'étudiant :  <?php echo $etudiants['nom']; ?></p>
                            <p class="info">Prenom de l'étudiant :  <?php echo $etudiants['prenom'] ?></p>
                            <p class="info">email:  <?php echo $etudiants['email']; ?></p>
                        </div>
                       
                    </a>
                    <form method="POST" >
                        <input type="hidden" name="idper" value="<?php echo $etudiants['idper']; ?>">
                        <button type="submit" name="modifierBtn">modifier</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
        
   

</body>
</html>