<div class="titre">Ajouter un produit</div>
<form action="" method="post">
    <table>
        <tr><td>Nom</td><td><input type="text" name="nom" /></td></tr>
        <tr><td>Description </td><td><input type="text" name="description" /></td></tr>
        <tr><td>Quantité</td><td><input type="number" name="qte" /></td></tr>
        <tr><td>Prix</td><td><input type="number" min="0.01" name="prix" /></td></tr>
        <tr><td>Catégories</td><td><label for="ctid"></label>
                                            <select id="ctid">
                                                <option value="1">Alimentaire</option>
                                                <option value="2">Vêtement</option>
                                                <option value="3">Jouet</option>
                                            </select></td></tr>
    </table>
    <input type="submit" value="Valider">
</form>