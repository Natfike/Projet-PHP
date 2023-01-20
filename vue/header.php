

<div class="navbar">
  <div class="navbar-left">
    <input type="button" value="Accueil" onclick="window.location.href='index.php'">
  </div>
  <div class="navbar-middle">
    <span>MANGA MOINS</span>
  </div>
  <div class="navbar-right">
    <?php
      if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'y'){
        echo "<input type=\"button\" value= \"Administration\" onclick=\"window.location.href='index.php?action=admin'\">";
      }
    ?>
    <input type="button" value="panier" onclick="window.location.href='index.php?action=panier'">
    <?php 
    if (isset($_SESSION['nom'])){
      echo "<input type=\"button\" value= \"Deconnexion\" onclick=\"window.location.href='index.php?action=deconnexion'\">";
    } else{
      echo "<input type=\"button\" value=\"Conenxion\" onclick=\"window.location.href='index.php?action=connexion'\">";
    }
    ?>
  </div>
</div>