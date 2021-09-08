<?php 


?>

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

                <form action="" method="">
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
                        <button type="submit">Acheter</button>
                    </div>
                </form>
            </div>
            
        </div>

    </div>
    
    <div class="description">
        <p><?=$articles->getDescrip($articles)?></p>
    </div>

    <div class="avisclients">
        <h4>Avis Clients</h4>
        <table>
            <tr>
                <th>Nom client</th>
                <th>Note</th>
                <th>Commentaire</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    
</div>