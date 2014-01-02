<?php
session_start();
include "../modele/Utilisateur.class.php";
$MLK= new Utilisateur($_POST["login"], $_POST["password"], $_POST["email"]);
$MLK->seConnecter($_POST["login"], $_POST["password"]);
?>