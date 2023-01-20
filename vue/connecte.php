<?php
$_SESSION['nom'] = $_GET['nomCo'];
$_SESSION['prenom'] = $_GET['prenomCo'];
$_SESSION['mail'] = $_GET['mailCo'];
$id = getClientId($_GET['nomCo'], $_GET['prenomCo'], $_GET['mailCo']);
$_SESSION['id'] = $id;
$admin = getAdmin($_GET['nomCo'], $_GET['prenomCo'], $_GET['mailCo']);
$_SESSION['admin'] = $admin;
$idPanier = getCartId($id);
$_SESSION['idPanier'] = $idPanier;
?>


<h2>La connexion est réussie !</h2>
<form>
    <input type="button" value="Retour" onclick="window.location.href='index.php'" ?>
</form>