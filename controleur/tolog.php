<?php

/**
 * Se connecter.
 * 
 * Appel de la méthode pour vérifier le formulaire de connexion et permettre un accès.
 * 
 * @author { Hocine Belbouab } [ <contact@homerique.com> ]
 */
session_start();
include "../modele/Utilisateur.class.php";
$MLK = new Utilisateur($_POST["login"], $_POST["password"], $_POST["email"]);
$MLK->seConnecter($_POST["login"], $_POST["password"]);
