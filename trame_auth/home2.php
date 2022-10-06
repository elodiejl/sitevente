<?php
    require("auth/EtreAuthentifie.php");
    $title = 'Accueil acheteur';
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
                <a class="navbar-brand" href="home2.php">Buy or Sell</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home2.php" ><span class="glyphicon glyphicon-home"></span> </a></li>
                    <li> <a href="vetement.php"> Vêtements </a> </li>
                    <li> <a href="jouets.php">Jouets</a></li>
                    <li> <a href="aliments.php">Aliments</a></li>
                    <form action="recherche.php" method="get" role="search" class="navbar-form navbar-left">
                    
                        <input type="text" name="mot" placeholder="Recherche" class="form-control">
                        <button type="submit" name="recherche" value="Rechercher" class="btn btn- primary"><span class="glyphicon glyphicon- search"></span> Recherche</button>
                    
                        
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="comm.php"> Comm. </a> </li>
                        <li> <a href="<?= $pathFor['logout'] ?>" title="Logout">Se déc.</a></li>
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
    
    

<?php

    include("produits.php");

echo "Hello " . $idm->getIdentity().". Your username is: ". $idm->getUid() .". Your role is: ".$idm->getRole();

//echo "Escaped values: ".$e_($ci->idm->getIdentity());


include("footer.php");
?>