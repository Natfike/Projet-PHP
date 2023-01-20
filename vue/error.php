<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

<?= $error ?>
<form>
    <input type="button" value="Retour" onclick="window.location.href='index.php'" ?>
</form>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/template.php'; ?>