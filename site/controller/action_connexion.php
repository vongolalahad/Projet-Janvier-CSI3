<?php
/* gère la récupération des données des formulaires et liens de connexion */

session_start();

include('../config/config.php');
include('../model/connexion.php');
include('../model/dao_client.php');
$lienconnexion=getConnexion();
if (isset($_POST['connexion'])) {
    $id_client = $_POST['id_client'];
    $password = $_POST['password'];
    $ligne = VerifierIdClient($lienconnexion, $id_client);
    if ($ligne == 1) {
        $ligne1 = VerifierPassword($lienconnexion, $id_client, $password);
        if ($ligne1 == 1) {
            $_SESSION['id_client'] = $id_client;
            $res=DonneClient($lienconnexion,$id_client);
            $user=mysqli_fetch_array($res);
            $_SESSION['prenom']=$user['prenom'];
            $_SESSION['id_client']=$id_client;
            $_SESSION['connecte']=0;
            /*            $_SESSION['nom']=$ligne;*/
            header('location:../vue/administrateur.php');
        } else {
            header('location:../index.php?password_incorrect');
        }
    } else {
        header('location:../index.php?id_client_inexistant');
    }
}