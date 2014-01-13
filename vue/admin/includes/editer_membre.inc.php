<?php/**
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
?>
</p>
<form method="post" action="controleur/editMember.php">
    <label>
        statut souhaité :
    </label>
    <select name="statut_utilisateur">
        <option value="1">administrateur</option>
        <option value="0">client</option>
    </select>
    <input type="submit" value="Modifier"/>
</form>