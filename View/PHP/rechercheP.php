<?php
require_once '../../controller/controlrechercheP.php';
require_once 'connexiondb.php';
session_start();
$url=$_SESSION['url'];
if (isset($_POST['idper']) || isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['email'])) {
    $idper = isset($_POST['idper']) ? $_POST['idper'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    
    $_SESSION['idper'] = $idper;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    
    $pilote = piloteER($pdo, $email, $nom, $prenom, $idper); 
    }else {
        $pilote = pilote($pdo);
    }
if(isset($_POST['modifierBtn']) && isset($_POST['idper'])) {
        $_SESSION['idper'] = $_POST['idper'];
        header("Location: statsP.php");
}

 
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>l</title>
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
                <form action="rechercheP.php" method="POST">
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
                <a href="rechercheP.php?" class="offre-link" >
                        <div class="midle_content" >
                            <h1 class="intitule">Pilotes</h1>
                            <p class="info">Nom du Pilote :  <?php echo $pilotes['nom']; ?></p>
                            <p class="info">Prenom du pilote :  <?php echo $pilotes['prenom'] ?></p>
                            <p class="info">email:  <?php echo $pilotes['email']; ?></p>
                        </div>
                       
                    </a>
                    <form method="POST" >
                        <input type="hidden" name="idper" value="<?php echo $pilotes['idper']; ?>">
                        <button type="submit" name="modifierBtn">modifier</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
        
   

</body>
</html>