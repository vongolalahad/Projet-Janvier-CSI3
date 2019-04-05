<?php
/* gère la récupération des données des formulaires et liens d'inscription */


if (isset($_POST['save_inscription'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $localisation = $_POST['localisation'];
    $tel = $_POST['telephone'];
    $motdepasse = $_POST['password'];

//    echo 'Prenom= ' .$prenom .'nom= ' .$nom .'telephone= ' .$tel .'id_client= ' .$id_client .'mot de passe= ' .$motdepasse .'localisation= ' .$localisation;
    include("../config/config.php");
    include("../model/connexion.php");
    include("../model/dao_client.php");
    $lienConnexion = getConnexion();
    SaveUser($lienConnexion, $prenom, $nom, $motdepasse, $localisation, $tel);
    $url_redirect = "../index.php?inscription_reussi";
    die('<meta http-equiv="refresh" content="0; URL=' . $url_redirect . '">');
}