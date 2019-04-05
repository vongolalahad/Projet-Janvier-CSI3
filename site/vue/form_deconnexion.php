<!-- Formulaire de deconnexion du client -->

<div class="form_deconnexion"><p class="bienvenue">Bienvenue</p><?php echo ' '.$_SESSION['prenom'] ?>
    <a href="../controller/action_deconnexion.php" class="deconnexion">
        <p><input type="submit" value="Déconnexion" /></p>
    </a>
</div>
