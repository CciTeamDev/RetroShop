<div class="main">
    <div class="suggestion">
        <h1>Les Nouveaux Produits:</h1>
        <?php foreach ($articles as $article) : ?>
            <h2><?= $article->getNom_produit(); ?></h2>
            <button>En Savoir Plus</button>
            <button>Acheter</button>
            <img src="<?= $article["pic"] ?>" alt="" srcset="">
            <button>En Savoir Plus</button>
            <button>Acheter</button>
    </div>
<?php endforeach ?>
</div>
</div>