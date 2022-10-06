<div class="titre">Modifier un produit</div>
    <form action="" method="post">
        <table>
            <tr><td>Nom produit</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>"/></td></tr>
            <tr><td>Description</td><td><input type="text" name="description" value="<?php echo $description ?>" /></td></tr>
            <tr><td>Quantité</td><td><input type="number" name="qte" value="<?php echo $qte?>" /></td></tr>
            <tr><td>Prix</td><td><input type="number" name="prix" step="0.01" min="0.01" value="<?php echo $prix?>" /></td></tr>
        </table>
        <input type="submit" value="Valider">
    </form>