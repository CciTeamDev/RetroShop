<?php
//$title = "Identifiez vous !";
//include 'header.php';

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
    <label for="pwd">Mot de passe : </label><input type="password" name="pwd" id="pwd">
    <input type="submit" value="Envoyer">
</form>

<?php 
//include 'footer.php'; ?>