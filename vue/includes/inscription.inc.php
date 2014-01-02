<div id="inscription">
    <h3>Créez votre identifiant</h3>
    <form name="inscription_form" method="post" action="controleur/register.php" onsubmit="return inscription_control()">
        <label for="nom">Nom prénom :</label><input type="text" name="nom" id="nom" />
        <label for="email">Adresse Email :</label><input type="text" name="email" id="email" />
        <label for="identifiant">Identifiant :</label><input type="text" name="identifiant" id="identifiant" />
        <label for="password">Mot de passe :</label><input type="password" name="password" id="password"/>
        <label for="npassword">Verification mot de passe :</label><input type="password" name="npassword" id="npassword" />
        <input type="submit" value="inscription">
        <?php
        if (isset($_SESSION["addMemberResult"])):
            echo $_SESSION["addMemberResult"];
            $_SESSION["addMemberResult"] = null;
        endif;
        ?>
    </form>
</div>

<script type="text/javascript">
    function inscription_control() {
        var x = true;
        // Vérifier si le nom et prenom
        if (!inscription_form.nom.value) {
            inscription_form.nom.style.borderColor = 'red';
            x = false;
        }
        else {
            inscription_form.nom.style.borderColor = 'green';
        }
        // Vérifier si l'identifiant est rempli
        if (!inscription_form.identifiant.value) {
            inscription_form.identifiant.style.borderColor = 'red';
            x = false;
        }
        else {
            inscription_form.identifiant.style.borderColor = 'green';
        }

        // Vérifier si le mail est rempli
        if (!inscription_form.email.value) {
            inscription_form.email.style.borderColor = 'red';
            x = false;
        }
        else {
            function control_mail(email) {
                var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
                return(reg.test(email));
            }
            // Vérifier le format du mail
            if (control_mail(inscription_form.email.value) === false) {
                inscription_form.email.style.borderColor = 'red';
                x = false;
            }
            else {
                inscription_form.email.style.borderColor = 'green';
            }
        }

        // Vérifier si le mot de passe est rempli
        if (!inscription_form.password.value) {
            inscription_form.password.style.borderColor = 'red';
            x = false;
        }
        else {
            inscription_form.password.style.borderColor = 'green';
        }

        // Vérifier si le nouveau mot de passe est rempli
        if (!inscription_form.npassword.value || inscription_form.npassword.value !== inscription_form.password.value) {
            inscription_form.npassword.style.borderColor = 'red';
            x = false;
        }
        else {
            inscription_form.npassword.style.borderColor = 'green';
        }

        return x;
    }
</script>