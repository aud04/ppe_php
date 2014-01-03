<?php

/**
 * Modification du texte de la page d'accueil.
 * 
 * Appel de la méthode pour modifier un article.
 * 
 * @author { Hocine Belbouab } [ <contact@hbdeveloppeur.com> ]
 */
session_start();
$contenu = stripslashes($_POST["texte"]);
include "../modele/Article.class.php";
$MLK = new Article("1", $contenu, date("d-m-Y"));
$MLK->modifierUnArticle($contenu);
