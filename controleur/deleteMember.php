<?php

/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
session_start();
include "../modele/Utilisateur.class.php";
$MLK = new Utilisateur("test","test","test");
$MLK->supprimerUtilisateur($_GET["id_utilisateur"]);
header("location: ../compte.php?p=gestionu");