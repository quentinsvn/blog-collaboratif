<?php
session_start();
include('includes/config.php');
include('includes/include-login.php');
if(isset($_SESSION['id'])) {
    header("Location: espace/home.php");
}
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
    <title>Se connecter</title>
</head>

<body class="login_page">

    <div class="login_form">
        <h2>Connexion</h2>
        <?php 
            if(isset($message)) {
                echo $message;
            }
        ?>
        <form action="" method="post" class="register" name="login">
            <label>Identifiant</label>
            <input type="text" style="width: 100%;" name="usernameEmail">
            <label>Mot de passe</label>
            <input type="password" style="width: 100%;" name="password">
                <input type="submit" class="valider" style="width: 100%;" value="Se connecter" id="submit" name="login">
        </form>
    </div>

</body>

</html>