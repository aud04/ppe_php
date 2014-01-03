<?php
session_start();
include"modele/conn_sql.php";
include "modele/Reservation.class.php";
include "modele/Utilisateur.class.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="vue/admin/style.css" />
        <title>PPE</title>
    </head>
    <body>
        <div id="conteneur">
            <div id="top">

            </div>
            <div id="mid"> 
                <?php
                //le menu est inclus dans la page.
                include "vue/includes/menu.inc.php";
                ?>
                <div id="zone_affichage">
                    <?php
                    // Affichage du contenu des fichiers par condition 
                    // en fonction de la valeur de la variable "p"(pour page).
                    if (isset($_GET["p"]) and $_GET["p"] == "inscription"):
                        include "vue/includes/inscription.inc.php";
                    elseif (isset($_GET["p"]) and $_GET["p"] == "connexion"):
                        include "vue/includes/connexion.inc.php";
                    else:
                        include "vue/includes/connexion.inc.php";
                    endif;
                    ?>

                </div>
                <div class="clear"></div>
            </div>
            <div id="bot">
                <p> PPE - Hocine.B/ Berivan.K / Audrey.S </p>
            </div>
        </div>
    </body>
</html>
