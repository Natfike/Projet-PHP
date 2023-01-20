<?php

/**
 * Make a connection to the database
 * 
 * @return PDO
 */

function getDatabase(): PDO
{
    $user = '';
    $password = '';
    $host = '';
    $dbname = '';
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password);
}

/**
 * Get articles
 * 
 * @return array|false
 */
function getProduct()
{
    $db = getDatabase();
    return $db->query("SELECT * FROM  `produit`;");
}

function getArticle($id)
{
    $db = getDatabase();
    return $db->query("SELECT * FROM `produit` WHERE idProduit='" . $id . "';");
}

function addClient($nom,$prenom,$mail)
{
    $db = getDatabase();
    $sql = "INSERT INTO clients (nomCli,prenomCli,mail,admin) VALUES (\"$nom\", \"$prenom\", \"$mail\",\"n\")";
    $insert = $db->query($sql);
    $id = getClientId($nom,$prenom,$mail);
    addCart($db, $id);
}

function verifMail($mail)
{
    $db = getDatabase();
    return $verif = $db->query("SELECT mail FROM clients WHERE mail=\"$mail\";");
}

function verifClient($nom,$prenom,$mail)
{
    $db = getDatabase();
    $sql = "SELECT nomCli, prenomCli, mail FROM clients WHERE nomCli=\"$nom\" and prenomCli=\"$prenom\" and mail=\"$mail\";";
    return $db->query($sql);
}

function getClientId($nom,$prenom,$mail)
{
    $db = getDatabase();
    $sql = "SELECT idCli FROM clients WHERE nomCli=\"$nom\" and prenomCli=\"$prenom\" and mail=\"$mail\";";
    $id = $db->query($sql)->fetch();
    $return = $id['idCli'];
    return $return;
}

function getAdmin($nom,$prenom,$mail)
{
    $db = getDatabase();
    $sql = "SELECT admin FROM clients WHERE nomCli=\"$nom\" and prenomCli=\"$prenom\" and mail=\"$mail\";";
    $admin = $db->query($sql)->fetch();
    $return = $admin['admin'];
    return $return;
}

function addCart(PDO $db,$id)
{
    $db->query("INSERT INTO panier (idClient) VALUES($id)");
}

function getCartId($id)
{
    $db = getDatabase();
    $row = $db->query("SELECT idPanier FROM panier WHERE idClient=\"$id\"")->fetch();
    return $row['idPanier'];
}

function verifArticle(int $idArticle)
{
    $db = getDatabase();
    $sql = "SELECT * FROM produitpanier WHERE idPanier=\"" . $_SESSION['idPanier']."\" and idProduit=\"$idArticle\"";
    $query = $db->query($sql);
    if ($query->rowCount()===0){
        return false;
    }else{
        return true;
    }
}

function addArticlePanier($idArticle, $quantity)
{
    $db = getDatabase();
    $sql = "INSERT INTO produitpanier VALUES(\"" . $_SESSION['idPanier'] . "\", \"$idArticle\", $quantity)";
    $db->query($sql);
}

function getCart()
{
    $db = getDatabase();
    if($_SESSION['idPanier']!=''){
        $sql = "SELECT nomProduit, prixPublic, imageProduit, quantite FROM produitpanier JOIN produit WHERE idPanier=" . $_SESSION['idPanier'] . " and produit.idProduit = produitpanier.idProduit;";
        return $db->query($sql);
    } else {
        return 'n';
    }
}

function deletePanier()
{
    $db = getDatabase();
    $sql = "DELETE FROM produitpanier WHERE idPanier=". $_SESSION['idPanier'];
    $db->query($sql);
}

function addProduct($reference, $nom, $prixP, $prixA, $img, $desc, $qt)
{
    $db = getDatabase();
    $sql = "INSERT INTO produit (Référence, nomProduit, prixPublic, prixAchat, imageProduit, Description, quantiteProduit) VALUES (\"$reference\", \"$nom\", $prixP, $prixA, \"$img\", \"$desc\", $qt);";
    $db->query($sql);
}

function changeQuantity($id,$qt)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET quantiteProduit=$qt WHERE idProduit=$id";
    $db->query($sql);
}

function changeReference($id,$ref)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET Référence=\"$ref\" WHERE idProduit=$id";
    $db->query($sql);
}

function changePP($id,$pp)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET prixPublic=$pp WHERE idProduit=$id";
    $db->query($sql);
}

function changePA($id,$pa)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET prixAchat=$pa WHERE idProduit=$id";
    $db->query($sql);
}

function changeIMG($id,$img)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET imageProduit=\"$img\" WHERE idProduit=$id";
    $db->query($sql);
}

function changeDESC($id,$desc)
{
    $db = getDatabase();
    $sql = "UPDATE produit SET Description=\"$desc\" WHERE idProduit=$id";
    $db->query($sql);
}
?>
