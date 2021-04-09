<?php
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['type'], $_POST['level'], $_POST['time'], $_POST['title'], $_POST['desc'], $_POST['content'])) {
   if(!empty($_POST['type']) AND !empty($_POST['level']) AND !empty($_POST['time']) AND !empty($_POST['title']) AND !empty($_POST['desc']) AND !empty($_POST['content'])) {
      
      $article_type = htmlspecialchars($_POST['type']);
      $article_level = htmlspecialchars($_POST['level']);
      $article_time = htmlspecialchars($_POST['time']);
      $article_titre = htmlspecialchars($_POST['title']);
      $article_desc = htmlspecialchars($_POST['desc']);
      $article_content = $_POST['content'];
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO articles (date_publication, title, mini_desc, content, type, level, time, author) VALUES (NOW(), ?,?,?,?,?,?,?)');
         $ins->execute(array($article_titre, $article_desc, $article_content, $article_type, $article_level, $article_time, $_SESSION['identifiant']));
         $lastid = $bdd->lastInsertId();
         if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
            if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
               $chemin = '../miniatures/'.$lastid.'.jpg';
               move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
            } else {
               $message = '<div class="errorMsg">Votre image doit être au format jpg</div>';
            }
         }
         $message = '<div class="successMsg">Votre article a bien été posté</div>';
      } else {
         $update = $bdd->prepare('UPDATE articles SET date_time_edition = NOW(), title = ?, mini_desc = ?, content = ?, type = ?, level = ?, time = ? WHERE id = ?');
         $update->execute(array($article_titre, $article_desc, $article_content, $article_type, $article_level, $article_time, $edit_id));
         header('Location: http://localhost/SIN/espace/article.php?id='.$edit_id);
         $message = '<div class="successMsg">Votre article a bien été mis à jour !</div>';
      }
   } else {
      $message = '<div class="errorMsg">Veuillez remplir tous les champs</div>';
   }
}

?>