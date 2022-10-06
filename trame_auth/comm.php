<?php
    // connexion à la BD
    require("db_config.php");
    require("auth/EtreAuthentifie.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $pid=isset($_GET['uid']) ? $_GET['uid'] : '';
        $SQL = "SELECT * FROM commande INNER JOIN produits ON commande.pid=produits.pid WHERE commande.uid=".$idm->getUid()."";
        $res = $db->prepare($SQL);
        $res->execute(['uid']);
        
        if ($res->rowCount()==0){
            echo "<P>Pas de produits";
        }else {
            //echo "<table>";
            
?>


<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <table >

            <?php
                foreach($res as $row) {
                    echo "
                    <tr><td>Produit: $row[nom]</td>
                    <tr><td>Quantité: $row[qte]</td><td>Date de commande: $row[date]</td><td><td>Statut de la commande: $row[statut]</td></tr>";
                }
                echo "</table>";
                $db=null;
                }
            }catch (PDOException $e){
                echo "Erreur SQL: ".$e->getMessage();
            }
                echo "<a href='home2.php'>Revenir</a> à la page d'accueil";
            ?>
        
            </table>
        </div>
    </div>
</div>
