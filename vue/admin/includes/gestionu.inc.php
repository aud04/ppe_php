<?php/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
?>

<?php

if (isset($_GET["y"]) and $_GET["y"]==1){
    include "membre.inc.php";

}
elseif (isset($_GET["y"]) and $_GET["y"]==2){
    include "ajouter_membre.inc.php";
}
elseif (isset($_GET["y"]) and $_GET["y"]==3){
    include "editer_membre.inc.php";
}
else {
    ?>
<ul>
    <li><a href ="?p=gestionu&y=1" >Supprimer ou éditer</a></li>
    <li><a href ="?p=gestionu&y=2">Ajouter</a></li>
</ul>
<?php } ?>






