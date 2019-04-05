<!-- Formulaire de connexion du client -->
<div id="connexion" >
    <form action="controller/action_connexion.php" method="post" style="display: inline-block">
        <label for="id">ID</label>
        <input type="text" name="id_client" id="id" style="width: 150px;height: 20px" maxlength="4" minlength="4">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" style="width: 150px; height: 20px" maxlength="4" minlength="4">
        <input type="submit" value="Connexion" name="connexion">
    </form>
    <a href="inscription.php">
        <p style="display: inline-block">
            <input type="submit" value="Inscription">
        </p>
    </a>
</div>
