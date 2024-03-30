<?php
function insertsecteur($pdo){
require_once'../../Model/modelsecteur.php';
$secteurs=getsecteur($pdo);
return $secteurs;
}
function ent($pdo,$id_pil,$id_admin,$role){
require_once'../../model/modelcreaent.php';
    insertent($pdo,$id_pil,$id_admin);
}
?>