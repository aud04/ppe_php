<center><h2>Réservations validées</h4><br />

        <table class="gestion">
            <thead>
            <th>id client</th>
            <th>Pension</th>
            <th>Semaine</th>
            <th>Catégorie</th>
            </thead>
            <tbody>
                <?php
                $req = $bdd->query('SELECT COUNT(id_reservation) as nbReservation FROM ppe_reservation where valide=1')->fetchColumn();

                if (isset($_GET['n']) and is_numeric($_GET['n'])) {
                    $cPage = $_GET['n'];
                } else {
                    $cPage = 1;
                }
                $nbArt = $req;

                $nbPerPage = 5;
                $nbPage = ceil($nbArt / $nbPerPage);

                $req = $bdd->query('SELECT * FROM ppe_reservation where valide = 1 ORDER BY date DESC LIMIT ' . (($cPage - 1) * $nbPerPage) . ', ' . $nbPerPage . '');
                while ($data = $req->fetch()):
                    $MLK = new Reservation($data['forfait'], $data['menage'], $data['id_utilisateur'], $data['date_reservation'], $data['date'], $data['categorie_logement']);
                    $MLK->afficherReservations($data['id_reservation'], $data['forfait'], $data['menage'], $data['id_utilisateur'], $data['date_reservation'], $data['categorie_logement'], $data['date']);
                endwhile;
                ?>
            </tbody>
        </table>
</center>
<center>	<div id="pag">
        <?php
        for ($i = 1; $i <= $nbPage; $i++) {
            echo "<a";
            if ($i == $cPage) {
                echo " class=\"pagS\" ";
            }
            echo " href=\"compte.php?p=demande_valide&n=" . $i . "\">" . $i . "</a>";
        }
        ?>
    </div></center>