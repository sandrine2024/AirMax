<?php 
    include("init/_init.php");

$pseudoMessage ="";
$emailMessage ="";
$passwordMessage ="";

if($_POST) {
    $acces = true; 
    if(empty($_POST['pseudo'])){
        $acces = false;
        $pseudoMessage = '<p class ="text-danger"> * Veuillez renseigner le champ </p>';
    }
    if(empty($_POST['email'])){
        $acces = false;
        $emailMessage = '<p class ="text-danger"> * Veuillez renseigner le champ </p>';
    }
    if(empty($_POST['password'])){
        $acces = false;
        $passwordMessage = '<p class ="text-danger"> * Veuillez renseigner le champ </p>';
    }
    if($acces){
        $pdo->exec("INSERT INTO user(pseudo, email , password) VALUES('$_POST[pseudo]' ,'$_POST[email]','$_POST[password]')");
        header('Location: index.php');
        exit;
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
    <header>
        <h1 class="text-center" style="margin: 100px">Inscription</h1>
    </header> 
    <main class="d-flex mx-auto flex-column w-50">
        <form method="post" class="row g-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="pseudo" id="floatingInput" placeholder="Pseudo">
            <label for="floatingInput">Pseudo</label>
            <?= $pseudoMessage; ?>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            <?= $emailMessage; ?>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <?= $passwordMessage; ?>
        </div>
        
        <div class="d-flex justify-content-center mx-auto mt-3" >
            <button type="submit" class="btn btn-outline-success w-25" style="background-color: #aed7ae">S'inscrire</button>
        </div>
    </form>
    </main>


</body>
</html>