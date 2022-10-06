<?php

// require("auth/EtreAuthentifie.php");

$title = 'Accueil';
include("header.php");
?>

<!-- <a href="<?= $pathFor['logout'] ?>" title="Logout">Logout</a> -->
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
                <a class="navbar-brand" href="home.php">Buy or Sell</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                    <ul class="nav navbar-nav navbar-right">
                    
                        <li> <a href="login.php"><svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd"/>
                            </svg> se connecter </a></li>
                    </ul>
                    
                </ul>
            </div>
        
        </div>
    </nav>
    
    <div class="container">
        <div class="jumbotron">
            <h1>Vendre ou acheter sur Buy or Sell</h1>
            <p>Bienvenue sur le site dédié aux vendeurs comme aux acheteurs</p>
            <div class="fond"></div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <h2>Vendeur</h2>
                <p>Vendez les articles que vous voulez en vous connectant ou si vous êtes intéresser par le concept et vous venez d'arriver venez vous inscrire sur le site buy or sell en cliquant sur le bouton s'incrire.</p>
                <p><a href="adduser.php" target="_blank" class="btn btn-success">S'incrire&raquo;</a></p>
            </div>
            <div class="col-xs-4">
                <h2>Acheteur</h2>
                <p>Acheter les articles que vous voulez en vous connectant ou en vous inscrivant en cliquant sur le bouton ci-dessous. En vous connectant ou vous inscrivant vous trouverez plusieurs articles qui pourrez vous intésser.</p>
                <p><a href="adduser.php" target="_blank" class="btn btn-success">S'inscrire&raquo;</a></p>
            </div>
            <div class="col-xs-4">
                <h2>En savoir plus</h2>
                <p><a href="#" target="_blank" class="btn btn-success">En savoir plus &raquo;</a></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <footer>
                    <p>&copy; Copyright 2016 Programmation WEB</p>
                </footer>
            </div>
        </div>
    </div>

<?php

// echo "Hello " . $idm->getIdentity().". Your username is: ". $idm->getUid() .". Your role is: ".$idm->getRole();

//echo "Escaped values: ".$e_($ci->idm->getIdentity());


include("footer.php");
?>