<?php

class Message{

 private $objet;
 private $email;
 private $contenu;
 
 public function __construct($objet, $email, $contenu)
  {
	$this->objet=$objet;
        $this->email=$email;
	$this->contenu=$contenu;
  }
  //Cette fonction permet de modifier un article
  public function envoyerUnMessage($objet, $email, $contenu, $id_client){
	include "conn_sql.php";
        
        $to = "hbdeveloppeur@gmail.com";
            // Objet de l'email
            $objet = " Un client tente de vous contacter.";
            // Provenance
            $headers = 'From: ' . 'Client '.$id_client. ' <' . $email . '>' . "\r\n" .
                    'Reply-To: ' . $email . '' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            //Dans le cas où la demande est rejetée
            $message = "Un client vous a envoyé un message: \n ---------------- \n";
            
            $message.=$contenu;
            // Fonction PHP pour envoyer l'email
            
            mail($to, $objet, $message, $headers);
  }
}