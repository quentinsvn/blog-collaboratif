<?php
    session_start();
    include('includes/config.php');
    include('includes/include-register.php');
    if(isset($_SESSION['id'])) {
        header('Location: espace/home.php');
    } else {
        $articles = $bdd->query('SELECT * FROM articles ORDER BY id DESC');
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
    <title>Programmation</title>
</head>

<body>

    <header>
        <div class="topnav">
            <a href="" id="title">Programmation</a>
            <a class="active" class="dropbtn" id="show">Langages <i class="fas fa-angle-down"></i></a>
            <a href="about.php">En savoir plus</a>
            <?php if(isset($_SESSION['id']) AND $user['id'] == $_SESSION['id']) { ?> 
                <div class="dropdown">
                <button class="dropbtn"><?php echo $user['name']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profil.php">Mon profil</a>  
                    
                    <a href="<?php echo BASE_URL; ?>espace/logout.php">Se déconnecter</a>
                </div>
            </div>
           <?php } else { ?>
            <div class="topnav-right">
                <button class="login" onclick="visitPage();">Se connecter</button>
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

    <div class="row" style="margin: 0 !important;">
        <!-- Illustration -->
        <div class="col-xs-6 cover" style="padding-left: 0 !important;">
            <div class="card">
                <h1>
                    Apprenez
                    <br>
                    De nouveaux
                    <br>
                    Languages Informatiques !
                </h1>
            </div>
        </div>
        <!-- Formulaire -->
        <div class="col-xs-6 form" style="padding-left: 30px;">
            <h2><span style="background-color: black; color: white; padding: 5px 10px;">Créer un compte</span></h2>
            <?php 
            if(isset($message)) {
                echo $message;
            }
        ?>
            <form action="" class="register" method="post" name="signup">
                <label>Nom</label>
                <input name="name"  type="text" class="inp">
                <label>Identifiant</label>
                <input name="username" type="text" class="inp">
                <label>Adresse e-mail</label>
                <input name="email" type="email">
                <label>Mot de passe</label>
                <input name="password" type="password">
                <input type="submit" name="inscription" class="button valider" value="Commencer" id="send">
            </form>
        </div>
    </div>

    <!-- Derniers articles -->
    <section class="last_articles">
        <h1>Nouveaux articles</h1>
        <!-- Liste d'articles -->
        <div class="row">
        <?php while($a = $articles->fetch()) { include('includes/include-color-exp.1.php'); ?>
        <a style="text-decoration: none; color: black;" href="espace/article.php?id=<?= $a['id'] ?>">
            <div class="col-xs">
                <!-- Article -->
                <div class="card_article" style="width: 25%;">
                <img src="miniatures/<?= $a['id'] ?>.jpg" alt="" style="width: 100%; height: 190px !important;">
                    <div class="infos_card">
                        <h3><?php echo $a['title'] ?></h3>
                        <span><?php echo $a['author'] ?></span>
                        <p style="color: #2c3e50;"><?php echo $a['mini_desc'] ?></p>
                        <hr>
                        <ul class="caract">
                            <li id="etiquette"  style="background-color: <?php echo $colorttt; ?>"><?php echo $a['type'] ?></li>
                            <li>|</li>
                            <li id="level" style="color: <?php echo $colorr; ?>"><?php echo $a['level'] ?></li>
                            <li>|</li>
                            <li id="time"><?php echo $a['time'] ?></li>
                        </ul>
                    </div>
                </div>
                </a>
                <!-- -->
            </div>
        <?php } ?>
        </div>
        </div>
    </section>

    

    <footer style="position: relative; bottom: 0; width: 100%;">
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
<?php
    }
?>
