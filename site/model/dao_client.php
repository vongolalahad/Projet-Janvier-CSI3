<?php

//fonctions qui envoie et récupère les requete de la table client de la base de donnee

//enregistrer un nouveau client dans la base de donnee
function SaveUser($link,$prenom,$nom,$motdepasse,$localisation,$tel){
    $sql="INSERT INTO client() VALUES ('','$nom','$prenom','$localisation','$motdepasse','$tel')";

    //execution de la requête
    mysqli_query($link,$sql);
}

//Verifie si l'id du client est da la base de donnee
//renvoie 1 s'il existe
//0 sinon
function VerifierIdClient($link,$id_client){
    $requete="SELECT * FROM client WHERE id_client='$id_client'";
    $reponse=mysqli_query($link,$requete);
    $nombredeligne=mysqli_num_rows($reponse);
    return $nombredeligne;
}

//Verifie si le mot de passe entre par l'utilisateur est correct
function VerifierPassword($link,$id_client,$password){
    $requete="SELECT * FROM client WHERE id_client='$id_client' AND motdepasse='$password'";
    $reponse=mysqli_query($link,$requete);
    $nombredeligne=mysqli_num_rows($reponse);
    return $nombredeligne;
}

//Recupere les donnees d'un client (nom, prenom, localisation, telephone) connaissant son id
function DonneClient($link,$id_client){
    $requete="SELECT nom, prenom, localisation, telephone FROM client WHERE id_client='$id_client'";
    $reponse=mysqli_query($link,$requete);
    return $reponse;
}
