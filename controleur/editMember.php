<?php

/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
 
// On permet l'accès aux variables session.

session_start();
include "../modele/Utilisateur.class.php";
$MLK = new Utilisateur("test","test","test");
$MLK->modifierUtilisateur($_POST["statut_utilisateur"], $_SESSION["id_utilisateur"]);
header('location: ../compte.php?p=gestionu&y=1');