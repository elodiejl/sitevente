<?php
    // connexion à la BD
    require("db_config.php");
    require_once("auth/EtreAuthentifie.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $pid=isset($_GET['uid']) ? $_GET['uid'] : '';
        $SQL = "SELECT * FROM commande INNER JOIN produits ON commande.pid=produits.pid WHERE produits.uid=".$idm->getUid()." AND commande.statut LIKE 'en_cours'";
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
                    <tr><td>Quantité: $row[qte]</td><td>Date de commande: $row[date]</td></tr>
                    <tr><td>Statut: $row[statut]</td><td><label for='statut'></label>
                                            <select id='statut'>
                                                <option value='acceptee'>accepter</option>
                                                <option value='refusee'>refuser</option>
                                            </select></td>
                                            </tr>";
                }
                echo "<tr><td><div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Valider</button>
                            </div></td>
                                            </tr>";
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
