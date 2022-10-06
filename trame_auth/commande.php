<?php
    include("header.php");
    $title='commande à valider';
    //require("auth/EtreAuthentifie.php");
    require("fonctions-panier.php");

$statut="en_cours";

try {
    $SQL = "INSERT INTO commande(pid,uid,qte,statut) VALUES (:pid,:".$idm->getUid().",:".$_POST($_SESSION['panier']['qteProduit'][$i]).",:".$statut.")";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    echo "Utilisateur $clearData[nom] : " . $id . " ajouté avec succès.";
    
} catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}
redirect("home2.php");

      
include("footer.php");
?>