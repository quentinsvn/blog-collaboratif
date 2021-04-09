<?php
session_start();
include('../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['name']) AND !empty($_POST['name']) AND $_POST['name'] != $user['name']) {
        $name = htmlspecialchars($_POST['name']);
        $insertname = $bdd->prepare("UPDATE users SET nom = ? WHERE id = ?");
        $insertname->execute(array($name, $_SESSION['id']));
        header('Location: profil.php');
     }
    if(isset($_POST['identifiant']) AND !empty($_POST['identifiant']) AND $_POST['identifiant'] != $user['identifiant']) {
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $insertpseudo = $bdd->prepare("UPDATE users SET identifiant = ? WHERE id = ?");
        $insertpseudo->execute(array($identifiant, $_SESSION['id']));
        header('Location: profil.php');
     }
     if(isset($_POST['mail']) AND !empty($_POST['mail']) AND $_POST['mail'] != $user['mail']) {
        $mail = htmlspecialchars($_POST['mail']);
        $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
        $insertmail->execute(array($mail, $_SESSION['id']));
        header('Location: profil.php');
     }
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
    <title>Mon profil | <?php echo $user['identifiant']; ?></title>
</head>
<body style="background-color: #f3f3f3;">

<header>
        <div class="navbar">
            <a href="" id="title">Programmation</a>
            <a href="home.php">Accueil</a>
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
                <div class="col-xs">
                    <div class="profile">
                        <h1>Modifier mon profil</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card_form_info register create_article marge">
    <?php if(isset($msg)) { echo $msg; } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Nom</label>
            <input name="name" type="text" value="<?php echo $user['nom']; ?>">
            <label>Identifiant</label>
            <input type="text" name="identifiant" value="<?php echo $user['identifiant']; ?>">
            <label>Adresse e-mail</label>
            <input type="email" name="mail" value="<?php echo $user['mail']; ?>">
            <label>Mot de passe</label>
            <input type="password" name="newmdp1">
            <label>Confirmez le mot de passe</label>
            <input type="password" name="newmdp2">
            <input type="submit" name="inscription" class="button valider" style="background-color: rgb(122,188,255); color: white; cursor: pointer; border: none;" value="Confirmer" id="modify">
        </form>
    </div>
    

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