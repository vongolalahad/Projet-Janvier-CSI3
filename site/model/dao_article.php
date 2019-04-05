<?php

//fonctions qui envoie et récupère les requete de la table article de la base de donnee

function AffichageArticle($link){
    $requete="SELECT id_article, nom_article, description, type_article FROM article ORDER BY nom_article" ;
    $reponse=mysqli_query($link,$requete);
    return $reponse;
}

function DonneClient($link,$id_client){
    $requete="SELECT nom, prenom, localisation, telephone FROM client WHERE id_client='$id_client'";
    $reponse=mysqli_query($link,$requete);
    return $reponse;
}

function NombreArticle($link){
    $requete="SELECT * FROM article";
    $reponse=mysqli_query($link,$requete);
    $nombredeligne=mysqli_num_rows($reponse);
    return $nombredeligne;
}
