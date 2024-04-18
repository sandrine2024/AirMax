<?php 
    include("init/_header.php");
    // La ligne include("init/_header.php"); inclut un fichier PHP externe nommé “_header.php”. Ce fichier contient probablement du code HTML ou PHP commun partagé entre plusieurs pages de votre site web. C’est une bonne pratique de séparer le code réutilisable dans des fichiers distincts pour une meilleure organisation et maintenabilité.



    $pdoStatement = $pdo->query('SELECT * FROM article');
    /* Requête à la base de données :
$pdoStatement = $pdo->query('SELECT * FROM article'); exécute une requête SQL pour récupérer tous les enregistrements d’une table nommée “article” dans votre base de données. Le résultat est stocké dans la variable $pdoStatement.
L’objet $pdo représente une connexion PDO (PHP Data Objects) à votre base de données. On suppose que vous avez déjà établi une connexion à la base de données ailleurs dans votre code.
    */
    $produits = $pdoStatement->fetchAll();
    /*
    Récupération des données :
$produits = $pdoStatement->fetchAll(); récupère toutes les lignes de la requête exécutée et les stocke dans le tableau $produits. Chaque ligne correspond à un enregistrement d’artic
    */

    


    ?>
        <h1 class="text-center m-4">Catalogue</h1>

        <div class="row justify-content-center w-75 mx-auto pb-5 mb-5">
            <!-- Le code suivant à l’intérieur de la boucle foreach génère une carte pour chaque article  -->
        <?php foreach($produits as $article) : ?>
            <div class="shadow text-center p-4 m-2 col-lg-3 col-md-6">
                <a style="text-decoration: none ; color: #000 " href="detail.php?id=<?= $article['id_article']; ?>">
                    <h3><?php echo $article['titre']; ?></h3>
                    <img src="<?= $article['url_image'] ?>" alt="<?=$article['titre']?>" style="height:300px; width:200px" >
                    <div class="d-flex justify-content-between mt-5"> 
                        <a  href="panier.php?id=<?= $article['id_article']; ?>"  class="fa-solid fa-basket-shopping  " style="color: #aed7ae; border: none"></a>                   
                        <h5 "><?php echo $article['prix']; ?>€</h5>
                    </div>
                </a>
                <!--  Affiche le prix de l’article en euros. -->
            </div>
        <?php endforeach; ?>
        <!-- Cette ligne indique la fin de la boucle foreach et permet de fermer correctement le bloc de code. Assurez-vous d’ajouter le point-virgule pour que votre code fonctionne comme prévu.😊 -->
    </div>
        
   
        
        
        
    <?php 
    include("init/_footer.php");  

 