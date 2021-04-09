<?php
include('includes/config.php');
include('includes/include-register.php');
if(isset($_SESSION['id'])) {
    header('Location: espace/home.php');
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
    <title>Inscription</title>
</head>

<body class="login_page">
<style>
    .errorMsg{color: "#cc0000 !important";margin-bottom: "10px"}
</style>

    <div class="login_form">
        <h2>Inscription</h2>
        <?php 
            if(isset($message)) {
                echo $message;
            }
        ?>
        <form method="post" action="" class="register" name="signup">
            <label>Nom</label>
            <input name="name" type="text" class="inp">
            <label>Identifiant</label>
            <input name="username" type="text" class="inp">
            <label>Adresse e-mail</label>
            <input name="email" type="email" class="inp">
            <label>Mot de passe</label>
            <input name="password" type="password">
            <input type="submit" id="submit" style="width: 100%;" class="button valider" name="inscription" value="S'incrire">
        </form>
    </div>

</body>

</html>