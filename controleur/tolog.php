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
$MLK = new Message();
$MLK->envoyerUnMessage();
header('location:  ../compte.php');