<?php

/**
 * Contacter un administrateur.
 * 
 * Appel de la méthode pour contacter un administrateur.
 * 
 * @author { Berivan Kilavuz } [ <Berivan.Kilavuz62@gmail.com> ]
 */
// On permet l'accès aux variables session.
session_start();
include "../modele/Message.class.php";
$MLK = new Message($_POST["login"], $_POST["password"], $_POST["email"]);
$MLK->seConnecter($_POST["login"], $_POST["password"]);
