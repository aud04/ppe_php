<?php
try
{
    // On se connecte à MySQL de mon site
    //$bdd = new PDO('mysql:host=mysql51-96.perso;dbname=hbdeveloppeur1', 'hbdeveloppeur1', 'homerique1');
    
     // Ou se connecte à MySQL de mon localhost (wamp)
     //$bdd = new PDO('mysql:host=localhost;dbname=ppejura', 'root', '');
     
     // Ou se connecte à MySQL de mon localhost(linux)
     $bdd = new PDO('mysql:host=localhost;dbname=ppejura', 'root', 'test');
     
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}