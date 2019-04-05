<!-- age de l'utilisateur connecte -->

<?php
session_start();
if (!isset($_SESSION['connecte'])){
    header('location:error.php');
}
else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Site de commande</title>
        <link type="text/css" rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php
    include("form_deconnexion.php");
    include("../config/config.php");
    include('../model/connexion.php');
    include('../model/dao_article.php');
    $lienConnexion = getConnexion();

    ?>
    <header>
        <div class="header">
            <p style="font-family: 'stencil'; text-align: center; font-weigth : bold ; "> Faites votre commande </p>
        </div>
    </header>
    <?php
        include("add_article.php");
    ?>
    ?>
    </body>
    </html>
    <?php
}
