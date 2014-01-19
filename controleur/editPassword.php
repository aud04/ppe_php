<?php

/**
 * Modification du mot de passe.
 * 
 * Appel de la méthode pour modifier un mot de passe.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
// On permet l'accès aux variables session.
session_start();
include "../modele/Utilisateur.class.php";
$MLK = new Utilisateur($_POST["login"], $_POST["password"], $_POST["email"]);
$login = $_SESSION["login"];
$MLK->modifierUnMotDePasse($login, $_POST["password"], $_POST["newPassword"], $_POST["newPassword2"]);
