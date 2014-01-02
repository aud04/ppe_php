<?php

class Reservation {

    private $forfait;
    private $menage;
    private $id_utilisateur;
    private $date_reservation;
    private $date;
    private $logement;

    public function __construct($forfait, $menage, $id_utilisateur, $date_reservation, $date, $logement) {
        $this->forfait = $forfait;
        $this->menage = $menage;
        $this->id_utilisateur = $id_utilisateur;
        $this->date = $date;
        $this->date_reservation = $date_reservation;
        $this->logement = $logement;
    }

    //Cette fonction permet de faire une reservation
    public function reserver($forfait, $menage, $id_utilisateur, $date_reservation, $logement, $email_client, $nom_client) {
        if (isset($forfait, $logement)) {
            include "conn_sql.php";
            $req = $bdd->prepare('INSERT INTO ppe_reservation(forfait, menage, id_utilisateur, nom_utilisateur, email_client, date_reservation, date, categorie_logement) VALUES(:forfait, :menage, :id_utilisateur, :nom, :email, :date_reservation, NOW(), :cl)');

            $req->execute(array(
                'forfait' => stripslashes($forfait),
                'menage' => stripslashes($menage),
                'id_utilisateur' => stripslashes($id_utilisateur),
                'date_reservation' => stripslashes($date_reservation),
                'cl' => stripslashes($logement),
                'email' => $email_client,
                'nom' => $nom_client
            ));
            //Dans la base de données, le profil du client compte 1 réservation en plus.
            $bdd->exec('UPDATE ppe_utilisateur SET nb_reservation=nb_reservation+1 WHERE id_utilisateur = ' . $id_utilisateur . '');
            $_SESSION['result_form'] = "<p style=\"color:green; font-size:13px;\">* Réservation ajoutée avec succès ! Un administrateur consultera votre demande de réservation dans les plus brefs délais.</p>";
        } else {
            $_SESSION['result_form'] = "<p style=\"color:red; font-size:13px;\">* Il faut cocher au moins une option et un forfait.</p>";
        }
        header("location:../compte.php?p=reserver&date=" . $_SESSION["date"] . "");
    }

    //Permet d'afficher les reservations dans des colonnes 
    public function afficherReservations($id, $forfait, $menage, $id_utilisateur, $date_reservation, $logement, $date) {
        echo"<tr><td>" . $id_utilisateur . "</td><td>" . stripslashes($forfait) . "</td><td> du " . $date_reservation . "</td><td>" . $logement . "</td>
		<td><a href=\"compte.php?p=gestion_r&id_reservation=" . $id . "\">Gérer</a></td></tr>";
    }

    public function validerReservation($choix, $message_ad, $nom_client, $id_client, $email_client, $id_reservation) {
        // Si l'adminastreur à bien coché un choix
        if (isset($choix)) {

            // L'adresse du destinataire.
            $to = $email_client;
            // Objet de l'email
            $subject = $nom_client . " : CVVEN - Votre demande de réservation numéro : " . $id_reservation;
            // Provenance
            $headers = 'From: ' . $nom_client . ' <' . $email_client . '>' . "\r\n" .
                    'Reply-To: ' . $email_client . '' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            //Dans le cas où la demande est rejetée 
            $message = "Merci d'avoir choisi notre organisation pour vos vacances. \r ---------------- \r"
                    . "rappel de vos informations de compte : client numéro " . $id_client . " \r ---------------- \r";
            if ($choix == "refuse"):
                include "conn_sql.php";
                //La réservation est supprimée
                $bdd->query('DELETE FROM ppe_reservation WHERE id_reservation="' . $id_reservation . '"');
                $message.="Un administrateur à consulté votre demande de réservation et à imposé une réponse négative. "
                        . " En effet malgré la valeur de votre demande, nous ne sommes pas en mesure de faire suite à votre requête.\r"
                        . " Voici le message de l'administrateur: \r";
            //Dans le cas où la demande est acceptée 
            else: $message.="Un administrateur à consulté votre demande de réservation et à imposé une réponse positive. "
                        . " Un de nos secretaires prendra contact avec vous par voix téléphonique pour finaliser cette étape. \r";
                include "conn_sql.php";
                //La réservation est validée
                $bdd->exec('UPDATE ppe_reservation SET valide = 1 WHERE id_reservation = ' . $id_reservation . '');
            endif;
            $message.=$message_ad;
            // Fonction PHP pour envoyer l'email.
            mail($to, $subject, $message, $headers);
            $_SESSION["r"] = "<p style=\"color:green; font-size:14px;\">Un email à été envoyé au client concerné.</p>";
            header("location: ../compte.php?p=gestion");
        }
        else {
            $_SESSION["r"] = "<p style=\"color:red; font-size:14px;\">Vous n'avez pas correctement renseigné les champs.</p>";
            header("location: ../compte.php?p=gestion_r&id_reservation=" . $id_reservation . "");
        }
    }

}

?>