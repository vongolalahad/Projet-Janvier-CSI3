<!-- Affiche et met en forme tous les articles présent dans la base de donnee -->

<div class = "div2">
    <h1 style="font-size:30px; text-align:center; font-family: 'Arial'; "> Articles </h1>
<?php
include("model/dao_article.php");
include("model/connexion.php");
$lienconnexion=getConnexion();
$resultat=AffichageArticle($lienconnexion);
while($x=mysqli_fetch_array($resultat)) {
    $nom_article             =$x['nom_article'];
    $description             =$x['description'];
    $type_article            =$x['type_article']
    ?>
        <div class="A1" style="border: 5px solid black; margin: 2px; height: auto;">
            <div style="width: 300px; height: auto;display: inline-block;vertical-align: top;">
                <?php echo '<p style="text-align: left">Nom article : '.$nom_article.'<br>Type d\' article : '.$type_article.'</p>'?>
            </div>
            <div style="display: inline-block; border: 1px solid black; width: 630px;">
                <?php echo '<p style="text-align: left">Description :<br>'.$description.'</p>'?>
            </div>
        </div>
    <?php
}
?>
</div>
