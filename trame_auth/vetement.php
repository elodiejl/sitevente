<?php
    include("header.php");
    // connexion à la BD
    require("db_config.php");
    //require("auth/EtreAuthentifie.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $pid=isset($_GET['ctid']) ? $_GET['ctid'] : '';
        $SQL = "SELECT * FROM produits WHERE ctid=2";
        $res = $db->prepare($SQL);
        $res->execute(['ctid']);
        
        if ($res->rowCount()==0){
            echo "<P>Pas de produits";
        }else {
            //echo "<table>";
            
?>
<style type="text/css">
        body {
            padding-top: 70px;
        }
    </style>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home2.php">Buy or Sell</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home2.php" ><span class="glyphicon glyphicon-home"></span></a></li>
                    <li> <a href="vetement.php"> Vêtements </a> </li>
                    <li> <a href="jouets.php">Jouets</a></li>
                    <li> <a href="aliments.php">Aliments</a></li>
                    <form role="search" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" placeholder="Recherche" class="form-control">
                    </div>
                        <button type="submit" class="btn btn- primary"><span class="glyphicon glyphicon- search"></span> Recherche</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="<?= $pathFor['logout'] ?>" title="Logout">Se déconnecter</a></li>
                        <li> <a href="panier.php"><svg class="bi bi-bag" width="2em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd"/>
                            <path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
                            </svg></a>
                        </li>
                    </ul>
                </ul>
            </div>
        
        </div>
    </nav>


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