<?php
include("init/_header.php");
$pdoStatement = $pdo->query("SELECT * FROM article WHERE id_article = $_GET[id]");
$produit = $pdoStatement ->fetch();
?>


<div class=" d-flex justify-content-center mt-5">
<div class="card" style="width: 30rem;">
  <img src="<?= $produit['url_image'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <div class=" d-flex flex-row justify-content-center">
        <h5 class="card-title text-center me-5"><?= $produit['titre'] ?></h5>
        <p class="fst-italic"><?= $produit['marque'] ?></p>
    </div>
    <p class="card-text"><?= $produit['description'] ?></p>
  </div>
  <div class=" d-flex justify-content-evenly align-items-center">
      <a href="panier.php?id=<?= $produit['id_article'] ?>" class="btn btn-outline-success" style="background-color:#aed7ae">Ajouter au panier</a>
    <p class=" mt-2 fw-bold"><?= $produit['prix'] ?> €</p>
</div>
  </ul>
  <div class="card-body">
    
  </div>
</div>
</div>
<br>
<br>
<br>
<br>
<?php
include("init/_footer.php");









