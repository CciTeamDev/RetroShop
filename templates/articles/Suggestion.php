<div class="main">
    <div class="suggestion">
        <h1>Les Nouveaux Produits:</h1>
        <?php foreach ($articles as $article) : ?>
            <div>
            <h2><?= $article["nom_produit"]; ?></h2>
            <img src="<?= $article["pic"] ?>" alt="" srcset="">
            <button>En Savoir Plus</button>
            <button>Acheter</button>
    </div>
<?php endforeach ?>
</div>
</div>