<div class="main">
    <div class="preschoix">
        <div class="presentation">
            <h2><?=$articles->getNom_produit($articles)?></h2>

            <h4>Ref : <?=$articles->getRef($articles)?></h4>

            <!-- images -->
        </div>

        <div class="choixuser">

            <div class="prix">
                <p><strong><?=$articles->getPrix_unitaire($articles)?> €</strong></p>
            </div>

            <div class="note">
                <h4>Note Utilisateurs</h4>
                <a href=""><i class="fas fa-star"></i></a><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>

            <div class="quantite">

                <form action="" method="post">
                    <label for="quantite">Quantité</label>
                    <select name="quantite" id="quantite">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    <div class="choix">
                        <button type="submit">Ajouter au panier</button>
                    </div>
                </form>
            </div>
            
        </div>

    </div>
    
    <div class="description">
        <p><?=$articles->getDescrip($articles)?></p>
    </div>

    <div class="voteClients">
        <h4>Vous voulez donner votre avis sur ce produit ?</h4>

        <?php if (!empty($error_messages)) : ?>
            <div>
                <ul>
                    <?php foreach($error_messages as $mgs) :?>
                        <li><?= $mgs ?></li>
                    <?php endforeach ?>
                </ul>
            </div>

        <?php endif; ?>

        <form action="" method="post">
            <label for="note">Votre Note :</label>
            <select name="note" id="note">
                <option value="1">Très mauvais</option>
                <option value="2">Mauvais</option>
                <option value="3">Moyen</option>
                <option value="4">Bon</option>
                <option value="5">Excellent</option>
            </select>

            <label for="commentaire">Votre Commentaire</label>
            <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Marquer votre commentaire ici :"></textarea>

            <button type="submit">Envoyer votre commentaire</button>
        </form>
    </div>

    <div class="avisclients">
        <h4>Avis Clients</h4>
        <table>
            <tr>
                <th>Nom client</th>
                <th>Note</th>
                <th>Commentaire</th>
            </tr>
            <?php foreach($avisClients as $avis) :?>
                <tr>
                    
                    <td><?=$avis["id_user"]?></td>
                    <td><?=$avis["note"]?></td>
                    <td><?=$avis["commentaire"]?></td>
                
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    
</div>