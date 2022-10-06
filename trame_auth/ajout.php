<?php
    $page_title="Ajouter un produit";
    include("header.php");
    //Récupération des données
    if (!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte'])|| !isset($_POST['prix'])) {
        include("aj_form.php");
    } else {
        $nom = $_POST['nom'];
        $description= $_POST['description'];
        $qte= $_POST['qte'];
        $prix= $_POST['prix'];
        $ctid= $_POST['ctid'];
    //Vérification des données
        if ($nom =="" || $description =="" || !is_numeric($qte) || !$qte>0 || !is_numeric($prix) || !$prix>0 ) {
            include("aj_form.php"); 
        }else {
    //Insertion des données
        require("db_config.php");
        try {
            $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL = "INSERT INTO produits VALUES (DEFAULT, ?,?,?,?,?,?)";
            $st = $db->prepare($SQL);
            $res = $st->execute(array($nom, $description, $qte, $prix, $idm->getUid(), $ctid));
            if (!$res) {
                echo "Erreur d’ajout";
            }else{ 
                echo "L'ajout a été effectué";
                echo "</br>";
                echo "<a href='index.php'>Revenir</a> à la page de gestion";
                $db=null;
            }
        }catch (PDOException $e){
            echo "Erreur SQL: ".$e->getMessage();
        }
    }
    }
    
    include("footer.php");
?>