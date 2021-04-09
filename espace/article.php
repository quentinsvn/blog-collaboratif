<?php
    session_start();
    include('../includes/config.php');
    if(isset($_SESSION['id'])) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
        if(isset($_GET['id']) AND !empty($_GET['id'])) {
            $get_id = htmlspecialchars($_GET['id']);

            $article = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
            $article->execute(array($get_id));

            if($article->rowCount() == 1) {
                $article = $article->fetch();
                $titre = $article['title'];
                $contenu = $article['content'];
                $author = $article['author'];
                $date = $article['date_publication'];
                $type = $article['type'];
                $level = $article['level'];
                $time = $article['time'];
                include('../includes/include-color.php');
                $btn = $bdd->query("SELECT * FROM saved_articles");
                $b = $btn->fetch();
                if (isset($_POST['savebtn'])) {
                    $req = $bdd->prepare('INSERT INTO saved_articles(id_suivi, id_article, author, title, mini_desc, type, level, time) VALUES(:id_suivi, :id_article, :author, :title, :mini_desc, :type, :level, :time)');
                    $req->execute(array(
                        'id_suivi' => $_SESSION['id'],
                        'id_article' => $article['id'],
                        'author' => $author,
                        'title' => $titre,
                        'mini_desc' => $article['mini_desc'],
                        'type' => $type,
                        'level' => $level,
                        'time' => $time,
                        ));
                }  if($b['id_suivi'] === $_SESSION['id']) {
                    $msg = "Supprimer";
                    $back = "rgb(169,3,41)";
                } else { 
                    $msg = "Enregistrer";
                }
            } else {
                header('Location: home.php');
            }

        } else {
            header('Location: home.php');
        }
?>
<!DOCTYPE html>
<html>
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
    <title><?php echo $titre; ?></title>
</head>
<body style="background-color: #f3f3f3;">
	
	<header>
		 <div class="navbar">
            <a href="" id="title">Programmation</a>
            <a href="home.php">Accueil</a>
            <a href="explorer.php">Explorer</a>
            <div class="dropdown">
                <button class="dropbtn">Quentin Savéan
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
	
	<section class="article">
		<div class="cover_article">
			
        </div>
        <div class="row espace">
            <div class="col-xs-8">
                <div class="card_content">
                    <h1><?php echo $titre; ?></h1>
                    <span>De <?php echo $author; ?></span>
                    <p><?php echo $contenu; ?></p>
                </div>
            </div>
            <div class="col-xs-4" style="margin-bottom: 100px;">
                <div class="card_author">
                    <h2>Informations</h2>
                    <u>Publié le :</u><?php echo date(' d/m/Y', strtotime($date)); ?>
                    <u><h4>Langage :</h4></u> 
                    <span id="etiquette" style="background-color: <?php echo $colort; ?>"><?php echo $type; ?></span>
                    <u><h4>Niveau :</u> <span style="color: <?php echo $color; ?>"><?php echo $level; ?></span></h4>
                    <u><h4>Durée moyenne :</u> <span><?php echo $time; ?></span></h4>  
                </div>
                <div class="follow_article">
                <?php if($article['author'] === $_SESSION['identifiant']) { ?>
                        <button onclick="edit()" style="margin-bottom: 10px;" id="edit">Modifier</button>
                        <button onclick="supr()" style="margin-bottom: 10px;" id="delete">Supprimer</button>
                   <?php } else { ?>
                   <form action="" method="post">
                        <button type="submit" name="savebtn" style="background: <?php echo $back; ?> !important;"><?php echo $msg; ?></button>
                   </form>
                  <?php } ?> 
                </div>
                </div>
            </div>
        </div>        
	</section>

        <script>
        function visitPage() {
            window.location = 'create_article.php';
        }
        function supr() {
            window.location = 'delete.php?id=<?php echo $article['id']; ?>';
        }
        function edit() {
            window.location = 'create_article.php?edit=<?php echo $article['id']; ?>';
        }
    </script>
</body>
</html>
<?php
} else {
    header('Location: ../index.php');
}
?>