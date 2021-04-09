<?php
session_start();
include('../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    $articles = $bdd->query('SELECT * FROM articles ORDER BY id DESC');
    $sql = 'SELECT COUNT(*) AS nb FROM articles';
    $result = $bdd->query($sql);
    $columns = $result->fetch();
    $nb = $columns['nb'];
    $save = $bdd->query('SELECT * FROM saved_articles');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <!-- Titre -->
    <title>Mon espace</title>
</head>

<body style="background-color: #f3f3f3;">

    <header>
        <div class="navbar">
            <a href="" id="title">Programmation</a>
            <a id="active" href="home.php">Accueil</a>
            <a href="explorer.php">Explorer</a>
            <div class="dropdown">
                <button class="dropbtn"><?php echo $user['nom']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profil.php">Mon profil</a>                   
                    <a href="logout.php">Se déconnecter</a>
                </div>
            </div>
            <button class="login create" style="float: right !important;" onclick="visitPage();"><i class="fas fa-plus-circle"></i>
                Créer</button>
        </div>
    </header>

    <section class="profile_desc">
        <div class="bandeau">
            <div class="row">
                <div class="col-xs-3">
                    <div class="profile">
                        <h1><?php echo $user['nom']; ?></h1>
                        <span>Inscrit depuis le <?php echo date('d/m/Y', strtotime($user['date_inscription'])); ?></span>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="infos row">
                        <div class="col-xs">
                            <ul class="follow">
                                <li id="number"><?php echo $nb; ?></li>
                                <li id="subtitle">Articles disponibles</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="follow_list">
        <div class="tabs-page">
            <ul class="list-profile" style="text-align: center;">
                <li class="activetab">Enregistrements</li>
                <li><a href="my_articles.php">Mes articles</a></li>
            </ul>
        </div>
        <div class="read">
            <h2>Articles enregistrés</h2>
            <!-- Premiere carte -->
            <?php while($s = $save->fetch()) { if($s['id_suivi'] === $_SESSION['id']) { include('../includes/include-color-exp.php');?>
            <div class="card_horizontal">
                <div class="row">
                    <div class="col-xs-3 picture">
                        <div class="img_cover">
                        <a style="text-decoration: none; color: black;" href="article.php?id=<?= $s['id_article'] ?>"><img src="../miniatures/<?= $s['id_article'] ?>.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xs-9 desc_card">
                        <div class="txt_card">
                        <a style="text-decoration: none; color: black;" href="article.php?id=<?= $s['id_article'] ?>"><h1><?php echo $s['title'] ?></h1></a>
                            <span>De <?php echo $s['author'] ?></span>
                            <a style="text-decoration: none; color: black;" href="article.php?id=<?= $s['id_article'] ?>"><p><?php echo $s['mini_desc']; ?></p></a>
                            <hr style="width: 90%; color: #95a5a6 !important;">
                            <ul class="caract">
                                <li id="etiquette" style="background-color: <?php echo $colortt; ?>"><?php echo $s['type']; ?></li>
                                <li>|</li>
                                <li id="level" style="color: <?php echo $color; ?>"><?php echo $s['level']; ?></li>
                                <li>|</li>
                                <li id="time"><?php echo $s['time']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
            <!-- -->
        </div>
    </section>


    <footer style="position: absolute; bottom: 0; width: 100%;">
            Quentin Savéan - Projet STI2D
        </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
    <script>
        function visitPage() {
            window.location = 'create_article.php';
        }
    </script>
</body>

</html>
<?php
} else {
    header('Location: ../index.php');
}
?>