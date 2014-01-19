<?php

/**
 * Validation(accepter ou refuser) d'une demande de réservation par l'administrateur.
 * 
 * Un email est généré pour établir un suivi avec le client, si la réservation 
 * est refusée la demande est supprimée, si la réservation est acceptée un 
 * email est envoyé au client et la demande change de statut.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
// On permet l'accès aux variables session.
session_start();
include "../modele/Reservation.class.php";
$MLK = new Reservation($_SESSION["forfait"], $_SESSION["menage"], $_SESSION["id_utilisateur"], $_SESSION["date_reservation"], $_SESSION["date"], $_SESSION["logement"]);
$MLK->validerReservation($_POST["choix"], $_POST["message_contact"], $_SESSION["nom_utilisateur"], $_SESSION["id_utilisateur"], $_SESSION["email_utilisateur"], $_SESSION["id_reservation"]);
