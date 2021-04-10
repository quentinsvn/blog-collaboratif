# Contexte

Dans le cadre du chapitre sur l'apprentissage des bases de l'HTML/CSS, enseigné en première STI2D (spécialité "SIN"), ils nous a étaient demandés de faire un site web statique, en deux semaines, sur un sujet de notre choix. Passionné par ce domaine depuis plusieurs années et à la recherche de nouveaux défis, j'ai eu alors l'idée de créer un blog de "MOOC" collaboratif. J'ai dû alors utiliser mes quelques connaissances en PHP et MySQL (base de données) pour mener à bien la réalisation de ce mini-projet dynamique.

# Description

Ce site a pour objectif de donner la possibilité aux utilisateurs inscrits, de créer des cours de programmation (aussi appelée "MOOC"), sur un large choix de langages informatiques (HTML/CSS, PHP, Javascript, Python...) mais également électroniques (Arduino, Raspberry PI).

## Fonctionnalités

 - Espace de connexion/inscription.
 - Création/Édition/Suppression d'articles.
 - Espace personnel (articles créés et sauvegardées de l'utilisateur).
 - Gestion du profil.

## Aperçu

![Aperçu de la plateforme](https://quentinsavean.fr/images/sin.png)

# Mise en route

> Étape 1 : Téléchargez l'ensemble des fichiers du projet.

Téléchargez l'ensemble des fichiers de ce dépôt et placez lès dans un répertoire de votre PC.

> Étape 2 : Importer le modèle SQL.

Créer une base de données et importer le modèle SQL du nom de "blog.sql", situé dans le dossier "includes", à l'aide de PhpMyAdmin ou depuis un autre client de gestion de base de données MySQL.

> Étape 3 : Connecter votre base de données au site.

Éditer le fichier "config.php" situé dans le dossier "includes" du projet et rentrez les informations demandées en majuscules par les vôtres (IP, nom, identifiant et mot de passe de votre base de données)

> Étape 4 : Déposez les fichiers vers votre serveur.

Une fois toutes les étapes précédentes faites, il ne vous manquera plus que déposez l'ensemble des fichiers vers votre serveur web. Une fois le transfert terminé, vous devriez pouvoir gérer la plateforme en vous rendant directement sur votre site internet !

# Démo

Vous pouvez essayer ce projet depuis l'URL suivante : https://backups.quentinsavean.fr/projet_premiere_sti2d/about.php

