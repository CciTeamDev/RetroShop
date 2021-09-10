<div class="main">

    <div class="intro">

        <div class="text">
            <h1>RetroShop</h1>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Libero maiores, praesentium tempore dolor amet similique pariatur, 
                illo non esse dolorem eum at nemo laudantium architecto suscipit 
                et recusandae temporibus ut! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Libero maiores, praesentium tempore dolor amet similique pariatur, 
                illo non esse dolorem eum at nemo laudantium architecto suscipit 
                et recusandae temporibus ut! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Libero maiores, praesentium tempore dolor amet similique pariatur, 
                illo non esse dolorem eum at nemo laudantium architecto suscipit 
                et recusandae temporibus ut! Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Libero maiores, praesentium tempore dolor amet similique pariatur, 
                illo non esse dolorem eum at nemo laudantium architecto suscipit 
                et recusandae temporibus ut! </p>
        </div>

        <div class="image">
            
        </div>
        
    </div>

    

    <div class="suggestion">

        <h2>Les Nouveaux Produits:</h2>

        <div class="newProduit">
            <?php foreach($articles as $article) : ?>
                <div class="produit">
                    
                    <img src="<?=$article["pic"]?>" alt="" srcset="">

                    <h3><?=$article["nom_produit"]?></h3>

                    <button> <a href="">En Savoir Plus</a> </button>
                    <button><a href="">Acheter</a> </button>

                </div>
            <?php endforeach?> 
        </div>
    </div>

    <div class="promo">
        <h2>Les promotions du moment :</h2>

        <img src="../../img/code-promo.jpg" alt="image promo">
    </div>
</div>
