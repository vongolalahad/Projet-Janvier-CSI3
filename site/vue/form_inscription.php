<!-- Formulaire d'inscription -->

<div>
    <h1 class="inscription">S'inscrire</h1>
</div>
<form action="controller/action_inscription.php" method="post">
    <table id="inscription_position">
        <p>
            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom"/><br>
        </p>
        <p>
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom"/><br>
        </p>
        <p>
            <label for="localisation">localisation</label><br>
            <input type="text" name="localisation" id="localisation"/><br>
        </p>
        <p>
            <label for="tel">Téléphone</label><br>
            <input type="text" name="telephone" id="tel"/><br>
        </p>
        <p>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password" maxlength="4" minlength="4"/><br>
        </p>

    </table>
    <table>
        <tr>
            <td>
                <input type="submit" value="Valider" name="save_inscription" />
            </td>
            <td>
                <input type="reset" value="Annuler"/>
            </td>
        </tr>
    </table>
</form>
