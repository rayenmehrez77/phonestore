<?php
session_start();

  require("../config/commandes.php");
  $sup = new Produit(); 

  if(!isset($_SESSION['admin']))
  {
      header("Location: ../login.php");
  }

  if(empty($_SESSION['admin']))
  {
      header("Location: ../login.php");
  }

  $Produits=$sup->afficher();

  foreach($_SESSION['admin'] as $i){
    $nom = $i->pseudo;
    $email = $i->email;
  }

  if(isset($_POST['valider']))
  {
    if(isset($_POST['idproduit']))
    {
    if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit']))
	    {
	    	$idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

          try 
          {
            $sup->supprimer($idproduit);
            
          } 
          catch (Exception $e) 
          {
          	$e->getMessage();
          }

	    }
    }
  }
  ?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../afficher-style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <title>Supprimer</title>
</head>

<body>


    <header>
        <nav class="navbarr">
            <div class="left">
                <a href="./index.php">
                    <img src="../images/logo-black.png" style="height: 80px; object-fit: cover" alt="Phone Store" />
                </a>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../admin/afficher.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="supprimer.php"
                            style="font-weight: bold; color: green">Suppression</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editer.php">Modification</a>
                    </li>

                </ul>
            </div>

            <a class="btn btn-danger " style="" href="destroy.php">Se
                deconnecter</a>

        </nav>
        </div>

        <div class="p-5 text-center bg-light">
            <h1 style="color: #545659; opacity: 0.5; margin-left: 70px">Connecté en tant que: <?= $nom ?></h1>

        </div>

    </header>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <form method="post">
                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>

                            <input type="number" class="form-control" name="idproduit" required>
                        </div>

                        <button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button>
                </form>

            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach($Produits as $produit): ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="<?= $produit->image ?>">

                        <h3><?= $produit->id ?></h3>

                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

</body>

</html>