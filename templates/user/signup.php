<?php
$title = "Identifiez vous !";
//include 'header.php';

if (!empty($error_messages)) : ?>
    <div>
        <ul>
            <?php foreach ($error_messages as $msg) : ?>
                <li><?= $msg ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="post">
    <label for="nom">nom : </label><input type="text" name="nom" id="nom">
    <label for="prenom">prenom : </label><input type="text" name="prenom" id="prenom">
    <label for="genre">genre : </label><input type="text" name="genre" id="genre">
    <label for="date_naissance">date_naissance : </label><input type="text" name="date_naissance" id="date_naissance">
    <label for="email">Email : </label><input type="text" name="email" id="email">
    <label for="pwd">Mot de passe : </label><input type="password" name="pwd" id="pwd">
    <label for="adresse">adresse : </label><input type="text" name="adresse" id="adresse">
    <label for="cp">cp : </label><input type="text" name="cp" id="cp">
    <label for="ville">ville : </label><input type="text" name="ville" id="ville">
    <label for="tel">tel : </label><input type="text" name="tel" id="tel">
    <input type="submit" value="Envoyer">
</form>