<?php/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
?>

// Protection par URL, l'utilisateur ne peut pas supprimer le super admin par
// variable passée en URL.
if($_GET["id_utilisateur"]==1):
    header("location: ../compte.php?p=gestionu");
else:
    session_start();
    include "../modele/Utilisateur.class.php";
    $MLK = new Utilisateur("test","test","test");
    $MLK->supprimerUtilisateur($_GET["id_utilisateur"]);
    header("location: ../compte.php?p=gestionu&y=1");
endif;