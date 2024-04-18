<?php
include("init/_init.php");


unset($_SESSION['panier']);
// Cette ligne supprime la valeur associée à la clé ‘panier’ de la session PHP. Elle efface efficacement la variable de session ‘panier’.

header('Location: panier.php?id=0');
// Cette ligne envoie un en-tête HTTP pour rediriger le navigateur de l’utilisateur vers la page “panier.php” avec un paramètre de requête supplémentaire “id=0”. L’utilisateur sera redirigé vers l’URL spécifiée.
exit; // Cette instruction met fin immédiatement à l’exécution du script.

