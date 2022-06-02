<?php

require("config/commandes.php");

$Produits=afficher();

?>

<!doctype html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link rel="stylesheet" href="./style.css">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Phone Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }


        /* Default height for small devices */
        #intro-example {
        height: 400px;
        }

        /* Height for devices larger than 992px */
        @media (min-width: 992px) {
        #intro-example {
            height: 600px;
        }

        .mask {
            height: 100vh;
        }
}
    </style>
    </head>
<body>
    <header>
        <div class="navv">
        <a href="index.php" style="text-decoration: none; font-size: 30px; color: white">Phone Store</a>
            </span><a class="btn btn-light action-button" role="button" href="login.php">Se connecter</a>
        </div>
    </header>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach($Produits as $produit): ?>
                    <div class="col-md-3 ">
                        <div class="card mb-4 box-shadow"  style="background-color: rgba(255,0,0,0.1);">
                        <img style="height: 250px; object-fit: cover" src="<?= $produit->image ?>" >
                            <div class="card-body">
                            <h3><?= $produit->nom ?></h3>
                            <p class="card-text"><?= substr($produit->description, 0, 160); ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success">Voir plus</button></a>
                                </div>
                                <small class="text" style="font-weight: bold;"><?= $produit->prix ?> €</small>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <footer class="text-center text-white" style="background-color: #caced1;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 80, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://rayenmehrez.netlify.app/">Rayen Mehrez</a>
        </div>
    </footer>
    </main>
</body>
</html>