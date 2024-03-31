<?php
function insertsecteur($pdo){
require_once'../../model/modelsecteur.php';
$secteurs=getsecteur($pdo);
return $secteurs;
}
function offre($pdo,$id_pil,$id_admin){
    require_once'../../model/modelcreaoffre.php';
    insertoffre($pdo,$id_pil,$id_admin);

}
?>