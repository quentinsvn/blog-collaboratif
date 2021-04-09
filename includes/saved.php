<?php 
    if(isset($_POST['save']) AND !empty($_POST['save'])) {
        $save = $bdd->prepare('INSERT INTO saved_articles (id_suivi, id_article, title, mini_desc, type, level, time) VALUES (?,?,?,?,?,?,?)');
        $save->execute(array($_SESSION['id'], $article['id'], $title, $article['mini_desc'], $type, $level, $time));
    }   
?>