<?php

    require("config/commandes.php");
    $Produits= new Produit(); 
    
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


    #intro-example {
        height: 400px;
    }

    @media (min-width: 992px) {
        #intro-example {
            height: 600px;
        }

        .mask {
            height: 100vh;
        }
    }

    #intro-example {
        height: 400px;
    }

    @media (min-width: 992px) {
        #intro-example {
            height: 600px;
        }
    }
    </style>
</head>

<body>
    <header>
        <div id="intro-example" class="text-center bg-image"
            style="background-image: url('./images/phonebg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat">

            <nav
                style="display: flex; justify-content: space-between; padding: 0 30px ;align-items: center; background-color: rgba(0, 0, 0, 0.7);">
                <a class="" href="./index.php">
                    <img src="./images/logo-white.png" style="height: 90px; object-fit: cover" alt="Phone Store" />
                </a>

                <a class="btn btn-primary me-3" style="text-decoration: none" href="login.php">
                    Se connecter
                </a>
            </nav>


            <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
                <div class="d-flex justify-content-center align-items-center h-50" ">
                    <div class=" text-white">
                    <h1 class="mb-4">Bienvenue Chez Phone Store</h1>
                    <h5 class="mb-4">Achat sur internet produits high-tech aux meilleurs prix</h5>
                    <a class="btn btn-outline-light btn-lg m-2" style="text-decoration: none" href="login.php"
                        role="button">Acheter Maintenant</a>
                </div>
            </div>
        </div>
        </div>

    </header>

    <main role="main">
        <div class="album py-5 bg-light">
            <h3 style="margin-left: 55px; margin-bottom: 25px; text-align: center">Tout les produits</h3>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                    <?php foreach($Produits->afficher() as $produit): ?>
                    <div class="col-md-3 ">
                        <div class="card mb-4 p-2 box-shadow" style="background-color: rgba(120,0,0,0.1);">
                            <img style="height: 200px; width: 200px; object-fit: contain; margin: 0 auto"
                                src="<?= $produit->image ?>">
                            <div class="card-body">
                                <h5><?= $produit->nom ?></h5>
                                <p class="card-text" style="font-size: 15px">
                                    <?= substr($produit->description, 0, 160); ?>...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="produit.php?pdt=<?= $produit->id ?>"
                                            class="d-block btn btn-sm btn-success">
                                            Voir plus
                                        </a>
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
        <footer class="text-center text-white" style="background-color: #0a4275;">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Développer par Rayen Mehrez
                <a class="text-white" href="https://rayenmehrez.netlify.com/">Rayen Mehrez</a>
            </div>
        </footer>
    </main>
</body>

</html>