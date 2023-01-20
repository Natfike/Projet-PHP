<?php $title = 'Article'; ?>

<?php ob_start();?>


<?php foreach ($article as $test) : ?>
    <div class="boite_article">
        <div class="article_general">
            <h2><?= $test['nomProduit'] ?></h2>
            <img src="<?=$test["imageProduit"]?>".alt="yo" width=260 height=400>
            <p><?= $test['Description'] ?></p>
        </div>
        <div class="article_prix">
            <p><?= $test['prixPublic'] ?>0€</p>
        </div>
        <?php if(isset($_SESSION['id'])){
            echo "<div class=\"Choix_quantité\">";
                echo "<form method=\"get\">" ;
                    echo "<input type=\"hidden\" name=\"idArticle\" value=".$test['idProduit'].">";
                    echo "<label>Quantité :<input type=\"number\" id=\"quantity\" name=\"quantity\" min=\"1\" max=\"".$test['quantiteProduit']."\"></label>";
                    echo "<input type=\"submit\" value=\"Ajouter au panier\">";
                echo "</form>";
            echo "</div>";
        } else {
            echo "Veuillez vous connecter pour remplir votre panier.";
        }?>
        
    </div>
    


<?php endforeach ?>

<input type="button" value="Retour" onclick="window.location.href='index.php'">

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/template.php'; ?>