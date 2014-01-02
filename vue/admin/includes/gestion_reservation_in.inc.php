<?php
$req = $bdd->query('SELECT * FROM ppe_reservation, ppe_logement where id_reservation="' . $_GET["id_reservation"] . '"');
$data = $req->fetch();
$_SESSION["forfait"] = $data["forfait"];
$_SESSION["menage"] = $data["menage"];
$_SESSION["id_utilisateur"] = $data["id_utilisateur"];
$_SESSION["date_reservation"] = $data["date_reservation"];
$_SESSION["date"] = $data["date"];
$_SESSION["logement"] = $data["categorie_logement"];
$_SESSION["id_reservation"] = $_GET["id_reservation"];
$_SESSION["nom_utilisateur"] = $data["nom_utilisateur"];
$_SESSION["email_utilisateur"] = $data["email_client"];
?>
<div id="contour">
    <p>Le client n' <a href="?p=gestion_r&id_reservation=<?php echo $_GET["id_reservation"] ?>&id_client=<?php echo $data["id_utilisateur"]; ?>"
                       style="color:grey;"><?php echo $data["id_utilisateur"]; ?>
        </a> (cliquer pour plus d'informations)à fait une demande de réservation pour la semaine du <?php echo $data["date_reservation"]; ?>. 
    </p>
    <hr style='color:grey;'>
    <p>Voici les options choisies:</p>

    <p>- <?php
        switch ($data["categorie_logement"]):
            case 1: echo"Logements";
                break;
            case 2: echo"Chambres de 3 lits";
                break;
            case 3: echo"Chambres de 4 lits";
                break;
            case 4: echo"Logement avec option pour personnes à faible mobilité";
                break;
        endswitch;
        ?>
        <br />
        - <?php echo $data["forfait"]; ?>
        <br />
        - Ménage : <?php echo $data["menage"] ?></p>
    <form id="form_gestion_reservation" method="post" action="controleur/validation.php">
        <p><br /> <label for="accept">J'accepte cette demande</label> <input type="radio" name="choix" id="accept" value="accept"/><br />
            <label for="refuse">Je refuse cette demande</label> <input type="radio" name="choix" id="refuse" value="refuse"/>
        </p>
        <hr>
        <textarea name="message_contact" placeholder="Le corps de votre message ici."></textarea>
        <input type="submit" value="valider" style="float:right;"/><div class="clear"></div>
    </form>
    <p style="color:green">
        <?php
        if (isset($_GET["id_client"])):
            $req = $bdd->query('SELECT * FROM ppe_utilisateur where id_utilisateur="' . $_GET["id_client"] . '"');
            $data = $req->fetch();
            echo "Vous avez selectionné le client " . $data["nom"] . " (" . $_GET["id_client"] . ")"
            . " son email est :  " . $data["email"] . " il est inscrit depuis le " . $data["date_inscription"];
        endif;
        ?> </p>
    <?php
    if (isset($_SESSION["r"])):
        echo $_SESSION["r"];
        $_SESSION["r"] = null;
    endif;
    ?>
</div>