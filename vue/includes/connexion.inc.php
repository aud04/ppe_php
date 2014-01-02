<h3>Ecran de connexion</h3>
<div id="connexion">
    <form name="connexion_form" method="post" action="controleur/tolog.php" onsubmit="return connexion_control()">
        <label for="login">Identifiant :</label><input type="text" name="login" id="login" name="login" /><br />
        <label for="password">Mot de passe :</label><input type="password" name="password" id="password" /><br />
        <input type="submit" value="Connexion" style="margin-top: 5px; float:right;">
            <?php
                if (isset($_SESSION["result"])):
                    echo $_SESSION["result"];
                    $_SESSION["result"]=null;
                endif;
                ?>			
    </form>
</div>

<script type="text/javascript" >
    function connexion_control(){
        var x = true;
        // Vérifier si l'identifiant est bien rempli
        if(!connexion_form.login.value) {
            connexion_form.login.style.borderColor = 'red';
            x = false;
        }
        else {
            connexion_form.login.style.borderColor = 'green';
        }

        // Vérifier si le sujet est rempli
        if(!connexion_form.password.value) {
            connexion_form.password.style.borderColor = 'red';
            x = false;
        }
        else {
            connexion_form.password.style.borderColor = 'green';
        }
        return x;
    }
</script>