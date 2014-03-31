<?php
$req = $bdd->query('SELECT * FROM ppe_utilisateur WHERE id_utilisateur = "' . $_SESSION["id"] . '"');
$data = $req->fetch();
?>
<h3>sous menu</h3>
<ul>
    <li>
        <a href="?p=dispo">Accueil</a>
    </li>
    <li>
        <a href="?p=compte">Changer de mot de passe</a>
    </li>

    <?php if (isset($data["pouvoir"]) and $data["pouvoir"] == 1): ?>
        <li>
            <a href="?p=gestion">Gestion des demandes</a>
        </li>
        <li>
            <a href="?p=demande_valide">Demandes finalisées</a>
        </li>
        <li>
            <a href="?p=administration">Modifier la page d'accueil</a>
        </li>
        <li>
            <a href="?p=gestionu">Gestion des utilisateurs</a>
        </li>

    <?php endif; ?>


</ul>