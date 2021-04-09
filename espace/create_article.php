<?php 
session_start();
include('../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    include("../includes/include_add_article.php");
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
<title><?php if($mode_edition == 1) { ?>Modifier un article<?php } else { ?>Créer un article <?php } ?></title>
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

    <section class="profile_desc">
        <div class="bandeau">
            <div class="row">
                <div class="col-xs">
                    <div class="profile">
                        <h1><?php if($mode_edition == 1) { ?>Modifier un article<?php } else { ?>Créer un article <?php } ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="formulaire">
    <?php 
            if(isset($message)) {
                echo $message;
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card_form_info register create_article" style="margin-bottom: 20px;">
                        <h4>Caractéristiques</h4>
                        <label>Type</label>
                        <select name="type" id="select">
                            <?php if($mode_edition == 1) { ?><option value="<?php echo $edit_article['type']; ?>"><?php echo $edit_article['type']; ?></option><?php } ?>
                            <option value="Arduino">Arduino</option>
                            <option value="C++">C++</option>
                            <option value="C">C</option>
                            <option value="HTML/CSS">HTML/CSS</option>
                            <option value="Java">Java</option>
                            <option value="Javascript">Javascript</option>
                            <option value="PHP">PHP</option>
                            <option value="Python">Python</option>
                            <option value="Raspberry">Raspberry PI</option>
                            <option value="Swift">Swift</option>
                        </select>
                        <label>Niveau</label>
                        <select name="level" id="select" selected="<?php echo $edit_article['level']; ?>">
                        <?php if($mode_edition == 1) { ?><option value="<?php echo $edit_article['level']; ?>"><?php echo $edit_article['level']; ?></option><?php } ?>
                            <option value="Facile">Facile</option>
                            <option value="Moyens">Moyens</option>
                            <option value="Difficile">Difficile</option>
                        </select>
                        <label>Durée moyenne</label>
                        <select name="time" id="select" selected="<?php echo $edit_article['time']; ?>">
                        <?php if($mode_edition == 1) { ?><option value="<?php echo $edit_article['time']; ?>"><?php echo $edit_article['time']; ?></option><?php } ?>
                            <option value="5 min">5 min</option>
                            <option value="10 min">10 min</option>
                            <option value="15 min">15 min</option>
                            <option value="20 min">20 min</option>
                            <option value="25 min">25 min</option>
                            <option value="30 min">30 min</option>
                            <option value="35 min">35 min</option>
                            <option value="40 min">40 min</option>
                            <option value="45 min">45 min</option>
                            <option value="50 min">50 min</option>
                            <option value="55 min">55 min</option>
                            <option value="60 min">60 min</option>
                        </select>
                    </div>

            <div class="card_form_info register create_article">
                <h4>Description</h4>
                <label>Titre</label>
                <input name="title" type="text" class="inp" <?php if($mode_edition == 1) { ?>value="<?php echo $edit_article['title']; ?>"<?php } ?>>
                <h4>Miniature</h4>
                <input type="file" name="miniature">
                <label>Courte description</label>
                <textarea name="desc" id="form_area"><?php if($mode_edition == 1) { ?><?php echo $edit_article['mini_desc']; ?><?php } ?></textarea>
            </div>

            <div class="card_form_info register create_article" style="margin-bottom: 20px;">
                <h4>Contenu</h4>
                <textarea name="content" name="content" id="editor"><?php if($mode_edition == 1) { ?><?php echo $edit_article['content']; ?><?php } ?></textarea>
            </div>
                <input type="submit" name="add" style="margin-left: 85%; margin-bottom: 20px; float: none;" value="Envoyer" class="login create">
        </form>
    </section>

    <footer >
       Quentin Savéan - Projet STI2D
    </footer>

    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
    <script>
        function visitPage() {
            window.location = 'create_article.php';
        }
    </script>
    <script>
        ClassicEditor.create(document.querySelector('#editor')).catch(error => {
            console.error(error);
        });
    </script>
</body>

</html>
<?php
} else {
    header('Location: ../index.php');
}
?>