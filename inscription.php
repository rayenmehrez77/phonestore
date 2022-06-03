<?php
    session_start();

    include "config/commandes.php";

    $newUser = new Produit(); 

    if(isset($_POST['envoyer']))
    {
        if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
        {
            $email = htmlspecialchars(strip_tags($_POST['email'])) ;
            $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prenom = htmlspecialchars(strip_tags($_POST['prenom']));

            $user = $newUser->ajouterUser($nom, $prenom, $email, $motdepasse);

            if($user){
                header('Location: login.php');
            }else{
                echo "Compte non créer !";
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
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign up - Phone Store</title>
</head>

<body>

    <div class="login"
        style="background-image: url('./images/phonebg.jpg'); height: 100vh; background-repeat: no-repeat; width: 100%; background-position: center; background-size: cover; background-color: rgba(1, 1, 1, 0.7)">
        <br>
        <div>
            <form method="post" class="form">
                <img src="./images/logo-black.png" class="mb-3">

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="name" name="nom" class="form-control" style="width: 100%;" placeholder="Votre email">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="name" name="prenom" class="form-control" style="width:  100%;"
                        placeholder="Votre prenom">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" style="width:  100%;"
                        placeholder="Votre email">
                </div>
                <div class="mb-3">
                    <label for="motdepasse" class="form-label">Mot de passe</label>
                    <input type="password" name="motdepasse" class="form-control" style="width:  100%;"
                        placeholder="Votre Mot de passe">
                </div>
                <br>
                <input type="submit" name="envoyer" class="btn btn-info" value="Envoyer">
                <h6>J'ai déja un compte? <a href="./login.php">Log in</a></h6>
            </form>
        </div>
    </div>
</body>

</html>