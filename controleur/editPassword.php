<?php
session_start();
include "../modele/Utilisateur.class.php";
$MLK= new Utilisateur($_POST["login"], $_POST["password"], $_POST["email"]);
$login=$_SESSION["login"];
$MLK->modifierUnMotDePasse($login, $_POST["password"], $_POST["newPassword"], $_POST["newPassword2"]);
?>