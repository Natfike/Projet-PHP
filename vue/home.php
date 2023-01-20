<?php $title = 'Home'?>

<?php ob_start(); ?>

<?php echo $_SESSION['Michel']; ?>
<?php foreach ($articles as $article) : ?>
    <article>
        <div class="boite_articles">
            <h2 class="nomProduit"><?= $article["nomProduit"] ?></h2>
            <img src="<?=$article["imageProduit"]?>".alt="yo" width=129 height=200>
            <p><?= $article["prixPublic"] ?>0€</p>
            <form>
                <input type="button" class="buttonHorrible" value="Voir plus" onclick="window.location.href='index.php?action=article&id=<?= $article["idProduit"] ?>'">
            </form>
            </button>
        </div>
    </article>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/template.php'; ?>
