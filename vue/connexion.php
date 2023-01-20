<?php $title = 'Connexion'; ?>

<?php ob_start();?>

<p>Formulaire pour s'inscrire</p>
<form method="get">
    <label>Prénom :<input type="text" id="prenom" name="prenom" required></label><br>
    <label>Nom : <input type="text" id="nom" name="nom" required></label><br>
    <label>Email : <input type="email" id="mail" name="mail" required></label><br>

    <input type="submit" value="S'inscrire">
</form>
<br>
<p>-------------------------------------------------------------------------------</p>
<br>
<p>Formulaire pour se connecter</p>
<form method="get">
    <label>Prénom :<input type="text" id="prenomCo" name="prenomCo" required></label><br>
    <label>Nom : <input type="text" id="nomCo" name="nomCo" required></label><br>
    <label>Email : <input type="email" id="mailCo" name="mailCo" required></label><br>

    <input type="submit" value="Se connecter">
</form>

<input type="button" value="Retour" onclick="window.location.href='index.php'">

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/template.php'; ?>