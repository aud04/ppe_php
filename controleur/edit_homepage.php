<?php

/**
 * Modification du texte de la page d'accueil.
 * 
 * Appel de la méthode pour modifier un article.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
// On permet l'accès aux variables session.
session_start();
$contenu = stripslashes($_POST["texte"]);
include "../modele/Article.class.php";
$MLK = new Article("1", $contenu, date("d-m-Y"));
$MLK->modifierUnArticle($contenu);
