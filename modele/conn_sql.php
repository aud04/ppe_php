<?php
try
{
    // On se connecte à MySQL de mon site
    //$bdd = new PDO('mysql:host=mysql51-96.perso;dbname=hbdeveloppeur1', 'hbdeveloppeur1', 'homerique1');
    
     // Ou se connecte à MySQL de mon localhost
     $bdd = new PDO('mysql:host=localhost;dbname=ppejura', 'root', '');
     
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}