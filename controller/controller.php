<?php

require __DIR__ . '/../model/model.php';

function displayHome()
{
    $articles = getProduct();
    require __DIR__ . '/../vue/home.php';
}

function displayArticle(int $id)
{
    try{
        if (!isset($_GET['id'])){
            throw new Exception('Please specify an article id');
        }
    
        $article = getArticle(intval($_GET['id']));
    
        /*if (!$article){
            throw new Exception('Unable to find the article');
        }*/
    
        require __DIR__ . '/vue/article.php';
    }  catch (Exception $e){
        $error = $e->getMessage();
        require __DIR__ . '/vue/error.php';
    }
    $article = getArticle($id);
    require __DIR__ . '/../vue/article.php';
}

function displayConnexion()
{
    require __DIR__ . '/../vue/connexion.php';
}

function displayError(string $message)
{
    require __DIR__ . '/../vue/error.php';
}