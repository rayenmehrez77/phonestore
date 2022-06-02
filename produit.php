<?php

    require("config/commandes.php");

    $Produits=afficher();

    if(isset($_GET['pdt'])){
        
        if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
        {
            $id = $_GET['pdt'];
        }
    }

    ?>

    <!doctype html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.80.0">
        <title>Phone store</title>
        <link rel="stylesheet" href="./style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
        </style>


    </head>
    <body>

    <header>
            <div class="navv">
            <a href="index.php" style="text-decoration: none; font-size: 30px; color: white">Phone Store</a>
                </span><a class="btn btn-light action-button" role="button" href="login.php">Se connecter</a>
    </div>
        
    </header>

    <main>

    <div class="album py-5 bg-light">
    <div class="container p-5" style="display: flex; justify-content: center">

            <div class="row">
        <div class="col-md-2"></div>
        <?php foreach($Produits as $produit){ if($produit->id == $id){ ?> 
                <div class="col-md-8">
                    <div class="card shadow-sm" >
                        <h3 align="center"><?= $produit->nom ?></h3>
                        <img src="<?= $produit->image ?>" style="width: 300px; margin: 30px auto">

                        <div class="card-body">
                        <p class="card-text"><?= $produit->description ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success">Commander</button></a>
                            </div>
                            <small class="text" style="font-weight: bold;"><?= $produit->prix ?> €</small>
                        </div>
                        </div>
                    </div>
                    </div>
        <?php }} ?>

        </div>
    </div>
    </div>

    </main>
    <br>
    <br>
    <br>
    <br>
    </body>
    </html>
