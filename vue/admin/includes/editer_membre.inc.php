<?php

/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
 
?>
<p>Vous cherchez à modifier le membre <?php
echo $_GET["id_utilisateur"];
$_SESSION["id_utilisateur"]=$_GET["id_utilisateur"];
// requête à la base de données pour récupérer les informations sur l'utilisateur.
$req = $bdd->query('SELECT * FROM ppe_utilisateur WHERE id_utilisateur = "' .$_GET["id_utilisateur"] . '"');
$data = $req->fetch();
?>
</p>
<form method="post" action="controleur/editMember.php">
    <label>
        statut souhaité :
    </label>
    <select name="statut_utilisateur">
        <option value="1" <?php echo (($data['pouvoir']==1) ? 'selected' : '')?>>administrateur</option>
        <option value="0" <?php echo (($data['pouvoir']==0) ? 'selected' : '')?>>client</option>
    </select>
    <input type="submit" value="Modifier"/>
</form>