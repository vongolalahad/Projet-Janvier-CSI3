<?php
session_start();
/* gère la récupération des données des formulaires de commande d'articles */
$id_article        =  $_POST['id_article'];
$quantite     =  $_POST['quantite'];
$id_client        =  $_SESSION['id_client'];


include('../model/connexion.php');//contient la fonction pour se connecter à la base de donnée
include('../config/config.php');//contient les constantes de bases de la base de donnée
include('../model/dao_article.php');//contient les fonctions s'occupant des articles
include('../fonction/fonction.php');

$link=getConnexion();//connexion à la base de données
$resultat = DonneClient($link,$id_client);
$donne_client=mysqli_fetch_array($resultat);
$localisation = $donne_client['localisation'];
$tel = $donne_client['telephone'];

/*Savearticle($link,$titre,$desciption,$date_article,$rubrique,$login,$nom_fichier);*/
$code_retrait=rand(1,9999);
$id_client=Format($id_client);
$id_article=Format($id_article);
$code_retrait=Format($code_retrait);
$quantite=Format($quantite);
$fichier_commande = fopen("../commande.txt","w");
fwrite($fichier_commande,$id_article.';');
fwrite($fichier_commande,$quantite.';');
fwrite($fichier_commande,$tel.';');
fwrite($fichier_commande,$localisation);
fclose($fichier_commande);
$fichier_vente=fopen("../vente.txt","a");
fwrite($fichier_vente,$id_client.';');
fwrite($fichier_vente,$id_article.';');
fwrite($fichier_vente,$quantite.';');
fwrite($fichier_vente,$code_retrait."\n");
fclose($fichier_vente);
shell_exec("python ../envoi.py");
header("location:../vue/administrateur.php");
