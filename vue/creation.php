<?php
$_SESSION['nom'] = $_GET['nom'];
$_SESSION['prenom'] = $_GET['prenom'];
$_SESSION['mail'] = $_GET['mail'];
$admin = getAdmin($_GET['nom'], $_GET['prenom'], $_GET['mail']);
$_SESSION['admin'] = $admin;
$id = getClientId($_GET['nom'], $_GET['prenom'], $_GET['mail']);
$_SESSION['id'] = $id;
$idPanier = getCartId($id);
$_SESSION['idPanier'] = $idPanier;
?>


<h2>Le compte est créé !</h2>
<form>
    <input type="button" value="Retour" onclick="window.location.href='index.php'" ?>
</form>