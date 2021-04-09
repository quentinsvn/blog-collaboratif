<?php
    if(isset($_POST['inscription'])) {
        $identifiant = htmlspecialchars($_POST['username']);
        $nom = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['password']);

        if(!empty($_POST['username']) AND !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
            $pseudolength = strlen($identifiant);
            if($pseudolength <= 255) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqidmail = $bdd->prepare("SELECT * FROM users WHERE identifiant = ?, mail = ?");
                    $reqidmail->execute(array($mail,$identifiant));
                    $mailidexist = $reqidmail->rowCount();
                    if($mailidexist == 0) {
                        $insertmbr = $bdd->prepare("INSERT INTO users(identifiant,nom,mail,password,date_inscription) VALUES (?,?,?,?,now())");
                        $insertmbr->execute(array($identifiant, $nom, $mail, $mdp));
                        $message = "<div class='successMsg'>Votre compte a bien été créer</div>";
                    } else {
                        $message = "<div class='errorMsg'>Adresse email ou identifiant déjà utilisée !</div>";
                    }
                }
            }
        } 
        else {
            $message = "<div class='errorMsg'>Tous les champs doivent être complétés !</div>";
        }
    }
?>