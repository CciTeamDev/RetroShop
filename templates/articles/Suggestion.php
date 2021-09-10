<div class="main">
    <div class="suggestion">
        <h1>Les suggestions (ou tous les produits ?) :</h1>
        <?php foreach($articles as $article) : ?>
            <h2><?=$article->getNom_produit();?></h2>

            <button>En Savoir Plus</button>

            <button>Acheter</button>

        <?php endforeach?>
    </div>
</div>


