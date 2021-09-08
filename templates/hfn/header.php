<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/css/index.css">
    <script src="https://kit.fontawesome.com/00fca59a8b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <h1>RetroShop</h1>

        <nav>
            <ul>
                <li><a href="">Catégories</a>
                    <ul>
                        <li><a href="">Jeux Rétro</a></li>
                        <li><a href="">Jouets Rétro</a></li>
                        <li><a href="">Librairie</a></li>
                        <li><a href="">Films</a></li>
                        <li><a href="">Musique</a></li>
                        <li><a href="">Vêtements</a></li>
                    </ul>
                </li>
                <li><a href="">Tous les produits</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>

        <div class="search">
            <form action="search/" method="GET">
                <input type="text" placeholder="Que Cherches-tu ?">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="panier">
            <button><i class="fas fa-shopping-basket"></i></button> 
            <button><i class="fas fa-user"></i></button>
        </div>

    </header>

