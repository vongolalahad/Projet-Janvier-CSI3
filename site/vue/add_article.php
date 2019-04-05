<!-- Formulaire pour passer une commande -->

<aside>
    <div>
        <h3>Passer une commande </h3>
    </div>
    <form action="../controller/action_article.php" method="post">
        <p>
            <label for="categorie">Nom article:</label>
            <?php
            include ('select_article.php');
            ?>
            <label for="quantite">Quantite:</label>
            <input type="number" placeholder="" name="quantite" id="quantite" style="height: 20px;width: 150px"><br><br>
            <input type="submit" value="Valider" />
        </p>
    </form>
</aside>
