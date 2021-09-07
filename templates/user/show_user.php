<?php
//$title = (unserialize($_SESSION["user"])->getId_user() === $user->getId_user()) ? "Mon profil" : sprintf("Le profil de %s", $user->getPseudo());
//include 'header.php';
?>
<div><span>Id_user : </span><span><?= $user->getId_user() ?? 'N/A'; ?></span></div>
<div><span>Nom : </span><span><?= $user->getNom() ?? 'N/A'; ?></span></div>
<div><span>Prénom : </span><span><?= $user->getPrenom() ?? 'N/A'; ?></span></div>
<div><span>Genre : </span><span><?= $user->getGenre() ?? 'N/A'; ?></span></div>
<div><span>Date_naissance : </span><span><?= $user->getDate_naissance() ?></span></div>
<div><span>Email : </span><span><?= $user->getEmail() ?></span></div>
<div><span>Cp : </span><span><?= $user->getCp() ?></span></div>
<div><span>Adresse : </span><span><?= $user->getAdresse() ?></span></div>
<div><span>Ville : </span><span><?= $user->getVille() ?></span></div>
<div><span>tel : </span><span><?= $user->gettel() ?></span></div>

<a href="update">Modifier le profil</a>

<?php //include 'footer.php'; ?>