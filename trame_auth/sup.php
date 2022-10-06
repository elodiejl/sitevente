<?php
    $page_title = "Suppression de produits";
    include("header.php");

    require("db_config.php");
    $pid = $_GET['pid'];
    
    if (!isset($_GET["pid"])) {
        echo "<p>Erreur</p>\n";
        }else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
            include("del_form.php");
        } else if (isset($_POST["annuler"])){
            echo "Operation annulée</br>";
        }else{
        //suppression
            require("db_config.php");
            try {
                $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $SQL = "DELETE FROM produits WHERE pid=?";
                $st = $db->prepare($SQL);
                $st->execute([$id]);
                if ($st->rowCount() == 0)echo "<p>Erreur de suppression<p>\n";
                else echo "<p>La suppression a été effectuée</p>\n";
                $db=null;
            }catch (PDOException $e){
                echo "Erreur SQL: ".$e->getMessage();
        }
    }
    echo "<a href='home3.php'>Revenir</a> à la page d'accueil";
    include("footer.php");
?>