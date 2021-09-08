<?php
$title = "Identifiez vous !";


if (!empty($errors)) : ?>
    <div>
        <ul>
            <?php foreach ($errors as $msg) : ?>
                <li><?= $msg ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="post">
    <label for="email">Email : </label><input type="text" name="email" id="email">
    <label for="mot_passe">Mot de passe : </label><input type="password" name="mot_passe" id="mot_passe">
    <input type="submit" value="Envoyer">
</form>

