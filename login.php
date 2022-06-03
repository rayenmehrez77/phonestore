<?php
    session_start();
    include "config/commandes.php";

    $user = new Produit(); 
    $error = ""; 

    if(isset($_SESSION['admin']) OR !empty($_SESSION['admin'])) {
        header("Location: admin/afficher.php");
    }

    if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        header("Location: client/client.php");
    }

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));        

        $admin = $user->getAdmin($email, $motdepasse);
        $utlilisateur = $user->getUsers($email, $motdepasse); 

        if($admin){
            $_SESSION['admin'] = $admin;
            header('Location: admin/afficher.php');
        } else if ($utlilisateur) {
            $_SESSION['user'] = $user;
            header('Location: client/client.php');
        }
        else {
            $error = "Votre mot de pass ou votre email est incorrent! Veuillez réessayer! ";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login - Phone Store</title>
</head>

<body>
    <div class="login"
        style="background-image: url('./images/phonebg.jpg'); height: 100vh; background-repeat: no-repeat; width: 100%; background-position: center; background-size: cover; background-color: rgba(1, 1, 1, 0.7)">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div>
            <form class="form" method="post">
                <img src="./images/logo-black.png">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="motdepasse" placeholder="Password">
                <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter">
                <p class="text-danger text-bold"><?= $error ?></p>
                <h6>Tu n'a pas un compte? <a href="./inscription.php">Sign up</a></h6>
            </form>
        </div>
    </div>
</body>

</html>