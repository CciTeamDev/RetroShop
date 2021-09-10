<?php
$title = "Editer un utilisateur";

if (!empty($errors)) :
?>
    <div>
        <ul>
            <?php foreach ($errors as $msg) : ?>
                <li><?= $msg ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<form action="" method="post">
    <label for="nom">nom : </label><input type="text" name="nom" id="nom" value="<?= $user->getNom() ?>">
    <label for="prenom">prenom : </label><input type="text" name="prenom" id="prenom" value="<?= $user->getPrenom() ?>">
    <label for="genre">genre : </label><input type="text" name="genre" id="genre"value="<?= $user->getGenre() ?>">
    <label for="date_naissance">date_naissance : </label><input type="date" name="date_naissance" id="date_naissance"value="<?= $user->getDate_naissance() ?>">
    <label for="email">Email : </label><input type="text" name="email" id="email"value="<?= $user->getEmail() ?>">
    <label for="mot_passe">Mot de passe : </label><input type="password" name="mot_passe" id="mot_passe">
    <label for="adresse">adresse : </label><input type="text" name="adresse" id="adresse"value="<?= $user->getAdresse() ?>">
    <label for="cp">cp : </label><input type="text" name="cp" id="cp"value="<?= $user->getCp() ?>">
    <label for="ville">ville : </label><input type="text" name="ville" id="ville"value="<?= $user->getVille() ?>">
    <label for="tel">tel : </label><input type="text" name="tel" id="tel"value="<?= $user->getTel() ?>">
    <input type="submit" value="Envoyer">
</form>
