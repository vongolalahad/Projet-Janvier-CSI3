<!-- Menu deroulant pour selectionner un article parmi ce qui sont dans la base de donne -->

<select name="id_article" id="">
    <?php
    $req="SELECT * FROM article ";
    $reponse=mysqli_query($lienConnexion,$req);
    while ($x=mysqli_fetch_array($reponse)){
        $id_article=$x['id_article'];
        echo '<option value="'.intval($id_article).'">'.$x['nom_article'].'</option>';
    }?>
</select>
