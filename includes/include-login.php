<?php
    if(isset($_POST['login'])) {
        $id = htmlspecialchars($_POST['usernameEmail']);
        $password = sha1($_POST['password']);
        if(!empty($id) AND !empty($password)) {
            $requser = $bdd->prepare("SELECT * FROM users WHERE identifiant = ? AND password = ?");
            $requser->execute(array($id,$password));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['identifiant'] = $userinfo['identifiant'];
                $_SESSION['email'] = $userinfo['email'];
                header("Location: ../espace/home.php");
            }
            else {
                $message = "<div class='errorMsg'>Identifiants incorrects !</div>";
            }
        }
        else {
            $message = "<div class='errorMsg'>Tous les champs doivent être complétés !</div>";
        }
    }

?>