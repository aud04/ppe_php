<?php

/**
 * Ajouter un membre.
 * 
 * Appel de la méthode pour ajouter un membre.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
session_start();
include "../modele/Utilisateur.class.php";
$MLK = new Utilisateur($_POST["login"], $_POST["password"], $_POST["email"]);
$MLK->ajouterUnMembre($_POST["identifiant"], $_POST["password"], $_POST["npassword"], $_POST["email"], $_POST["nom"]);
