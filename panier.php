<?php 
    include("init/_header.php");

    $pdoStatement = $pdo->query("SELECT * FROM article WHERE id_article = $_GET[id]");
    /*
Requête à la base de données :
$pdoStatement = $pdo->query("SELECT * FROM article WHERE id_article = $_GET[id]"); exécute une requête SQL pour récupérer un enregistrement spécifique de la table “article” dans votre base de données. L’ID de l’article est obtenu à partir du paramètre de requête $_GET['id'].
    */

    $produit = $pdoStatement ->fetch();
    // $produit = $pdoStatement->fetch(); récupère le premier enregistrement (ou false si aucun enregistrement n’est trouvé) et le stocke dans la variable $produit.
    
    if($produit){
        $_SESSION['panier'][] = $produit;
    }
    /* Ajout au panier :
if ($produit) { $_SESSION['panier'][] = $produit; } vérifie si un produit a été trouvé (non vide) dans la base de données. Si c’est le cas, il est ajouté à la variable de session $_SESSION['panier'].*/




function montantTotal() : array
{
    $array = [
        'montant' => 0,
        'fdp' => 0
    ];
    /* Cette fonction calcule le montant total des articles dans le panier et les frais de port associés.
Elle renvoie un tableau associatif avec deux clés :
    'montant' : le montant total des articles dans le panier.
    'fdp' : les frais de port (initialisés à 0).*/

    $montant = 0;

    foreach ($_SESSION['panier'] as $produit) {
        $montant += $produit['prix'] * $produit['quantite'];
    }

    $array['montant'] = $montant;


    if ($montant < 250) {
        // $montant += 10;
        $array['fdp'] = 10;
    }
    return $array;
}
/* La boucle foreach parcourt tous les produits dans le panier et met à jour le montant total en multipliant le prix par la quantité.
 Si le montant total est inférieur à 250, les frais de port sont fixés à 10.*/



   
    ?>
        <h1 class="text-center m-4">Panier</h1>
        <?php 
        // Si le panier est vide (empty($_SESSION['panier'])), un message indiquant que le panier est vide est affiché.
       if (empty($_SESSION['panier'])) {
        echo "<h3 class='text-center mt-5 pt-5'>Votre panier est vide!</h3>";
    } else { ?>
    <!-- Sinon, un tableau est généré pour afficher les détails de chaque produit dans le panier : -->
        <table class="table text-center table-bordered w-50 mx-auto">

<thead>
    <tr>
        <th>Titre</th>
        <th>Prix (€)</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>
</thead>


<tbody>

    <?php foreach($_SESSION['panier'] as $produits) : 
       
       
        
        ?>
       
        <tr>
            <td><?= $produits['titre'] ?></td>
            <td><?= $produits['prix'] ?></td>
            <td><?= $produits['quantite'] ?></td>
            <td><?= $produits['quantite'] * $produits['prix'] ?></td>
        </tr>
        
    <?php endforeach; ?>

</tbody>

<tfoot>
    <tr>
        <td colspan="3">Montant</td>
        <td><?= montantTotal()['montant']; ?> €</td>
    </tr>
    <tr>
        <td colspan="3">Frais de port<br><i>(Si le montant est en dessous de 250€)<i/></td>
        <td><?= montantTotal()['fdp'] ; ?> €</td>
    </tr>
    <tr>
        <td colspan="3">Montant total</td>
        <td><?= montantTotal()['montant'] + montantTotal()['fdp']; ?> €</td>
    </tr>
</tfoot>
</table>
<button type="button" style="background-color:#aed7ae" class="btn btn-outline-success mx-auto d-flex justify-content-center">
    <a href="suppression.php" class="h6 text-decoration-none pt-1">Supprimer le panier</a>
</button>
<br><br><br><br>
<?php 
    }
    ?>
<?php 

    include("init/_footer.php");  
