<?php
session_start();

include "config/commandes.php";

if(isset($_SESSION['admin']))
{
    if(!empty($_SESSION['admin']))
    {
        header("Location: admin/afficher.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login - Phone Store</title>
</head>
<body >
    <div class="login"  style="background-image: url('./images/bglogin.jpg'); height: 100vh; background-repeat: no-repeat; width: 100%; background-position: center; background-size: cover; background-color: rgba(1, 1, 1, 0.7)">
    <div class="opacity"></div>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div>
            <form class="form" method="post">
            <img src="https://thumbs.dreamstime.com/b/mobile-phone-store-logo-you-can-use-many-purpose-such-new-project-presentation-document-website-etc-smartphone-shop-template-148053896.jpg"> 
            <input type="email" name="email" placeholder="Email"  >
            <input type="password" name="motdepasse" placeholder="Password">
            <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>
<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $admin = getAdmin($email, $motdepasse);

        if($admin){
            $_SESSION['admin'] = $admin;
            header('Location: admin/afficher.php');
        }else{
            header('Location: index.php');
        }
    }
}

?>