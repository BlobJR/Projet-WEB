<?php
function insertco($pdo){
    require_once'../../model/modelconnexion.php';
    $stmt=getmr($pdo);
try {
            if ($stmt->rowCount() > 0) {
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
               $role = $row["role"];
               $idper = $row["idper"];
               
               // echo "Le rôle de l'utilisateur est : $role";
               switch ($role) {
                   case "Admin":
                    header("Location:../php/compteA.php");
                       $id_admin=getadmin($pdo,$idper);
                       $result = array(
                        'id_admin' => $id_admin,
                        'role' => $role,
                        'idper' => $idper,
                        'id_pil'=>"NULL",
                        'id_etudiant'=>"NULL"
                        );
                        return $result;
                       
                       exit(); 
                       
                   case "Etudiant":
                       header("Location:compteE.php");
                       $id_etudiant=getE($pdo,$idper);
                       $result = array(
                        'id_admin' => "NULL",
                        'role' => $role,
                        'idper' => $idper,
                        'id_pil'=>"NULL",
                        'id_etudiant'=>$id_etudiant
                        );
                        return $result;
                       exit();
                       
                   case "pilote":
                       header("Location:compteP.php");
                       $id_pil=getpil($pdo,$idper);
                       $result = array(
                        'id_pil' => $id_pil,
                        'role' => $role,
                        'idper' => $idper,
                        'id_admin'=>"NULL",
                        'id_etudiant'=>"NULL"
                        );
                        return $result;
                       exit();
                      
                   default:
                       echo "Rôle non reconnu.";
               }
           } else {
            echo '<script>alert("Aucun utilisateurs identifié avec ce mot de passe et cet identifiant ")</script>';
           }
       
   } catch(PDOException $e) {
       echo "Erreur : " . $e->getMessage();
   }
}
?>