<?php
require_once'connexiondb.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formValidated"]) && $_POST["formValidated"] == "1") {


    try {
       
       
        // echo "La connexion est bonne.<br>"; 

            $email = $_POST['email'];  
            $mdp = $_POST['mdp'];
            echo $email;
           
            $sql = "SELECT role FROM personne WHERE email = :email AND mdp = :mdp";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mdp', $mdp); 
            $stmt->execute();

            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $role = $row["role"];
                // echo "Le rôle de l'utilisateur est : $role";
                switch ($role) {
                    case "Admin":
                        header("Location:../HTML/compteA.php");
                        setcookie("role", "$role", time() + (86400 * 30), "/");
                        exit(); 
                        
                    case "Etudiant":
                        header("Location: ../HTML/compteE.php?role=Etudiant");
                        exit();
                        
                    case "Pilote":
                        header("Location: lien_vers_page_pilote.php?role=Pilote");
                        exit();
                       
                    default:
                        echo "Rôle non reconnu.";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cet e-mail et ce mot de passe.";
            }
        
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Les champs email et mdp ne sont pas définis dans le formulaire.";
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleco.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Connexion</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/Connexion.js"></script>
</head>

<body>
    <header class="header1">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    <header class="header2">
        <form method="POST" id="myForm" name="myForm">
            <input type="text" placeholder="Votre Email" name="email" id="emailI" onblur="validemail(this)">
           
            <input type="password" placeholder="Votre Mot de Passe" id="mdpI" name="mdp" >
            <input type="hidden" name="formValidated" id="formValidated" value="0">
            
        </form>
        <span id="mdpmsg" style="margin-bottom: 10vh;"></span>
        <span id="emailmsg" style="margin-bottom: 30vh;"></span>
            <button type="button" class="btn-53" onclick="valid(event)">
                Connexionn 
              </button>
           

             
    </header>
    <header class="connexion">
             <p>Connexion</p>
    </header>
    
</body>
</html>