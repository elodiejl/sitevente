<?php
    // connexion à la BD
    require("db_config.php");
    //require("auth/EtreAuthentifie.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $pid=isset($_GET['pid']) ? $_GET['pid'] : '';
        $SQL = "SELECT * FROM produits";
        $res = $db->prepare($SQL);
        $res->execute(['pid']);
        
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
                    echo "<tr><td> <img src='gris_010.jpg'</td></tr>
                    <tr><td>$row[nom]</td></tr><tr><td>$row[description]</td><td><a href='panier.php?action=ajout&amp;l=$row[nom]&amp; q=QUANTITEPRODUIT&amp; p=$row[prix]' onclick='window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;'>Ajouter au panier</a> </tr>
                    <tr><td>$row[prix] €</td></tr>";
                }
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



