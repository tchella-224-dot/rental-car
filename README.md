# Car Rental Website Projec

Aperçu
Il s'agit d’un projet de site web de location de voitures. Le projet permet aux utilisateurs de consulter les voitures disponibles, d’effectuer des réservations et de gérer leurs commandes. Le site est construit avec HTML, CSS, JavaScript, PHP et MySQL.

Fonctionnalités
Authentification des utilisateurs : Les utilisateurs peuvent s’inscrire, se connecter et se déconnecter.

Liste des voitures : Les utilisateurs peuvent parcourir la liste des voitures disponibles.

Réservations : Les utilisateurs peuvent effectuer une réservation en sélectionnant une voiture et un lieu de retour (en cours de développement).

Tableau de bord utilisateur : Les utilisateurs peuvent visualiser et gérer leurs réservations (en cours de développement).

Design responsive : Le site est adapté aux différents appareils.

Technologies utilisées
HTML

CSS

JavaScript

PHP

MySQL

Installation
Prérequis
XAMPP ou tout autre environnement de serveur local.

Un navigateur web.

Étapes
Déplacez le projet dans le répertoire de votre serveur :

Pour XAMPP, déplacez le dossier du projet dans C:\xampp\htdocs\.

Créez une base de données :

Ouvrez PHPMyAdmin.

Créez une nouvelle base de données nommée car_rental.

Importez la base de données :

Importez le fichier car_rental.sql depuis le répertoire du projet dans la base de données car_rental.

Mettez à jour la configuration de la base de données :

Ouvrez le fichier connection.php dans le répertoire du projet.

Mettez à jour les identifiants de la base de données pour correspondre à votre configuration locale.

php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";
Démarrez le serveur :

Ouvrez le Panneau de configuration XAMPP.

Démarrez les modules Apache et MySQL.

Accédez au site web :

Ouvrez un navigateur web.

Rendez-vous sur http://localhost/rental-car-main/index.php

Pour vous connecter, utilisez :

Email : challatoufik3@gmail.com

Mot de passe : tawfikchella

Utilisation
S’inscrire : Créez un nouveau compte.

Se connecter : Accédez à votre compte avec vos identifiants.

Parcourir les voitures : Consultez les voitures disponibles à la location.

Effectuer une réservation : Sélectionnez une voiture et fournissez les informations demandées pour effectuer une réservation (en cours de développement).

Gérer les réservations : Visualisez et gérez vos réservations depuis votre tableau de bord (en cours de développement).
