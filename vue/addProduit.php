<p>Veuillez saisir les informations liés au nouveau produit :</p>
<form method="get">
    <label>Référence : <input type="text" id="reference" name="referenceA" required></label>
    <label>NomProduit : <input type="text" id="nomproduit" name="nomproduitA" required></label>
    <label>PrixPublic : <input type="number" id="prixpublic" name="prixpublicA" min="0" step=".01" required></label>
    <label>PrixAchat : <input type="number" id="prixachat" name="prixachatA" min="0" step=".01" required></label>
    <label>ImageProduit : <input type="text" id="img" name="imgA" required></label>
    <label>Description : <input type="text" id="description" name="descriptionA" required></label>
    <label>QuantiteProduit : <input type="number" id="quantiteProduit" name="quantiteproduitA" required></label>
    <input type="submit" value="Rajouter">
</form>

<input type="button" value="Retour" onclick="window.location.href='index.php?action=admin'">