<?php
session_start();
include('includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch(); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <!-- Titre -->
    <title>En savoir plus</title>
</head>

<body style="background-color: #ecf0f1;">

    <header>
        <div class="topnav">
            <a href="index.php" id="title">Programmation</a>
            <a class="active" id="show">Langages <i class="fas fa-angle-down"></i></a>
            <a href="#contact" id="active">En savoir plus</a>
            <?php if(isset($_SESSION['id'])) { ?>
            <div class="dropdown">
                <button class="dropbtn"><?php echo $user['nom']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="espace/profil.php">Mon profil</a>  
                    
                    <a href="espace/logout.php">Se déconnecter</a>
                </div>
            <?php } else { ?>
            <div class="topnav-right">
                <button onclick="visitPage();" class="login">Se connecter</button>
                <a href="register.php" id="account">Créer un compte</a>
            </div> 
            <?php } ?>
        </div>
    </header>

    <!-- Liste de langages informatiques -->
    <section class="languages">
            <div class="block_languages">
                <!-- Bloque 1 -->
                <div class="row">
                    <!-- Langage 1 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/html.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 2 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/js.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 3 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/php.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 4 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/C.png" alt="">
                        </div>
                    </div>
                </div>
                <!-- Bloque 2 -->
                <div class="row block_2">
                    <!-- Langage 5 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/python.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 6 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/java.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 7 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/arduino.png" alt="">
                        </div>
                    </div>
                    <!-- Langage 8 -->
                    <div class="col-xs">
                        <div class="card_language">
                            <img src="assets/img/raspberry.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section class="description">
        <div class="about">
            <h1>Description</h1>
            <p>Ce site a pour principe de donner la possibilité aux utilisateurs de créer des cours en programmation sur un large choix de langages informatiques (HTML/CSS, PHP, Javascript, Python...) mais également électronique (Arduino, Raspberry PI)</p>
        </div>
    </section>

    <section class="how">
        <div style="text-align: center;">
            <h2><span style="background-color: black; color: white; padding: 5px 10px;">Comment ça marche ?</span></h2>
        </div>
        <div class="card_how">
            <div class="row">
                <div class="col-xs">
                    <div class="step_1">
                        <ul>
                            <li id="step">Etape 1</li>
                            <li id="exp">Créer un compte</li>
                            <li><i class="fas fa-4x fa-user-circle"></i></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs">
                    <div class="step_2">
                        <ul>
                            <li id="step">Etape 2</li>
                            <li id="exp">Rechercher</li>
                            <li><i class="fas fa-4x fa-search"></i></i></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs">
                    <div class="step_3">
                        <ul>
                            <li id="step">Etape 3</li>
                            <li id="exp">Consulter</li>
                            <li><i class="far fa-4x fa-eye"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fonctions">
        <div style="text-align: center;">
            <h2><span style="background-color: black; color: white; padding: 5px 10px;">Fonctionnalités</span></h2>
        </div>

        <!-- Fonctionnalité 1 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/login.png" alt="" style="width:100%;">
                    </div>
                </div>

                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Inscription/connexion</h3>
                        <p>Chaque membre doit être authentifié pour accéder aux contenus du site.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalité 2 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Gerer le profil</h3>
                        <p>Possibilité de changer ces informations de compte (nom, identifiant, mot de passe....) a tous moment</p>
                    </div>
                </div>

                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/profil.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalité 1 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/search.png" alt="">
                    </div>
                </div>

                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Rechercher</h3>
                        <p>Tous les articles du site sont répertoriés en une seule page de recherche.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalité 3 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Créer un article</h3>
                        <p>Tous les utilisateurs inscrit peuvent créer leurs propres cours et les modifier s'il le faut.</p>
                    </div>
                </div>

                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/create.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Fonctionnalité 4 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/save.png" alt="">
                    </div>
                </div>

                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Enregistrer un article</h3>
                        <p>Possibilités d'enregistrer un article pour mieux le retrouver plus tard sur son compte.</p>
                    </div>
                </div>
            </div>
        </div>



        <!-- Fonctionnalité 3 -->
        <div class="card_how marge">
            <div class="row">
                <div class="col-xs">
                    <div class="fonction_info">
                        <h3>Options</h3>
                        <p>Possibilité de définir le temps approximatif du cours, son langage et sa difficulté à le réaliser</p>
                    </div>
                </div>

                <div class="col-xs">
                    <div class="step_img">
                        <img src="assets/img/infos.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer id="footer">
        Quentin Savéan - Projet STI2D
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
    <script>
        function visitPage() {
            window.location = 'login.php';
        }
    </script>
</body>

</html>