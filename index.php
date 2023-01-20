<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
</head>

<?php

session_start();

require __DIR__ . '/vue/header.php';
require __DIR__ . '/controller/controller.php';
try{
    
    if(isset($_GET['nom'])){
        if (!isset($_GET['nom']) || !isset($_GET['prenom']) || !isset($_GET['mail'])){
            throw new Exception('Please complete the form');
        }
        $exist = verifMail($_GET['mail']);
        if($exist->rowCount()===0){
            addClient($_GET['nom'], $_GET['prenom'], $_GET['mail']);
            require __DIR__ . '/vue/creation.php';
            return;
        } else {
            throw new Exception("Please select another email, it is already used");
        }
    }

    if(isset($_GET['nomCo'])){
        if (!isset($_GET['nomCo']) || !isset($_GET['prenomCo']) || !isset($_GET['mailCo'])){
            throw new Exception("Please complete the form");
        }
        $co = verifClient($_GET['nomCo'], $_GET['prenomCo'], $_GET['mailCo']);
        if ($co->rowCount() === 0){
            throw new Exception("We can't seem to find your account, maybe you did a little error");
        }

        require __DIR__ . '/vue/connecte.php';
        return;
    }

    if(isset($_GET['quantity'])){
        if(!isset($_GET['idArticle']) || !isset($_GET['quantity'])){
            throw new Exception("Veuillez choisir un article :P");
        }
        $verifArticle = verifArticle($_GET['idArticle']);
        if ($verifArticle){
            throw new Exception("L'article est déjà dans le panier !");
        }
        else{
            addArticlePanier($_GET['idArticle'],$_GET['quantity']);
            require __DIR__  . '/vue/ajout.php';
            return;
        }
    }

    if( isset($_GET['referenceA']) && isset($_GET['nomproduitA']) && isset($_GET['prixpublicA']) && isset($_GET['prixachatA']) && isset($_GET['imgA']) && isset($_GET['descriptionA']) && isset($_GET['quantiteproduitA']) && $_SESSION['admin'] === 'y'){
        addProduct($_GET['referenceA'], $_GET['nomproduitA'], $_GET['prixpublicA'], $_GET['prixachatA'], $_GET['imgA'], $_GET['descriptionA'], $_GET['quantiteproduitA']);
        require __DIR__ . '/vue/produitajoute.php';
        return;
    }

    if (isset($_GET['idProduitQ']) && isset($_GET['quantiteproduitQ']) && $_SESSION['admin'] === 'y'){
        changeQuantity($_GET['idProduitQ'],$_GET['quantiteproduitQ']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (isset($_GET['idProduitQ']) && isset($_GET['referenceproduitR']) && $_SESSION['admin'] === 'y'){
        changeReference($_GET['idProduitQ'], $_GET['referenceproduitR']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (isset($_GET['idProduitPP']) && isset($_GET['prixPublicPP']) && $_SESSION['admin'] === 'y'){
        changePP($_GET['idProduitPP'], $_GET['prixPublicPP']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (isset($_GET['idProduitPA']) && isset($_GET['prixPublicPA']) && $_SESSION['admin'] === 'y'){
        changePA($_GET['idProduitPA'], $_GET['prixPublicPA']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (isset($_GET['idProduitI']) && isset($_GET['imgI']) && $_SESSION['admin'] === 'y'){
        changeIMG($_GET['idProduitI'], $_GET['imgI']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (isset($_GET['idProduitD']) && isset($_GET['descD']) && $_SESSION['admin'] === 'y'){
        changeDESC($_GET['idProduitD'], $_GET['descD']);
        require __DIR__ . '/vue/changedProduct.php';
        return;
    }

    if (!isset($_GET['action'])){
        displayHome();
        return;
    }

    if ($_GET['action'] === 'article'){
        if (!isset($_GET['id'])){
            throw new Exception('Please specify an article id');
        }
    
        $article = getArticle(intval($_GET['id']));
    
        if (!$article){
            throw new Exception('Unable to find the article');
        }
    
        require __DIR__ . '/vue/article.php';
        return;
    }

    if ($_GET['action'] === 'connexion'){
        require __DIR__ . '/vue/connexion.php';
        return;
    }

    if ($_GET['action'] === 'deconnexion'){
        require __DIR__ . '/vue/deconnexion.php';
        return;
    }

    if ($_GET['action'] === 'panier'){
        require __DIR__ . '/vue/panier.php';
        return;
    }

    if ($_GET['action'] === 'valide'){
        require __DIR__ . '/vue/valide.php';
        return;
    }
    if ($_GET['action'] === 'admin'){
        if($_SESSION['admin']==="n"){
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/admin.php';
            return;
        }
    }

    if ($_GET['action'] === 'addProduit') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/addProduit.php';
            return;
        }
    }

    if ($_GET['action'] === 'changeQuantity') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changeQuantity.php';
            return;
        }
    }

    if ($_GET['action'] === 'changeRef') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changeRef.php';
            return;
        }
    }

    if ($_GET['action'] === 'changePP') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changePP.php';
            return;
        }
    }

    if ($_GET['action'] === 'changePA') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changePA.php';
            return;
        }
    }

    if ($_GET['action'] === 'changeImg') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changeImg.php';
            return;
        }
    }

    if ($_GET['action'] === 'changeDesc') {
        if ($_SESSION['admin'] === "n") {
            throw new Exception("Petit filou, tu n'es pas administrateur, tu ne peux pas venir ici :p");
        } else {
            require __DIR__ . '/vue/changeDesc.php';
            return;
        }
    }


    throw new Exception('Unable to find the page');

}  catch (Exception $e){
    $error = $e->getMessage();
    require __DIR__ . '/vue/error.php';
}