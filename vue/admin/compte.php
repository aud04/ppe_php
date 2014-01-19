<?php
session_start();
include"modele/conn_sql.php";
include "modele/Reservation.class.php";
include "modele/Utilisateur.class.php";

//Si la variable session "id" n'est pas remplie alors l'utilisateur 
//ne peut pas être connecté à cette page. Il est donc redirigé en 
//page principale
if (empty($_SESSION['id'])):
    header('Location: index.php');
endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="vue/admin/style2.css" />
        <title>Gestion du compte</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript">
        </script>
        <script type="text/javascript" src="tinymce/tinymce.min.js"></script> 
        <script type="text/javascript">
            jQuery(function($) {
                $('.month').hide();
                $('.month:first').show();
                $('.months a:first').addClass('active');
                var current = 1;
                $('.months a').click(function() {
                    var month = $(this).attr('id').replace('linkMonth', '');
                    if (month !== current) {
                        $('#month' + current).slideUp();
                        $('#month' + month).slideDown();
                        $('.months a').removeClass('active');
                        $('.months a#linkMonth' + month).addClass('active');
                        current = month;
                    }
                    return false;
                });
            });
        </script>
        <script>
            tinymce.init({
                selector: "textarea#texte",
                theme_advanced_font_sizes: "10px,11px, 12px,13px,14px,16px,18px,20px",
                font_size_style_values: "11px, 12px,13px,14px,16px,18px,20px",
                theme: "modern",
                width: 580,
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                content_css: "css/content.css",
                toolbar: "insertfile undo redo | sizeselect | bold italic | fontselect |  fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        </script>
    </head>
    <body>
        <div id="conteneur">
            <div id="top">
                
            </div>
            <div id="sous_menu2">
                <?php
                $req = $bdd->query('SELECT * FROM ppe_utilisateur where id_utilisateur = ' . $_SESSION['id'] . '');
                $data = $req->fetch();
                ?>
                <form action="modele/destroy.php" style="float: left; padding-left: 40px;" name="disconnect" method="post">
                    <div style="float:left;margin-right:10px;margin-top:5px;"><label class="welcome">Bienvenue <?php echo $_SESSION['nom']; ?> | nombre de location (en cours ou en attente) : <?php echo $data['nb_reservation']; ?></label></div>
                    <div style="float:right;margin-top:0px;"><input type="submit" value="" class="btn_logout" name="disconnect"></div>
                </form>
                <div class="clear"></div>
            </div>
            
            <div id="mid">
                <div id="sous_menu">
<?php include "includes/menu.inc.php"; ?>
                </div>
                
                <div id="zone_affichage">
                    <?php
                    // Affichage du contenu des fichiers 
                    // en fonction de la valeur de la variable "p"(pour page).
                    if (isset($_GET["p"]) and $_GET["p"] == "compte"):
                        include "vue/admin/includes/account.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "dispo"):
                        include "vue/admin/includes/dispo.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "reserver"):
                        include "vue/admin/includes/reserver.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "administration"):
                        include "vue/admin/includes/admin.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "administration"):
                        include "vue/admin/includes/admin.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "gestion"):
                        include "vue/admin/includes/gestion.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "gestionu"):
                        include "vue/admin/includes/gestionu.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "gestion_r"):
                        include "vue/admin/includes/gestion_reservation_in.inc.php";

                    elseif (isset($_GET["p"]) and $_GET["p"] == "demande_valide"):
                        include "vue/admin/includes/reservation_valide.inc.php";
                    elseif (isset($_GET["p"]) and $_GET["p"] == "contacter"):
                        include "vue/admin/includes/contacter.inc.php";

                    else: include "vue/admin/includes/dispo.inc.php";
                    endif;
                    ?>
                    
                </div>
                <div style="clear:both"></div>
            </div>
            <div id="bot">
                <p> PPE - Hocine.B/ Berivan.K / Audrey.S </p>
            </div>
        </div>
        
    </body>
</html>
