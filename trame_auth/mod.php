<?php
    $page_title="Modifier un produit";
    include("header.php");

    if (!isset($_GET["uid"])) {
        echo "<p>Erreur<p>\n";
    }else {
        try {
            $pid = $_GET["uid"];
            require("db_config.php");
            $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // vérification existence id
            $SQL = "SELECT * FROM produits WHERE uid=:uid";
            $st = $db->prepare($SQL);
            $st->execute(['uid'=> $uid]);
            if ($st->rowCount() ==0) {
                echo "<p>Erreur dans pid</p>\n";
            } else if (!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte']) || !isset($_POST['prix'])){
                include("mod_form.php");
            } else {
                $nom = $_POST['nom'];
                $description= $_POST['description'];
                $qte= $_POST['qte'];
                $prix= $_POST['prix'];
                if ($nom=="" || $description=="" || !is_numeric($qte) || !$qte>0 || !is_numeric($prix) || !$prix>0) {
                    include("mod_form.php");
                }else{
                    // affichage du formulaire et modification
                    $SQL = "UPDATE produits SET nom=?, description=?, qte=?, prix=? WHERE uid=? ";
                    $st = $db->prepare($SQL);
                    $res = $st->execute(array($nom, $description, $qte, $prix));
                        if (!$res) echo "<p>Erreur de modification</p>";
                        else echo "<p>La modification a été effectuée</p>";
                }
            }
            
            $db=null;
            }catch (PDOException $e){
            echo "Erreur SQL: ".$e->getMessage();
        }
    }
    echo "<a href='home3.php'>Revenir</a> à la page d'accueil";
    include("footer.php");
?>