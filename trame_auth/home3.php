<?php
    require("auth/EtreAuthentifie.php");
    $title = 'Accueil vendeur';
    include("header.php");
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
                <a class="navbar-brand" href="home3.php">Buy or Sell</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home3.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                    <li> <a href="commv.php"> Commande </a> </li>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="<?= $pathFor['logout'] ?>" title="Logout">Se déconnecter</a></li>
                        
                    </ul>
                </ul>
            </div>
        
        </div>
    </nav>
    
    

<?php
    include("produit_vendeur.php");

echo "Hello " . $idm->getIdentity().". Your username is: ". $idm->getUid() .". Your role is: ".$idm->getRole();

//echo "Escaped values: ".$e_($ci->idm->getIdentity());


include("footer.php");
?>