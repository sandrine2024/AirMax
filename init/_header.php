<?php 
    include("init/_init.php");


    $titreMessage ='';
    $prixMessage ='';
    $quantiteMessage = '';
    $imageMessage = '';


    if($_POST){

        $acces = true; 
        if(empty($_POST['titre'])){
            $acces = false;
            $titreMessage = '<p class ="text-danger"> Veuillez saisir le titre </p>';
        }
        if(strlen($_POST['titre'] < 3 OR strlen($_POST['titre'])  > 25 )){
            $acces = false;
            $titreMessage = '<p class ="text-danger"> Veuillez saisir un titre en 3 et 25 caractères </p>';
        }
        if(empty($_POST['prix'])){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir le prix </p>';
        }
        if(!is_numeric($_POST['prix'])){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir un nombre </p>';
        }
        if($_POST['prix'] <= 0){
            $acces = false;
            $prixMessage = '<p class ="text-danger"> Veuillez saisir un nombre supérieur à 0. </p>';
        }
        if(empty($_POST['quantite'])){
            $acces = false;
            $quantiteMessage = '<p class ="text-danger"> Veuillez saisir la quantité </p>';
        }
        if($_POST['quantite'] <= 0){
            $acces = false;
            $quantiteMessage = '<p class ="text-danger"> Veuillez saisir un nombre supérieur à 0. </p>';
        }
        if(empty($_POST['image'])){
            $acces = false;
            $url_imageMessage = '<p class ="text-danger"> Veuillez saisir le champs </p>';
        }


        if($acces){

            $pdo->exec("INSERT INTO article(titre,prix,quantite,url_image) VALUE('$_POST[titre]', $_POST[prix],$_POST[quantite],'$_POST[image]')");

        }

    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Air Max</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="image/Air.png" type="image/x-icon"/>
  </head>
  <body>


<nav class="navbar navbar-expand-lg  shadow" style="background-color:#aed7ae">
  <div class="container-fluid">
    <img src="image/Air.png" alt="" style="height:60px" >
    <h3 class="navbar-brand">Air Max</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="catalogue.php">Catalogue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="panier.php?id=0">Panier</a>
        </li">     
      </ul>
      <div class="dropdown">
        <a style="text-decoration:none" href="deconnection.php" class="btn">Déconnection</a>
  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
  Ajouter article
  </button>
  <form class="dropdown-menu p-4" method="POST">
    <div class="mb-3">
      <input type="text" class="form-control" name="titre" placeholder="titre">
      <?= $titreMessage; ?>
    </div>
    <div class="mb-3">
      <input type="number" class="form-control" step="0.01" name="prix" placeholder="prix">
      <?= $prixMessage; ?>
    </div>
    <div class="mb-3">
      <input type="number" class="form-control" name="quantite" placeholder="quantite">
      <?= $quantiteMessage; ?>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" name="image" placeholder="url_image">
      <?= $imageMessage; ?>
    </div>
    <div class="mb-3">
    </div>
    <button type="submit" class="btn btn-success"> Envoyer</button>
  </form>
</div>
    </div>
  </div>
</nav>
    <main>