<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site de commande</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include("vue/form_connexion.php");//inclu la page qui contient le formulaire de connexion
?>
<!-- PHRASE D'INTRO DU SITE -->
<p class="intro"> <strong> Bienvenue sur le site.<br> Veuillez vous connecter ou vous inscrire.</strong> </p>
<?php
    include("vue/affichage_article.php");//inclu la page qui affiche les articles du site
?>

<?php
    if(isset($_GET['inscription_reussi'])){//Si l'inscription est reussi
        ?>
        <script>
            alert("inscription réussi")
        </script>
        <?php
    }
	elseif(isset($_GET['password_incorrect'])){//Si le mot de passe est incorrect
        ?>
        <script>
            alert("le mot de passe est incorrect")
        </script>
        <?php
    }
	if(isset($_GET['id_client_inexistant'])){//Si l'ID du client est inexistant
        ?>
        <script>
            alert("l'id renseigné n'existe pas")
        </script>
        <?php
    }
?>
