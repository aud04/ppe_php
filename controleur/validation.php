<?php
session_start();
include "../modele/Reservation.class.php";
$MLK= new Reservation($_SESSION["forfait"], $_SESSION["menage"], $_SESSION["id_utilisateur"], $_SESSION["date_reservation"], $_SESSION["date"], $_SESSION["logement"]);
$MLK->validerReservation($_POST["choix"], $_POST["message_contact"], $_SESSION["nom_utilisateur"], $_SESSION["id_utilisateur"], $_SESSION["email_utilisateur"], $_SESSION["id_reservation"]);
?>