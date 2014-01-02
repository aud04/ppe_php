<?php

class Utilisateur {

    private $id;
    private $login;
    private $password;
    private $newPassword;
    private $email;

    // Constructeur de la classe Utilisateur
    public function __construct($login, $password, $email) {
        $this->login = $login;
        $this->password = $password;
        $this->password = $email;
    }

    //Cette fonction permet à un utilisateur de se connecter
    public function seConnecter($login, $password) {
        include"conn_sql.php";
        $req = $bdd->prepare('SELECT * FROM ppe_utilisateur WHERE login = :login AND mdp= :pwd ');
        $req->execute(array('login' => $login, 'pwd' => sha1($password)));
        $data = $req->fetch();

        // Cas où la requête renvoit aucun résultat
        if (!$data) {
            $_SESSION['result'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Une erreur s'est produite.</p>";
            header('location:  ../index.php?p=connexion');
        } else {
            $_SESSION['id'] = $data['id_utilisateur'];
            $_SESSION['login'] = $data['login'];
            $_SESSION['nom'] = $data['nom'];
            header('location:  ../compte.php');
        }
    }

    // Cette fonction permet d'ajouter un membre
    public function ajouterUnMembre($login, $password, $npassword, $email, $nom) {
        include"conn_sql.php";

        function VerifierAdresseMail($email) {
            $Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($Syntaxe, $email)) {
                return true;
            } else {
                return false;
            }
        }

        $req = $bdd->prepare('SELECT * FROM ppe_utilisateur WHERE login = :login or email = :email');
        $req->execute(array
            ('login' => $login,
            'email' => $email
        ));
        $data = $req->fetch();

        //Controle du formulaire (mot de passes identiques, cases renseignées, disponibilité des identifiants)
        if ($login != "" or $password != "" or $nom!="") {
            if (VerifierAdresseMail($email)) {
                if ($npassword === $password) {
                    if ($data) {
                        $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">L'identifiant/email est indisponible.</p>";
                        header("Location: ../index.php?p=inscription");
                    } else {
                        // Le membre peut être ajouter dans la bdd
                        $bdd->exec('INSERT INTO ppe_utilisateur(login, mdp, date_inscription, email, nom) VALUES("' . $login . '", "' . sha1($password) . '",NOW(), "' . $email . '","'.$nom.'")');
                        $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:green;font-style:italic;\">Le membre \"" . $login . "\" a été ajouté avec succès.</p>";
                        header("Location: ../index.php?p=inscription");
                    }
                } else {
                    $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Les mots de passe ne correspondent pas.</p>";
                    header("Location: ../index.php?p=inscription");
                }
            } else {
                $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">L'adresse email n'est pas valide.</p>";
                header("Location: ../index.php?p=inscription");
            }
        } else {
            $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Il faut remplir tout les champs.</p>";
            header("Location: ../index.php?p=inscription");
        }
    }

    //Cette fonction permet de modifier un mot de passe
    public function modifierUnMotDePasse($login, $password, $newPassword, $newPassword2) {
        include"conn_sql.php";
        // Controle du formulaire (mots de passe semblables, renseignements)
        if ($newPassword === $newPassword2) {
            if ((isset($password)) and (isset($newPassword)) and (isset($newPassword2))) {

                $req = $bdd->prepare('SELECT * FROM ppe_utilisateur WHERE login = :login');
                $req->execute(array('login' => $login));
                $data = $req->fetch();

                if ((sha1($password) === $data["mdp"])) {

                    //Le mot de passe peut être modifier dans la bdd
                    $req = $bdd->prepare('UPDATE ppe_utilisateur SET mdp = :pass WHERE login = :login');
                    $req->execute(array(
                        'pass' => sha1($newPassword),
                        'login' => $login,
                    ));

                    $_SESSION['result'] = "<p style=\"font-size:13px; color:green;font-style:italic;\">Mot de passe modifié avec succès</p>";
                    header("Location: ../compte.php?p=compte");
                } else {
                    //Mauvais mot de passe
                    $_SESSION['result'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Mauvais mot de passe</p>";
                    header("Location: ../compte.php?p=compte");
                }
            } else {
                //Champs non renseignés
                $_SESSION['result'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Il faut remplir tout les champs</p>";
                header("Location: ../compte.php?p=compte");
            }
        } else {
            //Mots de passe non identiques
            $_SESSION['result'] = "<p style=\"font-size:13px; color:red;font-style:italic;\">Les deux mots de passe ne correspondent pas.</p>";
            header("Location: ../compte.php?p=compte");
        }
    }

    public function afficherUtilisateurs($id_utilisateur, $login, $email) {
        echo "<tr><td>" . $id_utilisateur . "</td>";
        echo "<td>" . $login . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td> <a href=\"\">Edit</a> </td>";
        echo "<td> <a href=\"\">X</a></td>";
    }

}

?>
