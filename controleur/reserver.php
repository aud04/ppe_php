<?php

/**
 * Passer une reservation.
 * 
 * Appel de la méthode pour faire une réservation.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
// On permet l'accès aux variables session.
session_start();
include "../modele/Reservation.class.php";
include"../modele/conn_sql.php";
global $menage;

if (isset($_POST["forfait2"])) {
    $menage = "Avec";
} else {
    $menage = "Sans";
}
$req = $bdd->query('SELECT * FROM ppe_utilisateur WHERE id_utilisateur="' . $_SESSION["id"] . '"');
$data = $req->fetch();
$MLK = new Reservation($_POST["forfait"], $menage, $_SESSION["id"], $_SESSION["date"], date("Y-n-j"), $_POST["option"]);
$MLK->reserver($_POST["forfait"], $menage, $_SESSION["id"], $_SESSION["date"], $_POST["option"], $data["email"], $_SESSION['nom']);