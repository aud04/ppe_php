<?php
require('modele/Date.class.php');
require('modele/conn_sql.php');
$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);

$req = $bdd->query('SELECT * FROM ppe_dispo');
$r = array();
while ($data = $req->fetch()):
    $madatedebut = $data['dispo_debut'];
    list($ad, $md, $jd) = explode("-", $madatedebut);
    $debut_mois = $md;
    $debut_jour = $jd;
    $debut_annee = $ad;
    $debut_date = mktime(0, 0, 0, $debut_mois, $debut_jour, $debut_annee);
    for ($i = $debut_date; $i <= $debut_date + (86400 * 6); $i+=86400):
        array_push($r, date("Y-n-j", $i));
    endfor;
endwhile;

$req = $bdd->query('SELECT * FROM ppe_vacances_scolaires');
$v = array();
while ($data = $req->fetch()):
    $madatedebut = $data['date_debut'];
    $madatedefin = $data['date_fin'];
    list($ad, $md, $jd) = explode("-", $madatedebut);
    list($af, $mf, $jf) = explode("-", $madatedefin);

    $debut_mois = $md;
    $debut_jour = $jd;
    $debut_annee = $ad;
    $fin_mois = $mf;
    $fin_jour = $jf;
    $fin_annee = $af;

    $debut_date = mktime(0, 0, 0, $debut_mois, $debut_jour, $debut_annee);
    $fin_date = mktime(0, 0, 0, $fin_mois, $fin_jour, $fin_annee);

    for ($i = $debut_date; $i <= $fin_date; $i+=86400):
        array_push($v, date("Y-n-j", $i));
    endfor;
endwhile;
global $dispo;
global $color;
global $link;
?>

<div class="periods">
    <div class="months" style="height:50px;">

        <ul>
            <?php foreach ($date->months as $id => $m): ?>
                <li><a href="#" id="linkMonth<?php echo $id + 1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 4)); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php $dates = current($dates); ?>
    <?php foreach ($dates as $m => $days): ?>
        <center>

            <div class="month" id="month<?php echo $m; ?>">
                <table class="calendrier">
                    <thead>
                        <tr>
                            <?php foreach ($date->days as $d): ?>
                                <th>
                                    <?php echo substr($d, 0, 3); ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $end = end($days);
                            foreach ($days as $d => $w):
                                $time = strtotime("$year-$m-$d");
                                ?>

                                <?php if ($d == 1): ?>
                                    <?php $nb = $w - 1; ?>
                                    <?php if ($nb > 0): ?>
                                        <td colspan="<?php echo $nb; ?>" class="padding"></td>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                foreach ($v as $value):
                                    if (strtotime($value) == $time) {
                                        $color = "#DCDCDC";
                                        $dispo = true;
                                        $link = true;
                                    }
                                endforeach;
                                foreach ($r as $value):
                                    if (strtotime($value) == $time) {
                                        $color = "#FFE7D5";
                                        $dispo = true;
                                        $link = true;
                                    }
                                endforeach;

                                if ($dispo == true) {
                                    echo "<td style=\"background-color:" . $color . ";\">";
                                } else
                                    echo "<td>";
                                ?>


                                <?php
                                if ($w == 6 and $link == true and $dispo == true) {
                                    echo "<b><a href=\"compte.php?p=reserver&date=" . "$year-$m-$d" . "\">" . $d . "</a></b>";
                                } else {
                                    echo $d;
                                }

                                $link = false;
                                $dispo = false;
                                ?>
                                </td>
                                <?php if ($w == 7): ?>
                                </tr><tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($end != 7): ?>
                                <td colspan="<?php echo 7 - $end; ?>" class="padding"></td>
        <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </center>
    <?php endforeach; ?>
    <br />
<?php
$req = $bdd->query('SELECT * FROM ppe_article WHERE id_article = 1');
$data = $req->fetch();
echo stripslashes($data["contenu_article"]);
?>

</div>