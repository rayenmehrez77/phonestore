<?php
session_start();

require("../config/commandes.php");

$edit = new Produit();

if(!isset($_SESSION['admin']) OR empty($_SESSION['admin']))
{
    header("Location: ../login.php");
}

if(!isset($_GET['id'])){
    header("Location: afficher.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: afficher.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];

        $leProduit = $edit->afficherUnProduit($id);
    }
}

foreach($_SESSION['admin'] as $i){
    $nom = $i->pseudo;
    $email = $i->email;
}

if(isset($_POST['valider']))
{
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));
        
            if(isset($_GET['id'])){

                if(!empty($_GET['id']) OR is_numeric($_GET['id']))
                {
                    $id = $_GET['id'];
                }
            }

        try 
        {
            $edit->modifier($id, $nom, $prix, $desc, $image); 
            header('Location: afficher.php');
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
    <title></title>
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
                        <a class="nav-link" href="supprimer.php">Suppression</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight: bold; color: green"
                            href="editer.php">Modification</a>
                    </li>

                </ul>
            </div>

            <a class="btn btn-danger " style="" href="destroy.php">Se
                deconnecter</a>

        </nav>
        </div>

    </header>

    <div class="album py-3 bg-light">
        <div class="container">
            <h5 style="color: #545659; opacity: 0.5; margin-bottom: 20px">Connect?? en tant que: <?= $nom ?></h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($leProduit as $produit): ?>


                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
                        <input type="name" class="form-control" name="image" value="<?= $produit->image ?>" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" name="nom" value="<?= $produit->nom ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" value="<?= $produit->prix ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" required><?= $produit->description ?></textarea>
                    </div>

                    <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
                </form>

                <?php endforeach; ?>

            </div>
        </div>
    </div>


</body>

</html>