<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=mysql51-96.perso;dbname=hbdeveloppeur1', 'hbdeveloppeur1', 'homerique1');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}