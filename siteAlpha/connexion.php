<?php
session_start();

try {
    $bdd = new PDO('mysql:host=pnwd.myd.infomaniak.com;dbname=pnwd_classe2b', 'pnwd_tanguyCvgn', 'GmanG1pomCTdelicieu!');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

if (isset($_POST['connexion'])) {
    if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
        $pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
        $mdp = sha1($_POST['mdp']);
        
        $reqUser = $bdd->prepare('SELECT * FROM membres WHERE pseudo_user = ? AND mdp_user = ?');
        $reqUser->execute(array($pseudo, $mdp));
        $userExist = $reqUser->rowCount();
        
        echo $userExist;
        echo $pseudo;
        echo $mdp;
        
        if ($userExist == 1) {
            $infoUser = $reqUser->fetch();
            
            $_SESSION['userinfo'] = array(
                'id' => $infoUser['id_user'],
                'pseudo' => $pseudo);
            
            header('Location:index.php');
        }
        else {
            echo "identifiant ou mot de passe invalide";
        }
    }
}
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'acceuil de la IDA/FA-P2B</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>

    <style>
        * {
            margin: auto;
            padding: 0;
        }

        form {
            text-align: center;
        }

        body {
            background-color: #FECE1A;
        }

        #inscription {
            margin-top: 10%;
        }

        #connexion-btn {
            margin-top: 1%;
        }

    </style>

    <body>
        <!-- Start navbar section  -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="120" height="40" alt="Logo" />
                    
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="./index.php#home">Accueil</a></li>
                            <li><a href="./index.php#service">Services</a></li>
                            <li><a href="./index.php#portfolio">Portfolio</a></li>
                            <li><a href="./index.php#about">A propos</a></li>
                            <li><a href="./index.php#contact">Contact</a></li>
                            <li><a href="./inscription.php">Inscription</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- End navbar section  -->


        <!-- Start contact section -->
        <div id="inscription" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Connect-toi !</h1>
                    </div>
                </div>
                <form id="contact-form" action="" method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input class="span12" type="text" id="pseudo" name="pseudo" placeholder="* Entrez votre pseudo...">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="password" name="mdp" id="mdp" class="span12" placeholder="* Entrez votre mot de passe...">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button id="connexion-btn" class="message-btn" type="submit" name="connexion" id="connexion">Je me connecte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End contact section -->
    </body>

    </html>
