<?php
session_start();
include('../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
include('../includes/config.php');
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $bdd->prepare('DELETE FROM articles WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location: http://localhost/SIN/espace/home.php');
 }
} else {
    header('Location: ../index.php');
}
?>