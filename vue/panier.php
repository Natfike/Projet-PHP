<?php $title = 'Panier'; ?>

<?php ob_start();?>

<?php
$panier = getCart();
$prixTotal = 0.0;
?>
<?php
if($panier!='n'){
    foreach($panier as $article) : ?>
        <?php
        $prix = $article["prixPublic"] * $article["quantite"];
        $prixTotal = $prixTotal + $prix;
        ?>
        <img src="<?=$article["imageProduit"]?>".alt="yo" width=260 height=400>
        <p><?=$article["nomProduit"] ?></p>

        <p>Prix unité : <?=$article["prixPublic"] ?>0€</p>
        <p>Prix total article :<?= $prix ?>0€ </p>
    
    <?php endforeach;
} ?>

<p>Prix total du panier : <?= $prixTotal ?>0€</p>

<?php 
if($panier != 'n'){
    echo "<input type=\"button\" value=\"Valider le panier\" onclick=\"window.location.href='index.php?action=valide'\">";
} ?>

<input type="button" value="Retour" onclick="window.location.href='index.php'">

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/template.php'; ?>