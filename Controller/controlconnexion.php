<?php
function insertco($pdo){
try {
       
       
       // echo "La connexion est bonne.<br>"; 

           $email = $_POST['email'];  
           $mdp = $_POST['mdp'];
           echo $email;
          
           $sql = "SELECT role FROM personne WHERE email = :email AND mdp = :mdp";
           $stmt = $pdo->prepare($sql);
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
}
?>