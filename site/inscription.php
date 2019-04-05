<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site d'annonce: inscription</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include("vue/form_connexion.php");//formulaire de connexion
?>
<?php
include("vue/form_inscription.php");//formulaire d'inscription
?>
<?php
if (isset($_GET['error'])){//Si le login rentré existe déja
    ?>
    <script>
        alert("Ce login existe déja. Choisissez un autre login")
    </script>
    <?php
}
?>
</body>
</html>
