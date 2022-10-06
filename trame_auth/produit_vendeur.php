<?php
    // connexion à la BD
    require("db_config.php");
    
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $pid=isset($_GET['uid']) ? $_GET['uid'] : '';
        $SQL = "SELECT * FROM produits WHERE uid=".$idm->getUid()."";
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
                    <tr><td>Nom: $row[nom]</td></tr><tr><td>Description: $row[description]</td><td></tr>
                    <tr><td>Prix: $row[prix] €</td><td><a href='mod.php?pid=$row[pid]'>modifier</a> </td></tr>
                    <tr><td>Quantité: $row[qte]</td></tr>
                    <tr><td><a href='sup.php?pid=$row[pid]'>supprimer</a></td></tr>";
                }
                echo "<tr><td><a href='ajout.php?pid=$row[pid]'>Ajouter un nouveau produit</a></td></tr>";
                echo "</table>";
                $db=null;
                }
            }catch (PDOException $e){
                echo "Erreur SQL: ".$e->getMessage();
            }
                //echo "<a href='root'>Revenir</a> à la page d'accueil";
            ?>
        
            </table>
        </div>
    </div>
</div>
