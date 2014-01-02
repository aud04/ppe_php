<?php
session_start();
$contenu = stripslashes($_POST["texte"]);
include "../modele/Article.class.php";
$MLK= new Article("1", $contenu, date("d-m-Y"));
$MLK->modifierUnArticle($contenu);
