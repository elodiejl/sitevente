<?php
    
    
if (isset($_GET['recherche']) AND $_GET["recherche"] == "Rechercher"){
    require("db_config.php");
    //require("auth/EtreAuthentifie.php");
    $_GET["mot"] = htmlspecialchars($_GET["mot"]); //pour sécuriser le formulaire contre les failles html
    $mot = $_GET["mot"];
    if (isset($mot)){
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        
        $SQL = "SELECT * FROM categories JOIN produits ON categories.ctid=produits.ctid JOIN users ON produits.uid=users.uid WHERE produits.nom LIKE ? OR produits.description LIKE ? OR categories.nom LIKE ? OR users.nom LIKE ? ";
        $res = $db->prepare($SQL);
        $res->execute(array("%".$mot."%", "%".$mot."%","%".$mot."%","%".$mot."%"));
        
        if ($res->rowCount()==0){
            echo "<P>Pas de résultats <a href='home2.php'>Revenir</a> à la page d'accueil";
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
                echo "<a href='home2.php'>Revenir</a> à la page d'accueil";
            ?>
        
            </table>
        </div>
    </div>
</div>
<?php
    }
}else{
    echo "pas de résultats ";
    echo "<a href='home2.php'>Revenir</a> à la page d'accueil";
}