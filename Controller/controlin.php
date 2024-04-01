<?php
function inscription($pdo,$id_pil,$id_admin){
    require_once'../../model/modelinscription.php';
    insertto($pdo,$id_pil,$id_admin);
}
function promo($pdo){
    require_once'../../model/modelinscription.php';
    $promotions=getpromo($pdo);
    return $promotions;
}
?>